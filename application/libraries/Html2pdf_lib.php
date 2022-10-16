<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Html2pdf_lib {
  
  function __construct($params = null) {
	     $lg=Array();
$lg['a_meta_charset']='UTF-8';
$lg['a_meta_dir']='rtl';
$lg['a_meta_language']='fa';
$lg['w_page']='page';
    require_once(APPPATH.'libraries/html2pdf/html2pdf.class.php');
   

    $this->html2pdf = new HTML2PDF('P', 'A4', 'en');
	//$this->html2pdf->pdf->setLanguageArray($lg);
    $this->CI =& get_instance();
  }
  
  function converHtml2pdf($content,$filename = null,$save_to = null) {
	
	//================================================================
    try {
    ob_start();
	//$content = ob_get_clean();
				$this->html2pdf->writeHTML($content);
				if ($save_to == '' || $save_to == null) {
				  $pdffile = $this->html2pdf->Output($filename,FALSE);
				} else {
				  $this->CI->load->helper('file');
				  $pdffile = $this->html2pdf->Output($filename,TRUE);
				  if (! write_file($save_to.'/'.$filename,$pdffile)) {
					return false;
				  } else {
					return true;
				  }
               }
	} catch (Html2PdfException $e) {
    $this->$html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
   }
//====================================================================   
  }
}
