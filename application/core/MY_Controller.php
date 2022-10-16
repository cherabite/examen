<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
   
	function __construct()
	{
		parent::__construct();

        
	}

	
}

class Controller_Preinscription extends  MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	    $this->load->helper('url');
		$this->load->library('session');
        $this->lang->load('onefd_auth_lang', 'arabic');
		$this->config->load('onefd_auth', TRUE);
		$this->config->load('config');
	
    }
    
	
	function _create_captcha()
	{
		$this->load->helper('captcha');

		$cap = create_captcha(array(
			'img_path'		=> './'.$this->config->item('captcha_path', 'onefd_auth'),
			'img_url'		=> base_url().$this->config->item('captcha_path', 'onefd_auth'),
			'font_path'		=> './'.$this->config->item('captcha_fonts_path', 'onefd_auth'),
			'font_size'		=> $this->config->item('captcha_font_size', 'onefd_auth'),
			'img_width'		=> $this->config->item('captcha_width', 'onefd_auth'),
			'img_height'	=> $this->config->item('captcha_height', 'onefd_auth'),
			'show_grid'		=> $this->config->item('captcha_grid', 'onefd_auth'),
			'expiration'	=> $this->config->item('captcha_expire', 'onefd_auth'),
			'word_length'	=> $this->config->item('word_length', 'onefd_auth'),
		));

		// Save captcha params in session
		//&	& $this->session->set_userdata('captcha1'     ,$cap['word']);
		$this->session->set_userdata(array(
				'captcha_word' => $cap['word'],
				'captcha_time' => $cap['time'],
		));

		return $cap['image'];
	}

	 
	 
	function check_captcha($code)
	{
		$timeee = $this->session->userdata('captcha_time');
		$word   = $this->session->userdata('captcha_word');

		list($usec, $sec) = explode(" ", microtime());
		$now = ((float)$usec + (float)$sec);
	    $cond=true;
		if ($now - $timeee > $this->config->item('captcha_expire', 'onefd_auth')) {   
		//if (!$cond) {
			$this->form_validation->set_message('check_captcha', $this->lang->line('auth_captcha_expired'));
			return FALSE;

		} elseif (($this->config->item('captcha_case_sensitive', 'onefd_auth') AND
				$code != $word) OR
				strtolower($code) != strtolower($word)) {
			$this->form_validation->set_message('check_captcha', $this->lang->line('auth_incorrect_captcha'));
			return FALSE;
		}
		return TRUE;
	}
	
	
	/*** verifier les cours dans table places au moument d' inscription*****************/
	 public function matching_cours() {
		 
		 $annexe       = $this->session->userdata('CODE_ANNEXE');
		 $icode        = $this->input->post('icode');
         $cours        = $this->input->post('cours');
         $result       = $this->Operation_model->Callback_cours($icode,$cours,$annexe);
		  if( $icode == null || $cours ==null){
			  $this->form_validation->set_message('matching_cours', 'من فضلك : أدخل المستوى و نوع الدروس');
				 
				return false;
		  }else{
				 if( $result==false){
							$niveau_filliere       = $this->Operation_model->getNiveauByicode($icode);
							$NIVEAU                = $niveau_filliere->NIVEAU;
							$FILIERE               = $niveau_filliere->FILIERE;
							$frai_ins              = $this->Operation_model->getFrai_inscription($cours);
							$COUR_ARA              = $frai_ins->COUR_ARA;
						$this->form_validation->set_message('matching_cours', 'لقد أنهى عدد الأماكن في شعبة  . ترقبوا فتح أماكن أخرى في القريب العاجل .'.$icode.'  '.$NIVEAU.' '.$FILIERE.' بنمط '. $COUR_ARA.' و سيتم فتح أماكن أخرى في القريب العاجل');
				 
						return false;
				
				}else {
						return true;
				} 
		  }              
    }
	
	/*****************************************/
	public function isLoginSessionExpired() {
		if (file_exists(APPPATH . 'config/config.php')) {
			include(APPPATH . 'config/config.php');

			if (isset($config['sess_expiration']) && $config['sess_expiration'] != '') {
				$timeee = $this->session->userdata('logged_time');
				list($usec, $sec) = explode(" ", microtime());
				$now =  ((float)$usec + (float)$sec);
					$login_session_duration = 10000; 
					$current_time = time(); 
					if(isset( $timeee)   ){  
						if(($current_time -  $timeee) > $login_session_duration){ 
							//redirect('inscriptic/index','refresh'); 
							return true;
						} 
					}

			}
		}
    }
		/*********************************************************************/
	public function check_cours() {
		 
		 $annexe       = $this->session->userdata('CODE_ANNEXE');
		 $icode        = $this->input->post('icode');
         $cours        = $this->input->post('cours');
		 $mention      = $this->session->userdata('MENTION');
		 $allCours     = $this->Operation_model->Callback_cours($icode,$cours,$annexe);
		if ( $mention !=null &&  $cours != null ){
			     if ($mention=='معيد' or $mention=='غائب' or $mention=='متخلي' or $mention=='مقصى' ){
						
						if( $cours != 'MDL_AJOURN' ){
							
								$this->form_validation->set_message('check_cours', '1المعلومات المدخلة خاطئة');		
									
									return false;
							
							}elseif($cours == 'MDL_AJOURN') {
									return true;
							} 
				 }elseif($mention =='مقبول'){
							if( $cours == 'MDL_AJOURN' ){
								
									   $this->form_validation->set_message('check_cours', 'المعلومات المدخلة خاطئة');		
										return false;
								
								}else{
									    if( $allCours == false){
									       $this->form_validation->set_message('check_cours', 'المعلومات المدخلة خاطئة');	
									       return false;
				
										}else {
												return true;
										} 
								} 
								
				 }else{
					$this->form_validation->set_message('check_cours', ' المعلومات المدخلة خاطئة');					
					return false; 
				 }
			
		
		
		
		}else{
			 $this->form_validation->set_message('check_cours', 'المعلومات المدخلة خاطئة');
			 return false;
		}
         
		              
    }
	/*********************************************************************/
	 public function check_icode($icode) {
		 $icode_pass= $this->session->userdata('icodePASS');
		if ($icode_pass!=null && array_search($icode, array_column($icode_pass, 'icode')) !==FALSE){
			 return true;
		}else{
			 $this->form_validation->set_message('check_icode', ' المعلومات المدخلة خاطئة');
			 return false;
		}	 
	 }
	/*****************************************/
		
	/*********************************** SQL INJECTION *********************************************************/
