<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $slugger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $file): string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            // Créer le répertoire cible s'il n'existe pas
            if (!file_exists($this->getTargetDirectory())) {
                mkdir($this->getTargetDirectory(), 0777, true);
            }
            
            // Déplacer le fichier vers le répertoire cible
            $file->move($this->getTargetDirectory(), $fileName);
            
            // Vérifier que le fichier a bien été déplacé
            if (!file_exists($this->getTargetDirectory() . '/' . $fileName)) {
                throw new FileException('Le fichier n\'a pas été correctement téléchargé.');
            }
        } catch (FileException $e) {
            // Gérer l'exception si quelque chose se passe pendant le téléchargement du fichier
            throw new \Exception('Une erreur est survenue lors du téléchargement de votre image: ' . $e->getMessage());
        }

        return $fileName;
    }

    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }
}
