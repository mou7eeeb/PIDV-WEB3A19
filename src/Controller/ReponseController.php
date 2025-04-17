<?php

namespace App\Controller;

use App\Entity\Reponse;
use App\Form\ReponseType;
use App\Repository\ReponseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Reclamation;


#[Route('/reponse')]
final class ReponseController extends AbstractController{
    #[Route(name: 'app_reponse_index', methods: ['GET'])]
    public function index(ReponseRepository $reponseRepository): Response
    {
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponseRepository->findAll(),
        ]);
    }

    #[Route('/new/{reclamationId}', name: 'app_reponse_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, int $reclamationId = null): Response
    {
        $reponse = new Reponse();
    
        if ($reclamationId) {
            $reclamation = $entityManager->getRepository(Reclamation::class)->find($reclamationId);
            if ($reclamation) {
                $reponse->setReclamation($reclamation);
            }
        }
    
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $reclamation = $reponse->getReclamation();
            if ($reclamation) {
                $reclamation->setNombreReponses($reclamation->getNombreReponses() + 1);
                $entityManager->persist($reclamation);
            }
    
            $entityManager->persist($reponse);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_reclamation_index');
        }
    
        return $this->render('reponse/new.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }
    

    #[Route('/{id}', name: 'app_reponse_show', methods: ['GET'])]
    public function show(Reponse $reponse): Response
    {
        return $this->render('reponse/show.html.twig', [
            'reponse' => $reponse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponse_edit', methods: ['GET', 'POST'])]
public function edit(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(ReponseType::class, $reponse);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        // 🔁 Récupération de l'ID de la réclamation liée à la réponse
        $reclamationId = $reponse->getReclamation()->getId();

        return $this->redirectToRoute('app_reclamation_show', ['id' => $reclamationId], Response::HTTP_SEE_OTHER);
    }

    return $this->render('reponse/edit.html.twig', [
        'reponse' => $reponse,
        'form' => $form,
    ]);
}


    #[Route('/{id}', name: 'app_reponse_delete', methods: ['POST'])]
    public function delete(Request $request, Reponse $reponse, EntityManagerInterface $entityManager): Response
    {
        $reclamationId = $reponse->getReclamation()->getId(); // 🔑 on récupère l'ID de la réclamation avant suppression
    
        if ($this->isCsrfTokenValid('delete'.$reponse->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reponse);
            $entityManager->flush();
        }
    
        return $this->redirectToRoute('app_reclamation_show', ['id' => $reclamationId], Response::HTTP_SEE_OTHER);
    }
}    