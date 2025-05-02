<?php

namespace App\Controller\Admin;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Repository\InscriptionRepository;
use App\Service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/inscription')]
class InscriptionController extends AbstractController
{
    #[Route('/', name: 'admin_inscription_index', methods: ['GET'])]
    public function index(Request $request, InscriptionRepository $inscriptionRepository): Response
    {
        $sortOrder = $request->query->get('sort', 'DESC');
        $searchTerm = $request->query->get('q');
        
        if ($searchTerm) {
            $inscriptions = $inscriptionRepository->findBySearchTerm($searchTerm, $sortOrder);
        } else {
            if ($sortOrder === 'ASC') {
                $inscriptions = $inscriptionRepository->findAllOrderByDateAsc();
            } else {
                $inscriptions = $inscriptionRepository->findAllOrderByDateDesc();
            }
        }
        
        return $this->render('admin/inscription/index.html.twig', [
            'inscriptions' => $inscriptions,
            'searchTerm' => $searchTerm,
            'currentSort' => $sortOrder,
        ]);
    }

    #[Route('/export-pdf', name: 'admin_inscription_export_all_pdf', methods: ['GET'])]
    public function exportAllPdf(InscriptionRepository $inscriptionRepository, PdfService $pdfService): Response
    {
        $inscriptions = $inscriptionRepository->findAll();
        
        $html = $this->renderView('admin/inscription/pdf/all_inscriptions.html.twig', [
            'inscriptions' => $inscriptions,
        ]);
        
        return new Response(
            $pdfService->generateBinaryPdf($html),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="liste_inscriptions.pdf"'
            ]
        );
    }

    #[Route('/new', name: 'admin_inscription_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $inscription = new Inscription();
        $inscription->setDateInscription(new \DateTime());
        
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($inscription);
            $entityManager->flush();

            $this->addFlash('success', 'L\'inscription a été créée avec succès.');
            return $this->redirectToRoute('admin_inscription_index');
        }

        return $this->render('admin/inscription/new.html.twig', [
            'inscription' => $inscription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/export-pdf', name: 'admin_inscription_export_single_pdf', methods: ['GET'])]
    public function exportSinglePdf(int $id, InscriptionRepository $inscriptionRepository, PdfService $pdfService): Response
    {
        $inscription = $inscriptionRepository->find($id);
        
        if (!$inscription) {
            throw $this->createNotFoundException('Inscription non trouvée');
        }
        
        $html = $this->renderView('admin/inscription/pdf/single_inscription.html.twig', [
            'inscription' => $inscription,
        ]);
        
        return new Response(
            $pdfService->generateBinaryPdf($html),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="inscription_' . $inscription->getId() . '.pdf"'
            ]
        );
    }

    #[Route('/{id}/edit', name: 'admin_inscription_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Inscription $inscription, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'L\'inscription a été modifiée avec succès.');
            return $this->redirectToRoute('admin_inscription_index');
        }

        return $this->render('admin/inscription/edit.html.twig', [
            'inscription' => $inscription,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_inscription_show', methods: ['GET'])]
    public function show(Inscription $inscription): Response
    {
        return $this->render('admin/inscription/show.html.twig', [
            'inscription' => $inscription,
        ]);
    }

    #[Route('/{id}', name: 'admin_inscription_delete', methods: ['POST'])]
    public function delete(Request $request, Inscription $inscription, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$inscription->getId(), $request->request->get('_token'))) {
            $entityManager->remove($inscription);
            $entityManager->flush();
            
            $this->addFlash('success', 'L\'inscription a été supprimée avec succès.');
        }

        return $this->redirectToRoute('admin_inscription_index');
    }
}
