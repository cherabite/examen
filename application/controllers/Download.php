<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends Controller_Preinscription {

    public function __construct() {
        parent::__construct();
       $this->load->model('M_inscriptic_eleve');
	   
    }
   
	public function index()  {
    $CODE_cwefd  =  $this->session->userdata('CODE_ANNEXE'); 
    $this->form_validation->set_rules('enpr'  , 'رقم الإستمارة ', 'trim|required|max_length[10]|encode_php_tags|xss_clean|callback_contient_sql');
    $this->form_validation->set_rules('document'      , 'نوع الوثيقة', 'trim|required|max_length[5]|encode_php_tags|xss_clean|callback_contient_sql');
    if ($this->form_validation->run() == FALSE) { 
	     	redirect('Inscriptic/index','refresh'); 
     }else{	
	  $enpr     = $this->input->post('enpr');
	  $document = $this->input->post('document');
	  if (file_exists(APPPATH . 'config/config.php')  && $enpr != NULL ) {
              include(APPPATH . 'config/config.php'); 
			//=======================================================================
			   if (isset($config['format_html']) && $config['format_html'] === TRUE && $enpr && $document && $CODE_cwefd ) {
                  $this->imp_format_html($enpr , $document ,$CODE_cwefd);
                  exit();
				}
			//=======================================================================	
			 if (isset($config['format_pdf_html2pdf']) && $config['format_pdf_html2pdf'] === TRUE && $enpr && $document && $CODE_cwefd ) {
                   $this->imp_format_pdf_html2pdf($enpr , $document ,$CODE_cwefd);
                   exit();
				}
			//=======================================================================
			 if (isset($config['format_pdf_tcpdf']) && $config['format_pdf_tcpdf'] === TRUE && $enpr && $document && $CODE_cwefd ) {
                   $this->imp_format_pdf_tcpdf($enpr , $document ,$CODE_cwefd);
                   exit();
				}
			//=======================================================================
			 if (isset($config['format_pdf_mpdf']) && $config['format_pdf_mpdf'] === TRUE && $enpr && $document && $CODE_cwefd ) {
                  $this->imp_format_pdf_mpdf($enpr , $document ,$CODE_cwefd);
				 
                  exit();
				}
			//=======================================================================
       }else{
		   echo 'error';
	   }
     }	   
	}
	
	public function imp_format_html($enpr , $document ,$CODE_cwefd) {
	 
					if ($document == 0){
						$data= $this->get_data_eleve_from_inseleve($enpr ,$CODE_cwefd);
						$f= $this->load->view('preinscription/impression/format_html/fourmulaire_preinscription.php', $data,true);
						echo $f;
					}elseif($document == 1){
						$data   = $this->session->userdata('DATA_VALID'); 
						$f= $this->load->view('preinscription/impression/format_html/attestation111.php', $data,true);
						echo $f;
					}elseif($document == 2){
						$data   = $this->session->userdata('DATA_VALID'); 
						$f= $this->load->view('preinscription/impression/format_html/convocation_cour.php', $data,true);
						echo $f;
					}elseif($document == 3){
						$data   = $this->session->userdata('DATA_VALID'); 
						$f= $this->load->view('preinscription/impression/format_html/inscriptic_valider.php', $data,true);
						echo $f;
					}
	 
	}
	public function imp_format_pdf_html2pdf($enpr , $document ,$CODE_cwefd) {
	 //  $data= $this->get_data_eleve_from_inseleve($enpr,$CODE_cwefd );	
	   if ($data !=null){
		                require_once(APPPATH.'libraries/html2pdf/html2pdf.class.php');
						$this->html2pdf = new HTML2PDF('P', 'A4', 'en');
						//$this->html2pdf->pdf->setLanguageArray($lg);
				        //	ob_start();
						if ($document == 0){			
									$fourmulaire  = $this->load->view('preinscription/impression/format_html2pdf/fourmulaire_preinscription.php', $data, true);
									$this->html2pdf->writeHTML($fourmulaire);
									$this->html2pdf->Output('fourmulaire_inscription.pdf','d');  
						}elseif($document == 1){
							$fourmulaire  = $this->load->view('preinscription/impression/format_html2pdf/attestation_inscription.php', $data, true);
									$this->html2pdf->writeHTML($fourmulaire);
									$this->html2pdf->Output('attestation_inscription.pdf','d');
						}elseif($document == 2){
									$fourmulaire  = $this->load->view('preinscription/impression/format_html2pdf/convocation_cours.php', $data, true);
									$this->html2pdf->writeHTML($fourmulaire);
									$this->html2pdf->Output('convocation_cours.pdf','d');
						}
	   }else{
		   echo 'error';
		   }
	}
	public function imp_format_pdf_tcpdf($enpr , $document ,$CODE_cwefd) {
	  		           if ($document == 0){	
                                   require_once('application/libraries/tcpdf/tcpdf.php');
								   // require_once('tcpdf_include.php');
									$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);     
									$pdf->SetAuthor('CH_K_ONEFD');
									$pdf->SetTitle('Attestation_inscription');
									$pdf->SetMargins(2, 5,2,1);
									$pdf->SetPrintHeader(false);
                                    $pdf->SetPrintFooter(false);  
								    $pdf->SetAutoPageBreak(true,2);
									$lg = Array();
									$lg['a_meta_charset']  = 'UTF-8';
									//$lg['a_meta_dir']      = 'rtl';
									$lg['a_meta_language'] = 'ar';
									$lg['w_page']          = 'page';
									$pdf->setLanguageArray($lg); 
									$pdf->setFontSubsetting(true);    
									$pdf->SetFont('mohammadbart1', '', 12); 
									$pdf->AddPage( ); 
                                    $data= $this->get_data_eleve_from_inseleve($enpr ,$CODE_cwefd);									
									$fourmulaire  = $this->load->view('preinscription/impression/format_tcpdf/fourmulaire_preinscription.php', $data, true);
									$pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);
									//ob_end_clean();
									$pdf->Output('formulaire_preinscription.pdf', 'I'); 
						}elseif($document == 1){
							  require_once('application/libraries/tcpdf/tcpdf.php');
							   // require_once('tcpdf_include.php');
								$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);     
								$pdf->SetAuthor('CH_K_ONEFD');
								$pdf->SetTitle('Attestation_inscription');
								$pdf->SetPrintHeader(false);
                                $pdf->SetPrintFooter(false);
							    $pdf->SetAutoPageBreak(false);
								$lg = Array();
								$lg['a_meta_charset']  = 'UTF-8';
								//$lg['a_meta_dir']      = 'rtl';
								$lg['a_meta_language'] = 'ar';
								//$lg['w_page']          = 'page';
								$pdf->setLanguageArray($lg); 
								$pdf->setFontSubsetting(true);    
								$pdf->SetFont('mohammadbart1', '', 14); 
								$pdf->AddPage( ); 
								    $data   = $this->session->userdata('DATA_VALID');
							        $fourmulaire  = $this->load->view('preinscription/impression/format_tcpdf/attestation_inscription.php', $data, true);
									$pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);
										$pdf->Output('Attestaion_inscriptic.pdf', 'D'); 
									//ob_end_clean();
						}elseif($document == 2){
							         require_once('application/libraries/tcpdf/tcpdf.php');
								   // require_once('tcpdf_include.php');
									$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);     
									$pdf->SetAuthor('CH_K_ONEFD');
									$pdf->SetTitle('convocation_cours');
									$pdf->SetMargins(5, 5,5,5);
									$pdf->SetPrintHeader(false);
                                    $pdf->SetPrintFooter(false);  
								    $pdf->SetAutoPageBreak(false,2);
									$lg = Array();
									$lg['a_meta_charset']  = 'UTF-8';
									//$lg['a_meta_dir']      = 'rtl';
									$lg['a_meta_language'] = 'ar';
									$lg['w_page']          = 'page';
									$pdf->setLanguageArray($lg); 
									$pdf->setFontSubsetting(true);    
									$pdf->SetFont('mohammadbart1', '', 12); 
									$pdf->AddPage( );
                                    $data   = $this->session->userdata('DATA_VALID');									
									$fourmulaire  = $this->load->view('preinscription/impression/format_tcpdf/convocation_cours.php', $data, true);
									$pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);
									//ob_end_clean();
									$pdf->Output('convocation_cours.pdf', 'D');
									
						}elseif($document == 3){
							         require_once('application/libraries/tcpdf/tcpdf.php');
								   // require_once('tcpdf_include.php');
									$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);     
									$pdf->SetAuthor('CH_K_ONEFD');
									$pdf->SetTitle('inscriptic_valider');
									$pdf->SetMargins(5, 5,5,5);
									$pdf->SetPrintHeader(false);
                                    $pdf->SetPrintFooter(false);  
								    $pdf->SetAutoPageBreak(false,2);
									$lg = Array();
									$lg['a_meta_charset']  = 'UTF-8';
									//$lg['a_meta_dir']      = 'rtl';
									$lg['a_meta_language'] = 'ar';
									$lg['w_page']          = 'page';
									$pdf->setLanguageArray($lg); 
									$pdf->setFontSubsetting(true);    
									$pdf->SetFont('mohammadbart1', '', 12); 
									$pdf->AddPage( ); 	
                                    $data   = $this->session->userdata('DATA_VALID'); 									
                                    $fourmulaire  = $this->load->view('preinscription/impression/format_tcpdf/inscriptic_valider.php', $data, true);									
									$pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);
									//ob_end_clean();
									$pdf->Output('inscriptic_valider.pdf', 'D');
									
						}
	  	  
	}
	public function imp_format_pdf_mpdf($enpr , $document ,$CODE_cwefd) {
	 $data= $this->get_data_eleve_from_inseleve($enpr ,$CODE_cwefd);	
	  if ($data !=null){
		            
                   
								    
					if ($document == 0){
						$this->load->view('preinscription/impression/format_mpdf/formulaire_preinscription_v2.php', $data);	
						/*ini_set('memory_limit', '256M');
						$fourmulaire  = $this->load->view('preinscription/impression/format_mpdf/formulaire_preinscription_v2.php', $data, true);						
						require_once('application/third_party/mpdf/mpdf/mpdf.php');
						$pdf = new mPDF();
                        $pdf->allow_charset_conversion=true; 
                        $pdf->charset_in = 'UTF-8';
                        $pdf->SetDisplayMode('fullpage');
					  
					  // ---------------------regler les marges en haut--------------------------------
						$pdf->SetMargins(0,0); 
									//--------------------regler les marges en bas---------------------------------
					    $pdf->SetAutoPageBreak(false,0);
						$pdf->WriteHTML($fourmulaire); // write the HTML into the PDF
					    $pdf->Output('fourmulaire_inscription.pdf','D');
						/*
                                    $stylesheet= 'body,p { font-family:xbriyaz; font-size:14px; margin-top:02px; margin-bottom:02px; text-align:right}
									h6{text-align:center; padding-top:2px; } ';
									 // $pdf->SetFont('AlArabiya');
								   // $pdf->SetMargins(2,2); 
									$pdf->WriteHTML($stylesheet, 1);						
									$fourmulaire  = $this->load->view('preinscription/impression/format_mpdf/formulaire_preinscription.php', $data, true);
									$pdf->WriteHTML($fourmulaire,2); // write the HTML into the PDF
					                $pdf->Output('fourmulaire_inscription.pdf','d'); */
									 
						}elseif($document == 1){
									ini_set('memory_limit', '256M');
									$this->load->library('pdf');
									$pdf = $this->pdf->load();
							        $fourmulaire  = $this->load->view('preinscription/impression/format_mpdf/attestation_inscription.php', $data, true);
									$pdf->WriteHTML($fourmulaire); // write the HTML into the PDF
					                $pdf->Output('attestation_inscription.pdf','d');
									
						}elseif($document == 2){
									ini_set('memory_limit', '256M');
									$this->load->library('pdf');
									$pdf = $this->pdf->load();
									$fourmulaire  = $this->load->view('preinscription/impression/format_mpdf/convocation_cours.php', $data, true);
									$pdf->WriteHTML($fourmulaire,2); // write the HTML into the PDF
					                $pdf->Output('convocation_cours.pdf','d');
									
						}
	  }else{
		  echo 'error';
		  }
	}
	//================ download loi d'inscription =========================//
	 
		   public function download_loi_inscription() { 
           $this->load->helper('download'); 
           $fileNamee = 'lois_inscription.pdf';	
           $file='assets/pdfs/'.$fileNamee;		   
		 /*  if ($fileName) {
			$path='assets/pdfs/'.$fileName;
			if (file_exists ($path)) {
			 $data = file_get_contents(base_url($path));
			
			 //force download
			 force_download ( $fileName, $data );
			 */
			 
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment;       filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        
			}else {
			 // Redirect to base url
			 redirect ( base_url () );
			}
		   }
	 
	//=====================================================================//
	//================ download GUIDE =========================//
	 
		   public function download_guide() { 
          
           $fileNamee = 'guide_apprenants_a_distance_onefd.pdf';		 
           $file='assets/pdfs/'.$fileNamee;		   
		
        if (file_exists($file)) {
			$this-> M_inscriptic_eleve -> get_nbr_download_guide();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment;       filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        
			}else {
			 // Redirect to base url
			 redirect ( base_url () );
			}
		   }
	 
	//=====================================================================//
	
	public function get_data_eleve_from_inseleve($enpr ,$CODE_cwefd) {
	      if(  $inseleve           = $this->M_inscriptic_eleve->get_data_inseleve($enpr,$CODE_cwefd )){
		    $data['ENPR']       = sprintf("%05d", $inseleve->ENPR);
            $data['COMMUNE']    = $inseleve -> COMMUNE;
			$data['DAIRA']      = $inseleve -> DAIRA;
			$data['WILAYA']     = $inseleve -> WILAYA;
            $data['CODEPOST']   = $inseleve -> CODEPOST;
            $data['IANNEE']     = $inseleve -> IANNEE;
			$data['ANNEXE']     = $inseleve -> ANNEXE;
			$data['COUR_ARA']   = $inseleve -> COURS;
            $data['STATUT']     = $inseleve -> STATUT;
            $data['NOM']        = $inseleve -> NOM_SCOL;
            $data['PRENOM']     = $inseleve -> PRENOM_SCOL;
            $data['NOMLAT']     = $inseleve -> NOMLAT;
            $data['PRENOMLAT']  = $inseleve -> PRENOMLAT;
            $data['SEXE']       = $inseleve -> SEXE;
            $data['ADRESSE']    = $inseleve -> ADRESSE;
            $data['TEL']        = $inseleve -> TEL;
			$data['ICODE']      = $inseleve -> ICODE;   
            $data['FRAISINS']   = $inseleve -> FRAISINS.'.00';
          //  $data['CATEGORIE']  = $inseleve -> CATEGORIE;
            $data['PRESENTIEL'] = $inseleve -> PRESENTIEL;
            $data['LNS']        = $inseleve -> LNS;  
			$data['ANNEEINS']   = $inseleve -> ANNEEINS;
			$data['ORDREC']     = $inseleve -> ORDREC;
			//=====================================================================
			
			            if($inseleve -> MENTION =='مقبول' && $inseleve -> FRAISINS  == '1677' ){
							$data['COUR_ARA']='أرضية التعليم الإلكتروني(للمقبولين)'; 
						}else{
							$data['COUR_ARA']   = $inseleve -> COURS;
						}
						if($inseleve -> NSEQ != ''){ 
							$data['MATR'] = $inseleve -> ANNEXE.$inseleve -> ANNEEINS.$inseleve -> NSEQ ;
						}else{
						   $data['MATR'] ='';	
						}
						$DATEINS             = date_create($inseleve -> DATEINS);
						$data['DATEINS']     = date_format($DATEINS, 'Y-m-d');
						//=====================================================================
						$DATPRINS            = date_create($inseleve ->DATPRINS);
						$data['DATPRINS']    = date_format($DATPRINS, 'd-m-Y');
						//=====================================================================
						//=====================================================================
						if($inseleve ->DTCONV=='0000-00-00' OR $inseleve ->DTCONV=='0000-00-00 00:00:00' OR $inseleve ->DTCONV ==''){
						  $data['DTCONV']=null;
						}else{
						$DTCONV            = date_create($inseleve ->DTCONV);
						$data['DTCONV']    = date_format($DTCONV, 'Y-m-d');
						}
						//=====================================================================
		                $date                = date_create($inseleve -> DNS);
						$DNS0                = date_format($date, 'Y-m-d');
						$DNS_rtl                = date_format($date, 'd-m-Y');
						$dns_pre             = date_format($date, 'Y');
						if ($inseleve -> PRESUME == 0) {
							$data['DNS']     = $DNS0;
							$data['DNS_rtl']     = $DNS_rtl;
						} else {
							$data['DNS']     = 'خـــلال ' . $dns_pre;
							$data['DNS_rtl']     = 'خـــلال ' . $dns_pre;
						}
						/*******************************استرجاع اسم المركز الولائي******************************/
						
						$data['ANNEXE_CENTRE']= $this->session->userdata('ANNEXE');
						$data['ann']          = substr($inseleve -> ANNEXE, 0, 1);
						$data['exe']          = substr($inseleve -> ANNEXE, 1, 1);
					//	$resultat_cwefd       = $this -> Operation_model->getCwefd_Annaxe($this->session->userdata('WILAYA'));
						$resultat_cwefd       = $this -> Operation_model->getCwefd($this->session->userdata('ANNEXE'));
		                $data['ADR_ANNEXE']   = $resultat_cwefd->ADR_CWEFD;
		                $data['TEL_ANNEXE']   = $resultat_cwefd->TEL_CWEFD;
					   /************************************* NIV FILLIERE ***********************************************/
						$niveau_filliere      = $this->Operation_model->getNiveauByicode($inseleve -> ICODE);
						$data['NIVEAU']       = $niveau_filliere->NIVEAU;
						$data['FILIERE']      = $niveau_filliere->FILIERE;
						/********************************** fraisins en letter ****************************************/
						$resul                = $this->Operation_model->getFrai_inscription_letter( $data['FRAISINS']);
		                $data['FRAI_LETTRE']  = $resul->FRAI_LETTRE;
						/****************************************************************************/
						if($inseleve -> INSCRITBAC == 0){ 
						$data['INSCRITBAC'] = 'لا';
						}else{
							$data['INSCRITBAC'] = 'نعم';}
						/*******************************************************************************/
                        $categorie=$this->Operation_model->getCategorieByID( $inseleve -> CATEGORIE);
			            $data['CATEGORIE']= $categorie->CATEGORIE;						
					  
		return $data;
	}else{
		return NULL;
	}
	
	}
	public function aide()  {
		
	$this->load->view('preinscription/impression/aide-ecris');	
	}
	public function contact()  {
		
	$this->load->view('preinscription/impression/contact');	
	}
	 public function logout(){
		    $CODE_cwefd  =  $this->session->userdata('CODE_ANNEXE');
            unset(
			$_SESSION['ANNEXE'],$_SESSION['WILAYA'],$_SESSION['alldaira'],$_SESSION['icodePASS'],$_SESSION['PRESUME'],$_SESSION['DNS'],$_SESSION['auth_anc_eleve']
			);
            header("cache-Control: no-store, no-cache, must-revalidate");
            header("cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
			
            
           // exit;
        }
}