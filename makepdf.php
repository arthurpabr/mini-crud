<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
// Define relative path from this script to mPDF
define('_MPDF_PATH','../mpdf/');

include(_MPDF_PATH . "mpdf.php");
$url = urldecode($_REQUEST['url']);

// To prevent anyone else using your script to create their PDF files
//if (!preg_match('/^http:\/\/www\.mydomain\.com/', $url)) { die("Access denied"); }

// For $_POST i.e. forms with fields
if (count($_POST)>0) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );
    foreach($_POST AS $name=>$post) {
        $formvars = array($name=>$post." \n");
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $formvars);
    $html = curl_exec($ch);
    curl_close($ch);
}
else if (ini_get('allow_url_fopen')) {
    $html = file_get_contents($url);
}
else {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
    $html = curl_exec($ch);
    curl_close($ch);
}

$mpdf=new mPDF();
$mpdf->useSubstitutions = true;

$mpdf->SetAuthor('Cláudio');
$mpdf->setBasePath($url);
$mpdf->SetCreator('Han Solo');
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetFooter('||Página {PAGENO}');
$mpdf->SetKeywords('palavras, chave, aqui');
$mpdf->SetSubject("Assunto deste documento"); 
$mpdf->SetTitle('Titulo do PDF'); 

$html = str_replace('<body>', '<tocentry content="A4 landscape" /><body>', $html);
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;