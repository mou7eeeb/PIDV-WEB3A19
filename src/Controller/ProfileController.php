<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileImageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/compte')]
#[IsGranted('ROLE_USER')]
class ProfileController extends AbstractController
{
    #[Route('/upload-image', name: 'app_profile_upload_image', methods: ['GET', 'POST'])]
    public function uploadImage(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        
        $form = $this->createForm(ProfileImageType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                try {
                    // Supprimer l'ancienne image si elle existe
                    $oldImage = $user->getProfileImage();
                    if ($oldImage) {
                        $oldImagePath = $this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/' . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    
                    // Générer un nom de fichier unique
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                    
                    // Déplacer le fichier dans le répertoire où les images sont stockées
                    $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/';
                    
                    // Créer le répertoire s'il n'existe pas
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    $imageFile->move($uploadDir, $newFilename);
                    
                    // Mettre à jour l'entité User
                    $user->setProfileImage($newFilename);
                    $entityManager->flush();
                    
                    $this->addFlash('success', 'Votre photo de profil a été mise à jour avec succès.');
                    
                    return $this->redirectToRoute('mon_compte');
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement de l\'image : ' . $e->getMessage());
                }
            }
        }
        
        return $this->render('user/upload_image.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
