<?php
/** MAKE SURE TO HAVE THE INCLUDES RUNNING PROPERLY */
require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
    function PlaceWatermark($file, $text, $xxx, $yyy, $op, $outdir) {
require_once('fpdi/src/autoload.php');
require_once 'fpdf/fpdf.php';
function copyTransparent($src, $output)
    {
        $dimensions = getimagesize($src);
        $x = $dimensions[0];
        $y = $dimensions[1];
        $im = imagecreatetruecolor($x,$y); 
        $src_ = imagecreatefrompng($src); 
        // Prepare alpha channel for transparent background
        $alpha_channel = imagecolorallocatealpha($im, 255, 255, 255, 127); 
        imagecolortransparent($im, $alpha_channel); 
        // Fill image
        imagefill($im, 0, 0, $alpha_channel); 
        // Copy from other
        imagecopy($im,$src_, 0, 0, 0, 0, $x, $y); 
        // Save transparency
        imagesavealpha($im,true); 
        // Save PNG
        imagepng($im,$output,9); 
        imagedestroy($im); 
    }
$png = 'https://seeklogo.com/images/A/aldar-properties-logo-DE07959BAB-seeklogo.com.png';

    copyTransparent($png,"png.png");
$imageURL = 'png.png'; 

     $imgWidth = 50;
$pdf = new FPDI();
    if (file_exists("./".$file)){
        $pagecount = $pdf->setSourceFile($file);
    } else {
        return FALSE;
    }
for($i=1; $i <= $pagecount; $i++) { 
     $tpl = $pdf->importPage($i);               
     $pdf->addPage(); 
     $pdf->useTemplate($tpl, 5, 5);
$pdf->Image($imageURL, $xxx, $yyy,30);
}


    if ($outdir === TRUE){
        return $pdf->Output("files/stampled".'.pdf','F');;
    } else {
        return $pdf->Output("files/stampled".'.pdf','F');;
    }
}
$images='https://seeklogo.com/images/A/aldar-properties-logo-DE07959BAB-seeklogo.com.png';
PlaceWatermark("document.pdf", $images, 90, 100, 100,TRUE);




