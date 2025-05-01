<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Twilio\Rest\Client;

/**
 * Service pour l'envoi de SMS via Twilio
 */
class TwilioService
{
    private string $twilioSid;
    private string $twilioToken;
    private string $twilioPhoneNumber;
    private bool $isDev;
    private LoggerInterface $logger;

    /**
     * Constructeur du service
     */
    public function __construct(
        string $twilioSid,
        string $twilioToken,
        string $twilioPhoneNumber,
        bool $isDev,
        LoggerInterface $logger
    ) {
        $this->twilioSid = $twilioSid;
        $this->twilioToken = $twilioToken;
        $this->twilioPhoneNumber = $twilioPhoneNumber;
        $this->isDev = $isDev;
        $this->logger = $logger;
    }

    /**
     * Envoie un code de vérification via SMS Twilio
     *
     * @param string $to Numéro de téléphone destinataire (format international)
     * @return array Résultat de l'envoi (success, message, sid)
     */
    public function sendVerificationCode(string $to): array
    {
        // En mode développement, on simule l'envoi et on log le message
        if ($this->isDev) {
            $code = sprintf('%06d', mt_rand(1, 999999));
            $this->logger->info('Code de vérification simulé envoyé à {to}: {code}', [
                'to' => $to,
                'code' => $code
            ]);
            
            return [
                'success' => true,
                'message' => 'Code de vérification simulé envoyé avec succès',
                'sid' => 'DEV_MODE_' . uniqid(),
                'code' => $code // Uniquement en mode dev pour faciliter les tests
            ];
        }
        
        try {
            // Formatage du numéro au format international si nécessaire
            if (substr($to, 0, 1) !== '+') {
                // Préfixe tunisien par défaut (+216)
                $to = '+216' . $to;
            }
            
            // Nettoyage du numéro (suppression des espaces, tirets, etc.)
            $to = preg_replace('/[^0-9+]/', '', $to);
            
            // Génération du code de vérification
            $code = sprintf('%06d', mt_rand(1, 999999));
            
            // Log des informations de configuration
            $this->logger->info('Tentative d\'envoi de code de vérification avec Twilio SMS', [
                'to' => $to,
                'from' => $this->twilioPhoneNumber,
                'sid' => $this->twilioSid,
                'token_masked' => substr($this->twilioToken, 0, 4) . '...' . substr($this->twilioToken, -4),
                'is_dev' => $this->isDev ? 'true' : 'false'
            ]);
            
            // Vérification des identifiants
            if (empty($this->twilioSid) || strlen($this->twilioSid) < 10 || 
                empty($this->twilioToken) || strlen($this->twilioToken) < 10 ||
                empty($this->twilioPhoneNumber)) {
                throw new \Exception('Identifiants Twilio ou numéro de téléphone invalides ou manquants');
            }
            
            // Initialisation du client Twilio
            $client = new Client($this->twilioSid, $this->twilioToken);
            
            // Préparation du message
            $message = "Votre code de vérification est: $code";
            
            // Envoi du SMS via Twilio
            $sms = $client->messages->create(
                $to,
                [
                    'from' => $this->twilioPhoneNumber,
                    'body' => $message
                ]
            );
            
            $this->logger->info('Code de vérification envoyé à {to} avec succès, SID: {sid}', [
                'to' => $to,
                'sid' => $sms->sid
            ]);
            
            // Stockage temporaire du code pour vérification ultérieure
            // Normalement, il faudrait stocker cela en base de données ou dans une session
            // Mais pour simplifier, on le stocke dans un fichier temporaire
            $codeData = [
                'code' => $code,
                'phone' => $to,
                'expires' => time() + 600 // 10 minutes d'expiration
            ];
            
            $tempFile = sys_get_temp_dir() . '/twilio_code_' . md5($to) . '.json';
            file_put_contents($tempFile, json_encode($codeData));
            
            return [
                'success' => true,
                'message' => 'Code de vérification envoyé avec succès',
                'sid' => $sms->sid
            ];
        } catch (\Exception $e) {
            // Log détaillé de l'erreur
            $this->logger->error('Erreur détaillée lors de l\'envoi du code de vérification à {to}: {error}', [
                'to' => $to,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Analyse des erreurs courantes
            $errorMessage = 'Erreur lors de l\'envoi du code de vérification';
            
            if (strpos($e->getMessage(), 'authenticate') !== false) {
                $errorMessage = 'Erreur d\'authentification Twilio. Vérifiez vos identifiants SID et Token.';
            } elseif (strpos($e->getMessage(), 'not a valid phone') !== false) {
                $errorMessage = 'Le numéro de téléphone n\'est pas valide.';
            } elseif (strpos($e->getMessage(), 'unverified') !== false) {
                $errorMessage = 'Le numéro de téléphone n\'est pas vérifié. Vérifiez votre compte Twilio.';
            }
            
            return [
                'success' => false,
                'message' => $errorMessage . ' Détails: ' . $e->getMessage(),
                'sid' => null
            ];
        }
    }
    
    /**
     * Vérifie un code de vérification
     *
     * @param string $to Numéro de téléphone destinataire (format international)
     * @param string $code Code de vérification à vérifier
     * @return array Résultat de la vérification (success, message, valid)
     */
    public function checkVerificationCode(string $to, string $code): array
    {
        // En mode développement, on simule la vérification
        if ($this->isDev) {
            $this->logger->info('Vérification de code simulée pour {to}: {code}', [
                'to' => $to,
                'code' => $code
            ]);
            
            // En mode dev, on accepte n'importe quel code à 6 chiffres
            $isValid = preg_match('/^\d{6}$/', $code);
            
            return [
                'success' => true,
                'message' => $isValid ? 'Code vérifié avec succès' : 'Code invalide',
                'valid' => $isValid
            ];
        }
        
        try {
            // Formatage du numéro au format international si nécessaire
            if (substr($to, 0, 1) !== '+') {
                // Préfixe tunisien par défaut (+216)
                $to = '+216' . $to;
            }
            
            // Nettoyage du numéro (suppression des espaces, tirets, etc.)
            $to = preg_replace('/[^0-9+]/', '', $to);
            
            // Log des informations de vérification
            $this->logger->info('Tentative de vérification de code', [
                'to' => $to,
                'code_length' => strlen($code)
            ]);
            
            // Récupération du code stocké
            $tempFile = sys_get_temp_dir() . '/twilio_code_' . md5($to) . '.json';
            
            if (!file_exists($tempFile)) {
                throw new \Exception('Aucun code de vérification n\'a été envoyé à ce numéro.');
            }
            
            $codeData = json_decode(file_get_contents($tempFile), true);
            
            // Vérification de l'expiration
            if (time() > $codeData['expires']) {
                unlink($tempFile); // Suppression du fichier expiré
                throw new \Exception('Le code de vérification a expiré.');
            }
            
            // Vérification du code
            $isValid = $code === $codeData['code'];
            
            // Si le code est valide, on supprime le fichier
            if ($isValid) {
                unlink($tempFile);
            }
            
            $this->logger->info('Vérification de code pour {to}: {result}', [
                'to' => $to,
                'result' => $isValid ? 'valide' : 'invalide'
            ]);
            
            return [
                'success' => true,
                'message' => $isValid ? 'Code vérifié avec succès' : 'Code invalide',
                'valid' => $isValid
            ];
        } catch (\Exception $e) {
            // Log détaillé de l'erreur
            $this->logger->error('Erreur détaillée lors de la vérification du code pour {to}: {error}', [
                'to' => $to,
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
            
            // Vérification des erreurs courantes
            $errorMessage = 'Erreur lors de la vérification du code';
            
            if (strpos($e->getMessage(), 'authenticate') !== false) {
                $errorMessage = 'Erreur d\'authentification Twilio. Vérifiez vos identifiants SID et Token.';
            } elseif (strpos($e->getMessage(), 'not a valid phone') !== false) {
                $errorMessage = 'Le numéro de téléphone n\'est pas valide.';
            } elseif (strpos($e->getMessage(), 'expired') !== false) {
                $errorMessage = 'Le code de vérification a expiré.';
            } elseif (strpos($e->getMessage(), 'Aucun code') !== false) {
                $errorMessage = 'Aucun code de vérification n\'a été envoyé à ce numéro.';
            }
            
            return [
                'success' => false,
                'message' => $errorMessage . ' Détails: ' . $e->getMessage(),
                'valid' => false
            ];
        }
    }
}
