<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionPublicController extends AbstractController
{
    #[Route('/inscription/{id}', name: 'app_inscription_create', methods: ['POST'])]
    public function create(Request $request, int $id, FormationRepository $formationRepository, EntityManagerInterface $entityManager): Response
    {
        // Récupérer la formation pour vérifier qu'elle existe
        $formation = $formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée.');
            return $this->redirectToRoute('app_home');
        }
        
        // Simuler un utilisateur connecté (à remplacer par la gestion d'authentification réelle)
        $userId = 1; // Remplacer par l'ID de l'utilisateur connecté
        
        // Créer une nouvelle inscription
        $inscription = new Inscription();
        $inscription->setUserId($userId);
        $inscription->setFormationId($formation->getPublicationId()); // Utiliser le Publication ID au lieu de l'ID numérique
        $inscription->setDateInscription(new \DateTime());
        
        // Persister l'inscription
        $entityManager->persist($inscription);
        $entityManager->flush();
        
        // Ajouter un message flash de succès
        $this->addFlash('success', 'Votre inscription a été enregistrée avec succès.');
        
        // Rediriger vers la page d'accueil
        return $this->redirectToRoute('app_home');
    }
}
