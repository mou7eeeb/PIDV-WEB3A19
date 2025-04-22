<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    // Afficher la liste des avis
    #[Route('/avis', name: 'avis_index')]
    public function index(AvisRepository $avisRepository): Response
    {
        return $this->render('avis/index.html.twig', [
            'avis' => $avisRepository->findAll(),
        ]);
    }

    // Créer un nouvel avis
    #[Route('/avis/new', name: 'avis_new')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirectToRoute('avis_index');
        }

        return $this->render('avis/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Afficher les détails d'un avis
    #[Route('/avis/{id}', name: 'avis_show')]
    public function show(Avis $avis): Response
    {
        return $this->render('avis/show.html.twig', [
            'avis' => $avis,
        ]);
    }

    // Modifier un avis existant
    #[Route('/avis/{id}/edit', name: 'avis_edit')]
    public function edit(Request $request, Avis $avis, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();
            return $this->redirectToRoute('avis_index');
        }

        return $this->render('avis/edit.html.twig', [
            'form' => $form->createView(),
            'avis' => $avis,
        ]);
    }

    // Supprimer un avis
    #[Route('/avis/{id}/delete', name: 'avis_delete', methods: ['POST'])]
    public function delete(Request $request, Avis $avis, ManagerRegistry $doctrine): Response
    {
        if ($this->isCsrfTokenValid('delete' . $avis->getId(), $request->request->get('_token'))) {
            $entityManager = $doctrine->getManager();
            $entityManager->remove($avis);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avis_index');
    }
}
