<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    private $domPdf;
    
    public function __construct()
    {
        $this->domPdf = new Dompdf();
        
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->setIsRemoteEnabled(true);
        
        $this->domPdf->setOptions($options);
    }
    
    /**
     * Génère un PDF à partir d'un contenu HTML
     * 
     * @param string $html Le contenu HTML à convertir en PDF
     * @param string $filename Nom du fichier PDF à télécharger
     * @return string Contenu binaire du PDF
     */
    public function generatePdf(string $html, string $filename = 'document.pdf'): string
    {
        $this->domPdf->loadHtml($html);
        $this->domPdf->setPaper('A4', 'portrait');
        $this->domPdf->render();
        
        $this->domPdf->stream($filename, [
            'Attachment' => true
        ]);
        
        return $this->domPdf->output();
    }
    
    /**
     * Génère un PDF et le retourne comme réponse HTTP
     * 
     * @param string $html Le contenu HTML à convertir en PDF
     * @param string $filename Nom du fichier PDF à télécharger
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generatePdfResponse(string $html, string $filename = 'document.pdf')
    {
        $this->domPdf->loadHtml($html);
        $this->domPdf->setPaper('A4', 'portrait');
        $this->domPdf->render();
        
        return new \Symfony\Component\HttpFoundation\Response(
            $this->domPdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]
        );
    }
}
