<?php
require 'vendor/autoload.php';
require '../../user_id.php';
$query=$con->exec("delete from formations where user_id=$user_id");
$query=$con->exec("delete from experiences where user_id=$user_id");
$query=$con->exec("delete from skills where user_id=$user_id");
// session_start();
error_reporting(E_ALL ^ E_WARNING); 
// Initialize and load PDF Parser library 
$parser = new \Smalot\PdfParser\Parser(); 
if(!isset($_SESSION['cv'])){header("location:login.php");
}
else{
    echo $_SESSION['cv'];
    $file = '../DOSSIER/'.$_SESSION['cv']; 
    // header("location:login.php");
}
// Source PDF file to extract text 


// Parse pdf file using Parser library 
$pdf = $parser->parseFile($file); 

// Extract text from PDF 
$textContent = $pdf->getText();
$ypattern = '/(2\s*0|1\s*9)\s*\d\s*\d\s*/i';
//regex breakdown:either 20 or 19 (20|19) two digit after them (\d{2}) space from zero to  /s - (/W) minus character /i insensitive
$yearpattern='/(2\s*0|1\s*9)\s*\d\s*\d\s*(\W|\w|–)\s*(2\s*0|1\s*9)\s*\d\s*\d\s*|(2\s*0|1\s*9)\s*\d\s*\d\s*\W\s*[A-Za-z]*\s*/i';
$yearpattern1='/(2\s*0|1\s*9)\s*\d\s*\d\s*(\W|\w|–)\s*(2\s*0|1\s*9)\s*\d\s*\d/i';
$yearpattern2='/(2\s*0|1\s*9)\s*\d\s*\d\s*(\W|\w|–)\s*[A-Za-z]*\s*/i';
$ypatterns0='/(20|19)(\d{2})\s+-\s(20|19)(\d{2})|(20|19)(\d{2})+-(20|19)(\d{2})|(20|19)(\d{2})\s+-\s[A-Za-z]*|(20|19)(\d{2})+-[A-Za-z]*/i';

$pattern="/((J\s*a\s*n\s*v\s*(i\s*e\s*r)?|F\s*(e|é)\s*v\s*r\s*(i\s*e\s*r)?|M\s*a\s*r\s*s|A\s*v\s*r\s*(i\s*l)?|M\s*a\s*i|J\s*u\s*i\s*n|j\s*u\s*i\s*l\s*l\s*(e\s*t)?|A\s*o\s*(u|û)\s*t|S\s*e\s*p\s*t\s*(e\s*m\s*b\s*r\s*e)?|O\s*c\s*t\s*(o\s*b\s*r\s*e)?|N\s*o\s*v\s*(e\s*m\s*b\s*r\s*e)?|D\s*(e|é)\s*c\s*(e\s*m\s*b\s*r\s*e)?)\s*)?(2\s*0|1\s*9)\s*\d\s*\d\s*((\W|\w|–)|(a|à)|(j\s*u\s*s\s*q\s*u\s*'\s*(a|à)))?\s*((J\s*a\s*n\s*v\s*(i\s*e\s*r)?|F\s*(e|é)\s*v\s*(r\s*i\s*e\s*r)?|M\s*a\s*r\s*s|A\s*v\s*r\s*(i\s*l)?|M\s*a\s*i|J\s*u\s*i\s*n|j\s*u\s*i\s*l\s*l\s*(e\s*t)?|A\s*o\s*(u|û)\s*t|s\s*e\s*p\s*t\s*(e\s*m\s*b\s*r\s*e)?|O\s*c\s*t\s*(o\s*b\s*r\s*e)?|N\s*o\s*v\s*(e\s*m\s*b\s*r\s*e)?|D\s*(e|é)\s*c\s*(e\s*m\s*b\s*r\s*e)?))?\s*(2\s*0|1\s*9)\s*\d\s*\d/i";