public function contient_sql($champ) {
		$sql_injecte=0;
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'SELECT')+$this->contient_mot_sql($champ,'select');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'CREATE')+$this->contient_mot_sql($champ,'create');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'GRANT')+$this->contient_mot_sql($champ,'grant');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'INSERT')+$this->contient_mot_sql($champ,'insert');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'ALTER')+$this->contient_mot_sql($champ,'alter');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'SUPER')+$this->contient_mot_sql($champ,'super');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'UPDATE')+$this->contient_mot_sql($champ,'update');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'INDEX')+$this->contient_mot_sql($champ,'index');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'PROCESS')+$this->contient_mot_sql($champ,'process');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'DELETE')+$this->contient_mot_sql($champ,'delete');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'DROP')+$this->contient_mot_sql($champ,'drop');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'RELOAD')+$this->contient_mot_sql($champ,'reload');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'FILE')+$this->contient_mot_sql($champ,'file');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'SHUTDOWN')+$this->contient_mot_sql($champ,'shutdown');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'SHOW')+$this->contient_mot_sql($champ,'show');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'LOCK')+$this->contient_mot_sql($champ,'lock');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'REFERENCE')+$this->contient_mot_sql($champ,'reference');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'EXECUTE')+$this->contient_mot_sql($champ,'execute');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,"'")+$this->contient_mot_sql($champ,"`")+$this->contient_mot_sql($champ,'"');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'OR')+$this->contient_mot_sql($champ,'or');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'XOR')+$this->contient_mot_sql($champ,'xor');
		$sql_injecte=$sql_injecte+$this->contient_mot_sql($champ,'AND')+$this->contient_mot_sql($champ,'and');
        
		if($sql_injecte > 0){
			 $this->form_validation->set_message('contient_sql', '  المعلومات المدخلة خاطئة');
			 return false;
		}else{
			return true;
		}
		
	}
 public	function contient_mot_sql($champ,$mot) {
		$sql_injecte=0;
		$resultat = strripos($champ,$mot);
		if (strripos($champ,$mot)=== false)
		{
		$sql_injecte=$sql_injecte;	
		}
		else {   
		$sql_injecte=$sql_injecte+1;
		}
		return($sql_injecte);
	}
/************************************************************************************************************/	
			// Function to get the client ip address
	function get_client_ip_server() {
		$ipaddress = '';
		if ($_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if($_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if($_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if($_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if($_SERVER['REMOTE_ADDR'])
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
	 
		return $ipaddress;
	}		
/************************************************************************************************************/
               /*========== check date =========*/
		public function validateDate($format='Y-m-d') {
		 $jour        = $this->input->post('jour');
		 $mois        = $this->input->post('mois');
         $annee       = $this->input->post('annee');
		 $pres         = $this->input->post('pre') ;
		 if( $annee != '' and $mois != '' and $jour != '' ){
		
			 $d=checkdate($mois,$jour,$annee);
				 if ($d ){
					  return true;
				 }else{
					  $this->form_validation->set_message('validateDate', 'تاريخ الميلاد خاطئ');
					  return false;
				 }
		 }
		
		}			
    
	
 function show_preins_is_closed() {
echo '<html >
     <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	 </head>
	 <body>
	 <div style="margin-top:10%">
	 <h1 style="color:red;margin:0 auto;widh: 600px; text-align:center"><strong>لقد إنتهت فـترة التسجيلات للسنة الدراسية  2019/2018</strong></h1>
	 </div>
	 </body></html>';
}
/************************************************************************************************/	
}

