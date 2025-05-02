<?php
// src/Controller/HomeController.php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository->findAll();
        
        // Définir les catégories de formations
        $categories = [
            'Développement Web' => [],
            'Design & Création' => [],
            'Marketing Digital' => [],
            'Rédaction & Traduction' => []
        ];
        
        // Répartir les formations dans les catégories (pour l'exemple, on les distribue aléatoirement)
        foreach ($formations as $formation) {
            $categoryKeys = array_keys($categories);
            $randomCategory = $categoryKeys[array_rand($categoryKeys)];
            $categories[$randomCategory][] = $formation;
        }
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'formations' => $formations,
            'categories' => $categories
        ]);
    }

    #[Route('/admin', name: 'admin_dashboard')]
    public function adminDashboard(): Response
    {
        return $this->redirectToRoute('admin_formation_index');
    }
    
    #[Route('/formations', name: 'app_formations')]
    public function allFormations(FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository->findAll();
        
        return $this->render('home/formations.html.twig', [
            'formations' => $formations
        ]);
    }
    
    #[Route('/formations/categorie/{category}', name: 'app_formations_category')]
    public function formationsByCategory(string $category, FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository->findAll();
        
        // Dans une vraie application, vous filtreriez par catégorie dans la base de données
        // Pour l'exemple, on simule un filtrage
        
        return $this->render('home/formations.html.twig', [
            'formations' => $formations,
            'category' => $category
        ]);
    }
}
