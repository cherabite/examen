<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wel extends  Controller_Preinscription  {
	function __construct()
	{
		parent::__construct();
       $this->load->model('operation_model');
    }

    public function index()
	{
		
	}
	 function getIcode_by_centre(){
	   	$centre_de   = $this->input->post('centre_de');
         $alldaira   = $this->operation_model->getIcode_by_centre($centre_de);	
         header('Content-Type: application/json', true);
         echo json_encode($alldaira); 
	 }
	public function form_matr(){
	    
            $this->form_validation->set_rules('annexe'    , ' الولاية', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('anneeins'  , ' سنة التسجيل ', 'trim|required|exact_length[4]|numeric|xss_clean');
            $this->form_validation->set_rules('nseq'      , ' رقم الترتيب', 'trim|required|exact_length[5]|numeric|encode_php_tags|xss_clean');
           
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'ANNEXE'            => $this->input->post('annexe'),
                            'ANNEEINS'          => $this->input->post('anneeins'),
							'NSEQ'              => $this->input->post('nseq')
 							);
           

            if ( $eleves = $this->operation_model->form_matr($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'غير موجود متعلم بهده المعطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
		 
	}
	public function form_nom(){
	    
            $this->form_validation->set_rules('nom'     , 'اللقب بالأحرف العربية' , 'trim|required|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('prenom'  , 'الإسم بالأحرف العربية'  , 'trim|required|encode_php_tags|xss_clean');
           
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'NOM'            => $this->input->post('nom'),
                            'PRENOM'         => $this->input->post('prenom')
 							);
           

            if ( $eleves = $this->operation_model->form_mom($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'غير موجود متعلم بهده المعطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
		 
	}
		public function form_dns(){
			if ($this->input->post('pre') == 1) {
				$this->form_validation->set_rules('annee', ' سنةالميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean');
			} else {

				$this->form_validation->set_rules('mois', ' شهر الميلاد', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
				$this->form_validation->set_rules('jour', ' يوم الميلاد ', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
				$this->form_validation->set_rules('annee', ' سنةالميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean');
			} 
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {
             $data = array();
            // traitement des donnees---------------------------------------------

            if ($this->input->post('pre') == 1) {
                $data['PRESUME'] = 1;
                $jour            = '01';
                $mois            = '01';
                $dns             = $this->input->post('annee') . '-' . $mois . '-' . $jour;
            } else {
                $data['PRESUME'] = 0;
                $dns             = $this->input->post('annee') . '-' . $this->input->post('mois') . '-' . $this->input->post('jour');
            }
			$param=array(
			                'DNS'            => $dns,
							'PRESUME'        => $data['PRESUME'] 
				             );

            if ( $eleves = $this->operation_model->form_dns($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'غير موجود متعلم بهده المعطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
		 
	}
	function form_centre_d(){
		 $this->form_validation->set_rules('centre_d' , 'اختر مركز الإجراء' , 'trim|required|numeric|encode_php_tags|xss_clean');
         
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'NCENTRE'            => $this->input->post('centre_d')                        
 							);
           

            if ( $eleves = $this->operation_model->form_centre_d($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'غير موجود متعلم بهده المعطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
	}
	function form_niv(){
		 $this->form_validation->set_rules('icode' , 'اختر المستوى' , 'trim|required|numeric|encode_php_tags|xss_clean');
         
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'ICODE'            => $this->input->post('icode')                        
 							);
           

            if ( $eleves = $this->operation_model->form_niv($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'لا توجد معطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
	}
	function form_centre_d_code(){
		 $this->form_validation->set_rules('centre_d' , 'اختر مركز الإجراء' , 'trim|required|numeric|encode_php_tags|xss_clean');
		 $this->form_validation->set_rules('icode' , 'اختر المستوى' , 'trim|required|numeric|encode_php_tags|xss_clean');
         
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'NCENTRE'            => $this->input->post('centre_d') ,
                              'ICODE'            => $this->input->post('icode')  							
 							);
           

            if ( $eleves = $this->operation_model->form_centre_d_code($param)) {
				        $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'غير موجود متعلم بهده المعطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
	}
	function form_sais_abs(){
		 $this->form_validation->set_rules('icode' , 'اختر المستوى' , 'trim|required|numeric|encode_php_tags|xss_clean');
         $this->form_validation->set_rules('ordrec' , 'أدخل رقم الترتيب' , 'trim|required|numeric|encode_php_tags|xss_clean'); 
       	if ($this->form_validation->run() == FALSE) {
             $validator                 = array();
			 $validator['success']      = 0;
			 $validator['valid_error']  = validation_errors();
			 header("Content-Type:application/json ; charset=utf-8");
             echo json_encode($validator);
	         exit();
		
          
        } else {

		   
            $param=array(
                            'ICODE'            => $this->input->post('icode') ,
                            'ORDREC'            => $this->input->post('ordrec') 							
 							);
           

            if ( $eleves = $this->operation_model->form_sais_abs($param)) {
				       $array_data['eleves']   = $eleves;
					    $array_data['NIV']     = $this->input->post('icode') ;
				        $info=$this->load->view('form/form_grid_sais_abs',$array_data,true);
				     //   $info=$this->make_table($eleves);					  
						
					     $validator                 = array();
						 $validator['valid']        = $info;
						 $validator['success']      = 1;				
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				  
			}else{
								 $validator                 = array();
								 $validator['success']      = 0;
							//	 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'لا توجد معطيات ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 
		 
		} 
	}

	function form_grid_sais_abs (){
		 $base_helper= $this->load->database('default', TRUE);
		$arraychois=$this->input->post('arraychois');
			foreach($arraychois as $row)
				{
					$stat      = $this->input->post($row);
					$annexe    = substr($row,0,2);  
                    $anneeins  = substr($row,2,4);                         
                     $nseq     = substr($row,6,5);
					
		         	 $base_helper->query("UPDATE convocation14 SET STATUT=".$stat." WHERE IANNEXE=".$annexe." AND IANNEEINS=".$anneeins." AND  INSEQ=".$nseq." ");
		
					// print "<pre>";
					// echo $this->input->post($row);
                    //  var_dump($nseq);
                   //   print "</pre>";
                }
			              $data['icodes']= $this->operation_model->getIcode();
	                      $this->load->view('menu/header');
		                  $this->load->view('form/form_sais_abs',$data);
		                  $this->load->view('menu/footer');
			  
                          					 
				   
				
		
	}
	
	function make_table($eleves){
		$data='';
                         $data .= '
					<div class="well">
					<p style="text-align:center">نتائج الإستعلام :</p>
					</div>	 
		    	<div class="table-responsive text-nowrap well">
				         <table class="table table-striped table-responsive table-bordered" id="list_patient"    >
							<thead>
								<tr bgcolor="#88B4F7">
									<th>رقم الترتيب</th>
									<th>رقم التسجيل</th>
									<th>اللقب</th>
									<th>الاسم</th>
									<th>الميلاد</th>
									<th>حكم</th>
									<th>المستوى</th>
									<th>رقم المركز</th>
									<th>اسم المركز</th>
									<th>الولاية</th>
									<th>رقم الحجرة</th>
								
								</tr>
							<thead> <tbody>';
							foreach ($eleves as $eleve){
							 $data .= '	
							 <tr>
	                             <td>   '. $eleve->ORDREC .' </td>
						         <td>   '. $eleve->IANNEXE .''.$eleve->IANNEEINS.''.$eleve->INSEQ .' </td>
							     <td>   '. $eleve->NOM .' </td>
							     <td>   '. $eleve->PRENOM .' </td>
							     <td>   '. $eleve->DNS .' </td>
							     <td>   '. $eleve->PRESUME .' </td>
								 <td>   '. $eleve->ICODE .' </td>
								 <td>   '. $eleve->NCENTRE .' </td>
								 <td>   '. $eleve->NOMCENTRE .' </td>
								 <td>   '. $eleve->WILAYAC .' </td>
								 <td>   '. $eleve->NSALLE .' </td>
							</tr> ';
							}
							 $data .= '
                              </tbody>
                              </table>	</div>';
							  return $data;
	}
	
	 function enpr() {
		$this->form_validation->set_rules('annexe'     , 'المركز الولائي' , 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('enpr', ' رقم الإستمارة', 'trim|required|max_length[5]|numeric|encode_php_tags|xss_clean');
        $this->form_validation->set_rules('captcha' , '  الصورة'  , 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean|callback_check_captcha');
        if ($this->input->post('pre') == 1) {
            $this->form_validation->set_rules('annee', ' سنةالميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean');
        } else {

            $this->form_validation->set_rules('mois', ' شهر الميلاد', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('jour', ' يوم الميلاد ', 'trim|required|exact_length[2]|numeric|encode_php_tags|xss_clean');
            $this->form_validation->set_rules('annee', ' سنةالميلاد', 'trim|required|exact_length[4]|numeric|encode_php_tags|xss_clean');
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
        
            $data = array();
            // traitement des donnees---------------------------------------------

            if ($this->input->post('pre') == 1) {
                $data['PRESUME'] = 1;
                $jour            = '01';
                $mois            = '01';
                $dns             = $this->input->post('annee') . '-' . $mois . '-' . $jour;
            } else {
                $data['PRESUME'] = 0;
                $dns             = $this->input->post('annee') . '-' . $this->input->post('mois') . '-' . $this->input->post('jour');
            }
			$param=array(
                            'enpr'         => $this->input->post('enpr'),
			                'DNS'            => $dns,
							'PRESUME'        => $data['PRESUME'], 
							'ANNEXE'        => $this->input->post('annexe')
				             );
	  if ( $eleve = $this->operation_model->nom_pre($param)) {
				   if($eleve ->CATEGORIE == 7 OR $eleve ->CATEGORIE == 8 OR $eleve ->CATEGORIE == 9 OR $eleve ->CATEGORIE == 10){
					    $validator                 = array();
						 $validator['success']      = 0;
						 $validator['captcha']      = $this->_create_captcha();
						 $validator['valid_error']  = 'عليك الإتصال بالإدارة التي تنتمي إليها ';
						 header("Content-Type:application/json ; charset=utf-8");
						 echo json_encode($validator);
						 exit();

				   }else{
					    if ( $program = $this->operation_model->get_program($eleve ->ICODE)) {
							    $array_data['eleve']   = $eleve;
								$array_data['program'] = $program;
								       if (file_exists(APPPATH . 'config/config.php')  ) {
									    	 include(APPPATH . 'config/config.php');
										     $array_data['date_conv'] = $config['date_conv'];
										 
										 }
								   $this-> session->set_userdata('stor_data',  $array_data);		 
								   $val=$this->load->view('test/v_succes',$array_data,true);
									$validator['success']= 1;
									$validator['valid']  = $val;
									header("Content-Type:application/json ; charset=utf-8");
									echo json_encode($validator);
									exit();
								// $this->load->view('test/imp_convocation_examen_view',$array_data);
							}else{
								$validator                 = array();
								 $validator['success']      = 0;
								 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'يمكنكم إستخراج الإستدعاء لاحقا ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
								
							}
          
          
				   }
			}else{
								$validator                 = array();
								 $validator['success']      = 0;
								 $validator['captcha']      = $this->_create_captcha();
								 $validator['valid_error']  = 'تحقق مــن المعلــومـات المحجــوزة ';
								 header("Content-Type:application/json ; charset=utf-8");
								 echo json_encode($validator);
								 exit();
				
			}		
		 				 
		}	
	 }		
	 function imp_conv(){
		 if (file_exists(APPPATH . 'config/config.php')  ) {
				 include(APPPATH . 'config/config.php');
				 $format_imp = $config['format_imp'];
					if( $format_imp == 'pdf'){
						$this->imp_pdf();
						//$this->load->view('test/imp_conv_mpdf',$data);
					}elseif( $format_imp == 'html'){
						$data=array();
						$data = $this->session->userdata('stor_data');
						$this->load->view('test/imp_convocation_examen_view',$data);
					}	 
			}else{
				echo 'ERROR';
			} 
	 }
	 function imp_pdf000(){
                    require('application/third_party/mpdf/mpdf/mpdf.php');	
	               // require_once('mpdf/mpdf.php');
                    $mpdf = new mPDF();
                    $mpdf->charset_in = 'utf-8';
                    $mpdf->SetDisplayMode('fullpage');
			
                    $mpdf->WriteHTML("<div align=\"center\" ><table border=\"1\" width=\"100%\" align=\"center\"><tr><td width=\"100%\" align=\"center\">", 2, true, false);
                    //$mpdf->Image('onefd211.png', 130, 20, 40, 40, 'png', '', true, false);
                    $mpdf->WriteHTML("<br><br><table align=\"center\" width=\"80%\"> <tr><td align=\"left\" width=\"25%\">", 2, false, false);
                    $mpdf->WriteHTML("<img src=\"<?php echo base_url() Bimages/logo.png\" width=\"200\">",2,false,false);
                    $mpdf->WriteHTML("</td><td width=\"50%\" align=\"center\">", 2, false, false);
                    $mpdf->WriteHTML("<br><p align=\"center\" >الجمهورية الجزائرية الديموقراطية الشعبية<br>", 2, false, false);
                    $mpdf->WriteHTML("وزارة التربية الوطنية<br>", 2, false, false);
                    $mpdf->WriteHTML("الديوان الوطني للتعليم والتكوين عن بعد</p>", 2, false, false);
                    $mpdf->WriteHTML("<h1 align=\"center\"> اثبات موعد الفرض الالكتروني للمتوسط</h1> ", 2, false, false);
                    $mpdf->WriteHTML("<h2 align=\"center\">  دورة  نوفمبر / ديسمبر 2018</h2><br>", 2, false, false);
                    $mpdf->WriteHTML("</td><td width=\"25%\" align=\"right\"><br><br><img src=\"onefd211ma.jpg\" width=\"120\">", 2, false, false);
                    $mpdf->WriteHTML("</td></tr></table>", 2, false, false);


                    $mpdf->WriteHTML("<br><br><br><br><h2 align=\"center\"><u>معلومات خاصة بالمتعلم عن بعد</u></h2><br>", 2, false, false);

                    $mpdf->WriteHTML("<table align=\"right\" width=\"80%\"> <tr><td align=\"right\">", 2, false, false);
                    $mpdf->WriteHTML("<h2 align=\"right\"> رقم التسجيل: <b>$annex$ann$seq</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;رقم الترتيب : <b>$ord</b></h2><br>", 2, false, false);
                    $mpdf->WriteHTML("<h2> اللقب: <b>$nom</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;الاسم: <b>$pre</b></h2><br>", 2, false, false);
                    $mpdf->WriteHTML("<h2> تاريخ الميلاد: <b>$ddn</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ب : <b>$ldn $wdn</b></h2><br>", 2, false, false);
                    $mpdf->WriteHTML("<h2> العنوان: <b>$adr</b></h2>", 2, false, false);
                    $mpdf->WriteHTML("</td></tr></table>", 2, false, false);
                    $mpdf->WriteHTML("<br><br><h2 align=\"center\"><u>معلومات خاصة بموعد اجراء الفرض الالكتروني </u></h2><br>", 2, false, false);
                    $mpdf->WriteHTML("<br><br><table align=\"right\" width=\"80%\"> <tr><td align=\"right\">", 2, false, false);
                    $mpdf->WriteHTML("<h2 align=\"right\"> تاريخ اجراء الفرض: <b>$dat</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;الساعة : <b>$hr سا</b></h2><br>", 2, false, false);
                    $mpdf->WriteHTML("<h2> رمز المستوى   : <b>$niv  </b>  </h2> <br>", 2, false, false);   
		           $mpdf->WriteHTML("<h2><b>http://e-devoir.onefd.edu.dz/ : </b>  أرضية الفرض الإلكتروني</h2> <br>", 2, false, false);
		    	
                    $mpdf->WriteHTML("</p></td></tr></table>", 2, false, false);
                    $mpdf->WriteHTML("<br><h2 align=\"center\"><u>مواقيت و مواد الفرض الالكتروني&nbsp;</u></h2>", 2, false, false);
		    

		   // while ($t = mysql_fetch_array($res)) {
                     //   $mat = $t[0];
		//	echo "$mat";
			//}
		   	


                    $mpdf->WriteHTML("<br><br><table border=\"1\"  width=\"80%\" cellpadding=\"20\"><tr>",2, false, false);
                    $hr2 = $hr + 1;
                    $mpdf->WriteHTML("<td width=\"25%\"><h2>$hr2:00 - $hr:45</h2></td>",2, false, false);
                    $mpdf->WriteHTML("<td width=\"25%\"><h2>$hr:45 - $hr:30</h2></td>",2, false, false);
                    $mpdf->WriteHTML("<td width=\"25%\"><h2>$hr:30 - $hr:15<h2></td>",2, false, false);

                    $mpdf->WriteHTML("<td width=\"25%\"><h2>$hr:15 - $hr:00</h2></td></tr><tr>",2, false, false);
                  //  while ($t = mysql_fetch_array($res)) {
                        $mat = $t[0];
                        $mpdf->WriteHTML("<td width=\"25%\" align=\"center\"><h2>$mat</h2></td>",2, false, false);
                //    }
                    $mpdf->WriteHTML("</tr></table>",2, false, false);
			
                    //$mpdf->WriteHTML("<br><br><table border=\"1\"  width=\"80%\"><tr>");
                    $mpdf->WriteHTML("<table align=\"right\" width=\"80%\"> <tr><td align=\"right\">", 2, false, false);
                    $mpdf->WriteHTML("", 2, false, false);
                    $mpdf->WriteHTML("<br><br><h2><u>تعليمات هامة للمتعلم:</u></h2>", 2, false, false);
                    $mpdf->WriteHTML("<h2>- للمتعلم حرية اختيار تاريخ و ومكان اجتياز الفرض الالكتروني في حدود الاماكن المتاحة", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- لايسمح للمتعلم مراجعة تاريخ ووقت اجراء الفرض بعد عملية تأكيد الموعد ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- مدة الفرض الالكتروني محددة ب 60 دقيقةلاربع مواد كما هو موضح في الجدول اعلاه ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- لا يسمح للمتعلم اجتياز الفرض الالكتروني قبل او بعد الوقت المحدد له في جدول المواقيت المذكور اعلاه  ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- يجب على المتعلم الاستعداد لاجتياز الفرض الالكتروني وهذا بالدخول الى الأرضية الالكترونية قبل الموعد ب 10 دقائق  ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>-الفرض الالكتروني فرض كباقي الفروض يدخل في نقطة المراقبة المستمرة  ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- يسمح الفرض الالكتروني للمتعلم بالتقويم المستمر لمعارفه حتى يكون على اهبة الاستعداد لاجراء امتحان اثبات المستوى  ", 2, false, false);
                    $mpdf->WriteHTML("</h2><h2>- نقطة الفرض الالكتروني نقطة غير مسقطة بل هي من اجل مساعدة المتعلم  للتعامل  مع اسئلة امتحان اثبات المستوى  ", 2, false, false);
                    $mpdf->WriteHTML("</h2><br><br><br><br><br><h2 align=\"left\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; نتمنى لكم التوفيق ", 2, false, false);

                   
                   	 
                    $mpdf->WriteHTML("</h2></td></tr></table>", 2, false, false);
                    $mpdf->WriteHTML("<br><br><br><br><br><br></td></tr></table></div>", 2, false, true);
                  
				   // $html =    $this->load->view('test/imp_convocation_examen_view',$data,true);
					//$mpdf->WriteHTML($html);
	
		            $fich =  $annex . $ann . $seq .$niv. ".pdf";
                   // $mpdf->Output( FCPATH.'PDF/Broker.pdf', 'F');
				    $mpdf->Output('PDF/'. $fich, 'F');
					echo 'ok';
	 }
	 public function imp_pdf() {
	  		                       
                                    $orig_mem=ini_get('memory_limit');
								   ini_set('memory_limit','1000M');
								    ini_set('max_execution_time',300);
                                   require_once('application/libraries/tcpdf/tcpdf.php');
		
									$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);     
									$pdf->SetAuthor('CH_K_ONEFD');
									$pdf->SetTitle('Convocation examen 2019');
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
									$pdf->SetFont('mohammadbart1', '', 11);   
									$pdf->AddPage('P', 'A4', TRUE);
								    $data_c=array();
						            $data_c = $this->session->userdata('stor_data');								
									$fourmulaire  = $this->load->view('test/imp_conv_pdf',$data_c, true);
									$pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);
									//ob_end_clean();
									$pdf->Output('CONVOCATION_EXAMEN.pdf', 'I'); 
									 ini_set('memory_limit',$orig_mem);
									
			
									
	 }
	
}
