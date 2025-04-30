<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestUploadController extends AbstractController
{
    #[Route('/test-upload', name: 'app_test_upload')]
    public function index(Request $request): Response
    {
        $uploadSuccess = false;
        $uploadedImagePath = null;
        $fileInfo = null;
        $error = null;
        
        if ($request->isMethod('POST') && $request->files->has('image')) {
            $file = $request->files->get('image');
            
            if ($file) {
                $fileInfo = [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'type' => $file->getMimeType(),
                    'error' => $file->getError()
                ];
                
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/';
                
                // Créer le répertoire s'il n'existe pas
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                $fileName = 'test_' . time() . '.' . $file->guessExtension();
                
                try {
                    $file->move($uploadDir, $fileName);
                    $uploadSuccess = true;
                    $uploadedImagePath = '/uploads/profile_images/' . $fileName;
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        
        $systemInfo = [
            'uploadDir' => $this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/',
            'dirExists' => file_exists($this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/'),
            'isWritable' => is_writable($this->getParameter('kernel.project_dir') . '/public/uploads/profile_images/'),
            'uploadMaxFilesize' => ini_get('upload_max_filesize'),
            'postMaxSize' => ini_get('post_max_size'),
            'temporaryDir' => sys_get_temp_dir(),
            'temporaryDirWritable' => is_writable(sys_get_temp_dir())
        ];
        
        return $this->render('test_upload/index.html.twig', [
            'uploadSuccess' => $uploadSuccess,
            'uploadedImagePath' => $uploadedImagePath,
            'fileInfo' => $fileInfo,
            'error' => $error,
            'systemInfo' => $systemInfo
        ]);
    }
}
