<?php
// Include autoloader 
require_once '../../vendor\autoload.php'; 
require 'usse.php';
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
// Load content from html file 
$html = file_get_contents("output.html"); 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$customPaper = array(0,0,793,800);
$dompdf->set_paper($customPaper); 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));
?>