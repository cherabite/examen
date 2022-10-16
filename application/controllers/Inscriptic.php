<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Inscriptic extends Controller_Preinscription {


public function __construct()
    {
      parent::__construct();
     $this->load->model('operation_model');
     }

	
	public function action()
	{
		

       // $this->session->sess_destroy();
		$data = array();

		$this->form_validation->set_rules('wilaya', 'أختر الولاية التي تسكن فيها', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
		   redirect('wel/index','refresh');
		   
	    }else{
			                                         
		   $action              = $this-> input->post('act');
		   $wilayaVall          = $this-> input->post('wilaya'); 
		  
		   $cwefd        = $this -> operation_model->getCwefd_Annaxe($wilayaVall);
			if($cwefd == false or $cwefd->CODE_CWEFD == "" or $cwefd->WILAYA_CWEFD == ""  ){
				
							redirect('wel/index','refresh');  
									
								 }
			 
		  if ($action=='matr')
		   {
			$data['date_conv']=   $this->config->item('date_conv');
			$data['cwefd']= $cwefd ;
			$data['captcha']         = $this->_create_captcha();
			$this->load->view('test/convocation_examen_view',$data);
			$this->load->view('test/form_matr');
			$this->load->view('test/footer');
                                      
		   
		   }elseif ($action=='enpr'){
			   $data['date_conv']=   $this->config->item('date_conv');
			$data['cwefd']= $cwefd ;
			$data['captcha']         = $this->_create_captcha();
			$this->load->view('test/convocation_examen_view',$data);
			$this->load->view('test/form_enpr');
			$this->load->view('test/footer');
		   }elseif ($action=='nom_pre'){
			   $data['date_conv']=   $this->config->item('date_conv');
             $data['cwefd']= $cwefd ;
			$data['captcha']         = $this->_create_captcha();
			$this->load->view('test/convocation_examen_view',$data);
			$this->load->view('test/form_nom_pre');
			$this->load->view('test/footer');
		   }
           }
	   }
	
	
	
    
}
?>
