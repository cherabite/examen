<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_abs extends  Controller_Preinscription  {
	
	function __construct()
	{
		parent::__construct();
       $this->load->model('operation_model');
	   $this->config->load('config');
    }

    public function index()
	{
		
	}	
	function list_abs(){
		 $centre = $this->config->item('centre');
			 $this->form_validation->set_rules('icode' , 'اختر المستوى' , 'trim|required|numeric|encode_php_tags|xss_clean');
    
       	if ($this->form_validation->run() == FALSE) {
            
		$data['valid_error']= validation_errors();
		$data['icodes']= $this->operation_model->getIcode();
	     $this->load->view('menu/header');
		 $this->load->view('form/form_examen_list_abs',$data);
		 $this->load->view('menu/footer');
		
          
        } else {
			 $data='';
			$maxlignes = 30;
			 $icode            = $this->input->post('icode') ;
			//  $matiere = $this->operation_model-> get_program($icode);
			   $niv       = $this->operation_model-> getNiveauByicode($icode);
			
                         $data .= '
				<div style="page-break-after:always">		 
				 <table border="0" align="center".>
					 <tr>
					  <td  valign="top"><p align="center"><strong>الجمهورية الجزائرية الديمقراطية الشعبية <br>
									  </strong><strong>وزارة التربية الوطنية <br>
									  </strong><strong>الديوان الوطني للتعليم والتكوين عن بعد<br />
									  </strong><strong><br>
							المركز الولائي  للتعليم والتكوين عن بعد:</strong><span class="Style16">&nbsp; </span></strong><span class="Style31"><strong>'.$centre.'</strong></span><br />
					<strong>  جدول الغياب امتحان المستوى : دورة 29 أفريل 2019</strong></p><br>
						<div align="center"><strong>للسنة الدراسية : 2018/2019 <br />
					</div>
									<table width="300" align="center" border="0">
										  
										  <tr>
										  <td colspan="2"><div align="center" class="Style31"> <strong> المستوى : '.$icode.' &nbsp  '. $niv->NIVEAU.' &nbsp; '. $niv->FILIERE.'</strong></div></td>
										  </tr>
										  <tr>
										 
										 
					               </table>
					 </table>
                 </div>';
                 
 
					 $centres_d = $this->operation_model-> getCentre_deroulement_icode($icode);
					
					     $i=0;   //  1 premiere fois 
							foreach ($centres_d as $centre_d){
												$param=array(
													'ICODE'            => $icode ,
													'NCENTRE'            => $centre_d->NCENTRE 										
													  );
												  
								 $data.='
							 <div style="page-break-after:always">	 
					         <table width="600" border="1" align="center">
							   <tr class="Style8">
								<td colspan="3"><div align="right" class="Style31"><strong>'.$centre_d->NOMCENTRE .'</strong></div></td>
								<td width="104" class="Style31" align="right"> مركز الإجراء  </td>
								<td width="90"><div align="right" class="Style31"><strong>'.$centre.'</strong></div></td>
								<td width="90"  align="right"><span class="Style31"> المركز الولائي </span></td>

							</tr>
							  <tr class="Style8">
								
								<td colspan="6"><div align="right" class="Style31">  المستوى : '.$icode.' &nbsp  '. $niv->NIVEAU.' &nbsp; '. $niv->FILIERE.'</div></td>
								
							  </tr>
				
							 <tr class=" Style8"  >
									 <td width="80"><div align="center" class="Style23 Style33"> 
									   <div align="center"> ملاحظــة </div> </td>
									   <td> <div align="center" class="Style34"> رقم الحجرة</div> </td>
									<td><div align="center"><span class="Style33">الاسم واللقب </span></div></td>

										 <td><div align="center" class="Style34">
										   <div align="center">رقم التسجيل</div>
										 </div></td>
										 <td><div align="center" class="Style34">
										   <div align="center">ر.ت</div>
										 </div></td>
										 <td width="70" ><div align="center" class="Style34">
										   <div align="center">رقم.م الإجراء</div>
										 </div></td>
									
									 
							  </tr>
								';					  
								 $eleves_centre = $this->operation_model-> form_centre_d_code($param);
								
								  $nbr_eleves_centre_icode = $this->operation_model-> getCount_eleve_centre_icode($param) ->NBR;
										 if($nbr_eleves_centre_icode % $maxlignes ==0){$nbr_pages=(int)($nbr_eleves_centre_icode/$maxlignes);
										 }else{
											 $nbr_pages=(int)($nbr_eleves_centre_icode /$maxlignes)+1;
											 }
								  $nbr_pages_initial=0;
								     $n=0;
								       foreach ($eleves_centre as $eleve_centre){
										   $n=$n+1;
										   
										   if($n % $maxlignes ==0){
											 if( $n < $nbr_eleves_centre_icode){   
										  
										$data.=' <tr class=" Style28 "> 
												<td height="24"> </td>  
                                               <td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NSALLE .' </div></td> 												
												 <td><div align="center" class="style36" >'.$eleve_centre-> NOM .'  '.$eleve_centre-> PRENOM  .'</div></td>
												<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> IANNEXE .' '.$eleve_centre-> IANNEEINS .'  '.$eleve_centre-> INSEQ .'</div></td>
												<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> ORDREC .' </div></td>
												<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NCENTRE .' </div></td>
										  </tr> 
										  </table>
										 
										 </div>
										
										 <div style="page-break-after:always">	 
					         <table width="600" border="1" align="center">
							   <tr class="Style8">
								<td  colspan="3"><div align="right" class="Style31"><strong>'.$centre_d->NOMCENTRE .'</strong></div></td>
								<td width="104" class="Style31" align="right"> مركز الإجراء  </td>
								<td width="90"><div align="right" class="Style31"><strong>'.$centre.'</strong></div></td>
								<td width="90"  align="right"><span class="Style31"> المركز الولائي </span></td>

							</tr>
			                 <tr class="Style8">
								
								<td colspan="6"><div align="right" class="Style31">  المستوى : '.$icode.' &nbsp  '. $niv->NIVEAU.' &nbsp; '. $niv->FILIERE.'</div></td>
								
							  </tr>
								
							 <tr class="Style8">
									 <td width="80"><div align="center" class="Style23 Style33"> 
									   <div align="center">ملاحظــة </div> </td>
									 <td>  <div align="center" class="Style34"> رقم الحجرة</div> </td>
									<td><div align="center"><span class="Style33">الاسم واللقب </span></div></td>

										 <td><div align="center" class="Style34">
										   <div align="center">رقم التسجيل</div>
										 </div></td>
										 <td><div align="center" class="Style34">
										   <div align="center">ر.ت</div>
										 </div></td>
										 <td  ><div align="center" class="Style34">
										   <div align="center">رقم.م الإجراء</div>
										 </div></td>
									
									 
							  </tr>
										 ';
											 }else{
											
									    	$data.='
											     <tr class=" Style28 ">
												<td height="24"> </td> 
                                               <td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NSALLE .' </div></td> 												
												 <td><div align="center" class="style36">'.$eleve_centre-> NOM .'  '.$eleve_centre-> PRENOM  .'</div></td>
												<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> IANNEXE .' '.$eleve_centre-> IANNEEINS .'  '.$eleve_centre-> INSEQ .'</div></td>
												<td ><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> ORDREC .' </div></td>
												<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NCENTRE .' </div></td>
										  </tr> 
										  </table>
										
										 </div>';
												 
											 }	  
										   }else{
											 if( $n < $nbr_eleves_centre_icode){
											
										$data.='   <tr class=" Style28 ">
													<td height="24"> </td>
                                                     <td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NSALLE .' </div></td> 													
													 <td><div align="center" class="style36">'.$eleve_centre-> NOM .'  '.$eleve_centre-> PRENOM  .'</div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> IANNEXE .' '.$eleve_centre-> IANNEEINS .'  '.$eleve_centre-> INSEQ .'</div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> ORDREC .' </div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NCENTRE .' </div></td>
											   </tr> ';
											 }else{
										
											  
										$data.='  <tr class=" Style28 ">
													<td height="24"> </td>   
													 <td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NSALLE .' </div></td> 
													 <td><div align="center" class="style36">'.$eleve_centre-> NOM .'  '.$eleve_centre-> PRENOM  .'</div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> IANNEXE .' '.$eleve_centre-> IANNEEINS .'  '.$eleve_centre-> INSEQ .'</div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> ORDREC .' </div></td>
													<td><div align="center" class="Style22 Style15 Style28">'. $eleve_centre-> NCENTRE .' </div></td>
											   </tr> 
											    </table>
										 
										 </div>
											   ';
											 }  
											   
										   }
									   }
								
							        }
			  
							$dataa['info']=$data;
							 $this->load->view('form/feuillet_examen',$dataa);
		}
	
	
	
	}
}


