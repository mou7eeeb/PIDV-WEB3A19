<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use App\Service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/formation')]
class FormationController extends AbstractController
{
    #[Route('/', name: 'admin_formation_index', methods: ['GET'])]
    public function index(Request $request, FormationRepository $formationRepository): Response
    {
        $searchTerm = $request->query->get('q');
        
        if ($searchTerm) {
            $formations = $formationRepository->findBySearchTerm($searchTerm);
        } else {
            $formations = $formationRepository->findAll();
        }
        
        return $this->render('admin/formation/index.html.twig', [
            'formations' => $formations,
            'searchTerm' => $searchTerm,
        ]);
    }

    #[Route('/export-pdf', name: 'admin_formation_export_all_pdf', methods: ['GET'])]
    public function exportAllPdf(FormationRepository $formationRepository, PdfService $pdfService): Response
    {
        $formations = $formationRepository->findAll();
        
        $html = $this->renderView('admin/formation/pdf/all_formations.html.twig', [
            'formations' => $formations,
        ]);
        
        return new Response(
            $pdfService->generateBinaryPdf($html),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="liste_formations.pdf"'
            ]
        );
    }

    #[Route('/new', name: 'admin_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formation);
            $entityManager->flush();

            $this->addFlash('success', 'La formation a été créée avec succès.');
            return $this->redirectToRoute('admin_formation_index');
        }

        return $this->render('admin/formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_formation_show', methods: ['GET'])]
    public function show(Formation $formation): Response
    {
        return $this->render('admin/formation/show.html.twig', [
            'formation' => $formation,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formation $formation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'La formation a été modifiée avec succès.');
            return $this->redirectToRoute('admin_formation_index');
        }

        return $this->render('admin/formation/edit.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/export-pdf', name: 'admin_formation_export_single_pdf', methods: ['GET'])]
    public function exportSinglePdf(int $id, FormationRepository $formationRepository, PdfService $pdfService): Response
    {
        $formation = $formationRepository->find($id);
        
        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée');
        }
        
        $html = $this->renderView('admin/formation/pdf/single_formation.html.twig', [
            'formation' => $formation,
        ]);
        
        return new Response(
            $pdfService->generateBinaryPdf($html),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="formation_' . $formation->getPublicationId() . '.pdf"'
            ]
        );
    }

    #[Route('/{id}', name: 'admin_formation_delete', methods: ['POST'])]
    public function delete(Request $request, Formation $formation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($formation);
            $entityManager->flush();
            
            $this->addFlash('success', 'La formation a été supprimée avec succès.');
        }

        return $this->redirectToRoute('admin_formation_index');
    }

    #[Route('/search', name: 'admin_formation_search', methods: ['GET'])]
    public function search(Request $request, FormationRepository $formationRepository): Response
    {
        $searchTerm = $request->query->get('q');
        
        if ($searchTerm) {
            $formations = $formationRepository->findBySearchTerm($searchTerm);
        } else {
            $formations = $formationRepository->findAll();
        }
        
        return $this->render('admin/formation/_search_results.html.twig', [
            'formations' => $formations,
            'searchTerm' => $searchTerm,
        ]);
    }
}
