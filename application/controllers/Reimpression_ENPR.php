<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reimpression_ENPR extends Controller_Preinscription {

    ///***Ce bloc est obligatoire*****////
    public function __construct() {
        parent::__construct();
        $this->load->model('M_inscriptic_eleve');
	    //$this->isLoginSessionExpired();
    }

    function wel() {
		
		 /*   if( $this->isLoginSessionExpired()){
				 $validator                 = array();
				 $validator['success']      = 5;
				 $validator['captcha']      = $this->_create_captcha();
				 $validator['valid_error']  = validation_errors();
				 header("Content-Type:application/json ; charset=utf-8");
				 echo json_encode($validator);
				 exit();
			}
			*/
			 
            $this->form_validation->set_rules('enpr', ' رقم الإستمارة', 'trim|required|max_length[5]|numeric|encode_php_tags|xss_clean|callback_contient_sql');
            $this->form_validation->set_rules('captcha',   $this->lang->line('auth_incorrect_captcha'), 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean|callback_contient_sql|callback_check_captcha');
        if ($this->input->post('pre') == 1) {
            $this->form_validation->set_rules('annee', 'سنة الميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean|callback_contient_sql');
        } else {

            $this->form_validation->set_rules('mois', ' شهر الميلاد', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean|callback_contient_sql');
            $this->form_validation->set_rules('jour', ' يوم الميلاد ', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean|callback_contient_sql');
            $this->form_validation->set_rules('annee', ' سنةالميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean|callback_contient_sql');
        }

        if ($this->form_validation->run() == FALSE) {
   			 $validator                 = array();
			 $validator['success']      = 0;
			 $validator['captcha']      = $this->_create_captcha();
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
        } else {
            
			$dataxss=array(
                            'ENPR'           => $this->input->post('enpr'),
                           
				             );
				    $dataxss=$this->security->xss_clean($dataxss);	
					if( $this->security->xss_clean($dataxss)){	
						
            $data          = array();
              if ($this->input->post('pre') == 1) {
                $data['PRESUME'] = 1;
                $jour  = '01';
                $mois  = '01';
                $dns   = $this->input->post('annee') . '-' . $mois . '-' . $jour;
            } else {
                $data['PRESUME'] = 0;
                $dns  = $this->input->post('annee') . '-' . $this->input->post('mois') . '-' . $this->input->post('jour');
            }
			$param=array(
                            'ENPR'           => $this->input->post('enpr'),
                           	'DNS'            => $dns,
							'PRESUME'        => $data['PRESUME'],
							'CODE_ANNEXE'    => $this->session->userdata('CODE_ANNEXE'),
				             );
            $resultat_eleve = $this->M_inscriptic_eleve->inseleve_rechercheENBR_DNS($param);
            if ($resultat_eleve) {
				    if ($resultat_eleve ->CATEGORIE == 7 OR $resultat_eleve ->CATEGORIE == 8 OR $resultat_eleve ->CATEGORIE == 9 OR 
					     $resultat_eleve ->CATEGORIE == 10 ){
							 $validator                 = array();
							 $validator['success']      = 0;
							 $validator['captcha']      = $this->_create_captcha();
							 $validator['valid_error']  = ' عليك الإتصال بالإدارة التي تنتمي إليها .';
							 header("Content-Type:application/json ; charset=utf-8");
							 echo json_encode($validator);
							 exit();    
                    }else{
						$res_enpr               = sprintf("%05d", $resultat_eleve  ->ENPR);
				            $data_js['filePdf']     = $res_enpr;
							$data_js['response']    = $this->lang->line('preinscription_dejet_fait') ;
							$data_js['NOM']         = $resultat_eleve  ->NOM ;
				            $data_js['PRENOM']      = $resultat_eleve  ->PRENOM ;
							$data_js['STATUT']      = $resultat_eleve->STATUT;
							$data_js['ICODE']       = $resultat_eleve->ICODE ;
							                    $date = date_create($resultat_eleve->DNS);
												$DNS0 = date_format($date, 'Y-m-d');
												$DNS_PRE = date_format($date, 'Y');
										    if ($resultat_eleve->PRESUME == 0) {
												$data_js['DNS']  = $DNS0;
											} else {
												$data_js['DNS']  = 'خـــلال ' . $DNS_PRE;
											}  
			            	$data_js['DATPRINS']    = $resultat_eleve->DATPRINS ;
							$niveau_filliere        = $this->Operation_model->getNiveauByicode( $resultat_eleve->ICODE);
							$data_js['NIVEAU']      = $niveau_filliere->NIVEAU;
							$data_js['FILIERE']     = $niveau_filliere->FILIERE;
							$data_js['WILAYA']      = $this->session->userdata('ANNEXE');
							//$this->load->view('menu/header',$data_js);
							$val=$this->load->view('preinscription/impression/v_succes_inscriptic',$data_js,true);
						    $validator['success']= 1;
				            $validator['valid']  = $val;
			                header("Content-Type:application/json ; charset=utf-8");
                            echo json_encode($validator);
							exit();
					}
            } else {
               
                 $validator                 = array();
				 $validator['success']      = 0;
				 $validator['captcha']      = $this->_create_captcha();
				 $validator['valid_error']  = ' خطأ في رقم الإستمارة أو تاريخ الميلاد';
				 header("Content-Type:application/json ; charset=utf-8");
				 echo json_encode($validator);
				 exit();
            }
	}else{
		$validator                 = array();
									 $validator['success']      = 0;
									 $validator['captcha']      = $this->_create_captcha();
									 $validator['valid_error']  = $dataxss;
									 header("Content-Type:application/json ; charset=utf-8");
									 echo json_encode($validator);
					exit();
					
	}
	
	}
    }

   

}
?>
