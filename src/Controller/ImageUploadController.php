<?php

namespace App\Controller;

use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class ImageUploadController extends AbstractController
{
    private $logger;
    private $slugger;
    private $imagesDirectory;

    public function __construct(
        LoggerInterface $logger,
        SluggerInterface $slugger,
        string $generalImagesDirectory
    ) {
        $this->logger = $logger;
        $this->slugger = $slugger;
        $this->imagesDirectory = $generalImagesDirectory;
    }

    #[Route('/api/upload-image', name: 'api_upload_image', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
        // Récupérer le fichier
        $file = $request->files->get('image');

        if (!$file) {
            return new JsonResponse(['error' => 'Aucune image reçue.'], 400);
        }

        // Vérifier le type de fichier
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
            return new JsonResponse([
                'error' => 'Format non supporté. Formats acceptés: JPG, PNG, GIF.'
            ], 400);
        }

        // Vérifier la taille du fichier (max 5MB)
        if ($file->getSize() > 5 * 1024 * 1024) {
            return new JsonResponse([
                'error' => 'L\'image est trop volumineuse. Taille maximale: 5MB.'
            ], 400);
        }

        try {
            // Créer une instance dédiée de FileUploader pour ce répertoire
            $fileUploader = new FileUploader($this->imagesDirectory, $this->slugger);
            
            // Upload du fichier
            $fileName = $fileUploader->upload($file);
            
            // Construire l'URL de l'image (relative au dossier public)
            $imageUrl = '/uploads/images/' . $fileName;
            
            $this->logger->info('Image uploadée avec succès: ' . $imageUrl);
            
            return new JsonResponse([
                'success' => true,
                'message' => 'Image uploadée avec succès',
                'url' => $imageUrl
            ]);
            
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de l\'upload d\'image: ' . $e->getMessage());
            
            return new JsonResponse([
                'success' => false,
                'error' => 'Erreur pendant l\'upload: ' . $e->getMessage()
            ], 500);
        }
    }
}
