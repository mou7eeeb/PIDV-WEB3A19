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
        $options->set('defaultFont', 'Helvetica');
        $options->setIsRemoteEnabled(true);
        
        $this->domPdf->setOptions($options);
    }
    
    public function generatePdf($html, $filename = 'document.pdf')
    {
        $this->domPdf->loadHtml($html);
        $this->domPdf->setPaper('A4', 'portrait');
        $this->domPdf->render();
        
        $this->domPdf->stream($filename, [
            'Attachment' => true
        ]);
    }
    
    public function generateBinaryPdf($html)
    {
        $this->domPdf->loadHtml($html);
        $this->domPdf->setPaper('A4', 'portrait');
        $this->domPdf->render();
        
        return $this->domPdf->output();
    }
}
