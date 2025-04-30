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
    private string $twilioVerifyServiceSid;
    private bool $isDev;
    private LoggerInterface $logger;

    /**
     * Constructeur du service
     */
    public function __construct(
        string $twilioSid,
        string $twilioToken,
        string $twilioVerifyServiceSid,
        bool $isDev,
        LoggerInterface $logger
    ) {
        $this->twilioSid = $twilioSid;
        $this->twilioToken = $twilioToken;
        $this->twilioVerifyServiceSid = $twilioVerifyServiceSid;
        $this->isDev = $isDev;
        $this->logger = $logger;
    }

    /**
     * Envoie un code de vérification via Twilio Verify
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
            
            // Log des informations de configuration
            $this->logger->info('Tentative d\'envoi de code de vérification avec Twilio Verify', [
                'to' => $to,
                'service_sid' => $this->twilioVerifyServiceSid,
                'sid' => $this->twilioSid,
                'token_masked' => substr($this->twilioToken, 0, 4) . '...' . substr($this->twilioToken, -4),
                'is_dev' => $this->isDev ? 'true' : 'false'
            ]);
            
            // Vérification des identifiants
            if (empty($this->twilioSid) || strlen($this->twilioSid) < 10 || 
                empty($this->twilioToken) || strlen($this->twilioToken) < 10 ||
                empty($this->twilioVerifyServiceSid) || strlen($this->twilioVerifyServiceSid) < 10) {
                throw new \Exception('Identifiants Twilio ou Service SID invalides ou manquants');
            }
            
            // Initialisation du client Twilio
            $client = new Client($this->twilioSid, $this->twilioToken);
            
            // Envoi du code de vérification via Twilio Verify
            $verification = $client->verify->v2->services($this->twilioVerifyServiceSid)
                ->verifications
                ->create($to, "sms");
            
            $this->logger->info('Code de vérification envoyé à {to} avec succès, SID: {sid}', [
                'to' => $to,
                'sid' => $verification->sid
            ]);
            
            return [
                'success' => true,
                'message' => 'Code de vérification envoyé avec succès',
                'sid' => $verification->sid
            ];
        } catch (\Exception $e) {
            // Log détaillé de l'erreur
            $this->logger->error('Erreur détaillée lors de l\'envoi du code de vérification à {to}: {error}', [
                'to' => $to,
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            // Vérification des erreurs courantes
            $errorMessage = 'Erreur lors de l\'envoi du code de vérification';
            
            if (strpos($e->getMessage(), 'authenticate') !== false) {
                $errorMessage = 'Erreur d\'authentification Twilio. Vérifiez vos identifiants SID et Token.';
            } elseif (strpos($e->getMessage(), 'not a valid phone') !== false) {
                $errorMessage = 'Le numéro de téléphone n\'est pas valide.';
            } elseif (strpos($e->getMessage(), 'trial account') !== false) {
                $errorMessage = 'Votre compte d\'essai Twilio ne peut envoyer des codes qu\'aux numéros vérifiés.';
            } elseif (strpos($e->getMessage(), 'service') !== false) {
                $errorMessage = 'Le service Twilio Verify n\'est pas correctement configuré.';
            }
            
            return [
                'success' => false,
                'message' => $errorMessage . ' Détails: ' . $e->getMessage(),
                'sid' => null
            ];
        }
    }
    
    /**
     * Vérifie un code de vérification via Twilio Verify
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
            $this->logger->info('Tentative de vérification de code avec Twilio Verify', [
                'to' => $to,
                'code_length' => strlen($code),
                'service_sid' => $this->twilioVerifyServiceSid
            ]);
            
            // Initialisation du client Twilio
            $client = new Client($this->twilioSid, $this->twilioToken);
            
            // Vérification du code via Twilio Verify
            $verificationCheck = $client->verify->v2->services($this->twilioVerifyServiceSid)
                ->verificationChecks
                ->create([
                    'to' => $to,
                    'code' => $code
                ]);
            
            $isValid = $verificationCheck->valid;
            
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
            } elseif (strpos($e->getMessage(), 'pending') !== false) {
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
