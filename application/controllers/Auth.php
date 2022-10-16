<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends  CI_Controller {

    public function __construct(){
        parent::__construct();
       $this->load->model('operation_model');
    }

    function login(){
		$this->load->view('login/login');
	}
	
   function log_usere(){
    
        $this->form_validation->set_rules('username' , 'اسم المستخدم', 'trim|required|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('password' , ' كلمة المرور', 'trim|required|encode_php_tags|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
	        $this->load->view('login/login');
        } else {
          $user=$this->input->post('username');
		  $pwd=$this->input->post('password');
       
            if($user=='user' and $pwd=='user'){
                    $data = array(
  
                        'user'       => 'user',
                        'is_login'  => TRUE
                    );
					$this->session->set_userdata($data);
                    $data=array();
                    $this->load->view('menu/header');
             
            }elseif($user=='admin' and $pwd=='admin'){
			   $data = array(
  
                        'user'       => 'admin',
                        'is_login'  => TRUE
                    );
					$this->session->set_userdata($data);
                    $data=array();
                    $this->load->view('menu/header');
		}else{
				$data['message']='المعلومات المدخلة خاطئة';
				$this->load->view('login/login',$data);
  

            }
            
        }
    }
   function form_total(){
	     $data['eleves']= $this->operation_model->getAlleleves();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_total',$data);
		 $this->load->view('menu/footer');
   } 
   function form_nom(){
	     $this->load->view('menu/header');
		 $this->load->view('form/form_nom');
		 $this->load->view('menu/footer');
   }
   function form_matr(){
	     $data['cwefd']= $this->operation_model->getCodecwefd();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_matr',$data);
		 $this->load->view('menu/footer');
   }
     function form_dns(){
	     $this->load->view('menu/header');
		 $this->load->view('form/form_dns');
		 $this->load->view('menu/footer');
   }
  function form_centre_deroulement(){
	     $data['centres']= $this->operation_model->getCentre_deroulement();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_centre_deroulement',$data);
		 $this->load->view('menu/footer');
   }
    function form_niv_centre(){
		$data['centres']= $this->operation_model->getCentre_deroulement();
		//$data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_centre_deroulement_icode',$data);
		 $this->load->view('menu/footer');
   }
    function form_niv(){
	     $data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_niv',$data);
		 $this->load->view('menu/footer');
   }
    function table_stat_total(){
		 $data['stats']= $this->operation_model->table_stat_total();
	     $this->load->view('menu/header');
		 $this->load->view('form/table_stat_total',$data);
		 $this->load->view('menu/footer');
   }
	function table_stat_centre(){
		 $data['stats']= $this->operation_model->table_stat_centre();
	     $this->load->view('menu/header');
		 $this->load->view('form/table_stat_centre',$data);
		 $this->load->view('menu/footer');
   }
function form_sais_abs(){
	     $data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_sais_abs',$data);
		 $this->load->view('menu/footer');
   }
function form_examen (){
	     $data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_examen',$data);
		 $this->load->view('menu/footer');
}   
function form_examen_list_abs (){
	     $data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_examen_list_abs',$data);
		 $this->load->view('menu/footer');
}   
function table_stat_abs (){
	     $data['stats']= $this->operation_model->stat_abs();
	     $this->load->view('menu/header');
		 $this->load->view('form/table_stat_abs',$data);
		 $this->load->view('menu/footer');
}
	function logout(){
		 $this->session->sess_destroy();
        $this->load->view('login/login');
	}
}