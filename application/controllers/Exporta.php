<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exporta extends CI_Controller {

	public function export() {
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

var_dump($url);
var_dump($html);
		//$mpdf=new mPDF('');
		//$mpdf->useSubstitutions = true; // optional - just as an example
		//$mpdf->SetHeader($url.'||Página {PAGENO}');  // optional - just as an example
		//$mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
		//$mpdf->setBasePath($url);
		//$mpdf->WriteHTML($html);
		//$mpdf->Output();
		exit;
	}
}