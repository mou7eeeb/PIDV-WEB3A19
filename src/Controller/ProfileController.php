<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileImageType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Psr\Log\LoggerInterface;

#[Route('/compte')]
#[IsGranted('ROLE_USER')]
class ProfileController extends AbstractController
{
    #[Route('/upload-image', name: 'app_profile_upload_image', methods: ['GET', 'POST'])]
    public function uploadImage(
        Request $request, 
        EntityManagerInterface $entityManager, 
        FileUploader $fileUploader,
        LoggerInterface $logger
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        
        $form = $this->createForm(ProfileImageType::class, $user, [
            'validation_groups' => ['upload_image'] // Utiliser un groupe de validation spécifique
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            $logger->info('Formulaire soumis');
            
            // Vérifier s'il y a des erreurs dans le formulaire
            if (!$form->isValid()) {
                $errors = $form->getErrors(true);
                foreach ($errors as $error) {
                    if ($error->getSource() === $form->get('imageFile')) {
                        $logger->error('Erreur de formulaire: ' . $error->getMessage());
                        $this->addFlash('error', $error->getMessage());
                    }
                }
            }
            
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                try {
                    $logger->info('Début du traitement de l\'upload d\'image de profil');
                    
                    // Supprimer l'ancienne image si elle existe
                    $oldImage = $user->getProfileImage();
                    if ($oldImage) {
                        $oldImagePath = $this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/' . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                            $logger->info('Ancienne image supprimée: ' . $oldImagePath);
                        }
                    }
                    
                    // Utiliser le service FileUploader pour gérer l'upload
                    $fileName = $fileUploader->upload($imageFile);
                    $logger->info('Nouvelle image uploadée: ' . $fileName);
                    
                    // Mettre à jour l'entité User
                    $user->setProfileImage($fileName);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    $logger->info('Entité User mise à jour avec la nouvelle image');
                    
                    $this->addFlash('success', 'Votre photo de profil a été mise à jour avec succès.');
                    
                    return $this->redirectToRoute('mon_compte');
                } catch (\Exception $e) {
                    $logger->error('Erreur lors de l\'upload d\'image: ' . $e->getMessage());
                    $this->addFlash('error', 'Une erreur est survenue lors du téléchargement de l\'image : ' . $e->getMessage());
                }
            } else {
                $logger->warning('Aucun fichier image reçu');
                $this->addFlash('info', 'Aucune image n\'a été sélectionnée.');
            }
        }
        
        return $this->render('user/upload_image.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}
