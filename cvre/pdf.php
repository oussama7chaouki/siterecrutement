<?php
$pdf = 'testupload\DOSSIER\Admin1.pdf';
header('Content-type: application/pdf');
readfile($pdf);
?>