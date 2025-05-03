<?php 

namespace App\Controller;

use App\Entity\Mission;
use App\Entity\Candidature;
use App\Form\CandidatureType;
use App\Repository\MissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    #[Route('/missions', name: 'app_frontend_missions')]
    public function listMissions(MissionRepository $missionRepository): Response
    {
        $missions = $missionRepository->findAll();
        return $this->render('frontend/mission/list.html.twig', [
            'missions' => $missions,
        ]);
    }

    #[Route('/missions/{id}/apply', name: 'app_frontend_apply', methods: ['GET', 'POST'])]
    public function applyToMission(Request $request, Mission $mission, EntityManagerInterface $entityManager): Response
    {
        $candidature = new Candidature();
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Associer l'utilisateur connecté à la candidature
            $candidature->setUser($this->getUser());
            $candidature->setMission($mission);

            $entityManager->persist($candidature);
            $entityManager->flush();

            $this->addFlash('success', 'Votre candidature a été soumise avec succès.');
            return $this->redirectToRoute('app_frontend_missions');
        }

        return $this->render('frontend/candidature/new.html.twig', [
            'form' => $form->createView(),
            'mission' => $mission,
        ]);
    }
}