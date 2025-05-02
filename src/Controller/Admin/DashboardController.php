<?php

namespace App\Controller\Admin;

use App\Repository\FormationRepository;
use App\Repository\InscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard', methods: ['GET'])]
    public function index(FormationRepository $formationRepository, InscriptionRepository $inscriptionRepository): Response
    {
        // Récupérer toutes les formations
        $formations = $formationRepository->findAll();
        
        // Récupérer toutes les inscriptions
        $inscriptions = $inscriptionRepository->findAll();
        
        // Statistiques des formations
        $statsFormations = [
            'total' => count($formations),
            'placesTotal' => array_sum(array_map(function($f) { return $f->getNombrePlaces(); }, $formations)),
            'prixMoyen' => count($formations) > 0 ? array_sum(array_map(function($f) { return $f->getPrix(); }, $formations)) / count($formations) : 0,
        ];
        
        // Statistiques des inscriptions
        $statsInscriptions = [
            'total' => count($inscriptions),
            'aujourdhui' => count(array_filter($inscriptions, function($i) {
                return $i->getDateInscription()->format('Y-m-d') === (new \DateTime())->format('Y-m-d');
            })),
        ];
        
        return $this->render('admin/dashboard/index.html.twig', [
            'statsFormations' => $statsFormations,
            'statsInscriptions' => $statsInscriptions,
            'formations' => $formations,
            'inscriptions' => $inscriptions,
        ]);
    }
}
