
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-print "
								 style="color:#99ff33"></span>&nbsp;طباعة جدول التصحيح حسب </p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" id="matr"> 
	 
			<div id="errorvalidation"> 
			<?php if(isset($valid_error) and $valid_error != null ) 
               echo  '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>
							  <div ><ol>
							  '.validation_errors() .'
							  </ol></div>
							  </div>';

				?>
			</div>
	 	        	<form   class="form-horizontal" id="feuille_examen" method="post" action="<?php echo base_url('index.php/list_abs/list_abs') ?>"  target="_blank"  > 
                 
                    <div class="form-group row">
				
                                <label for="dns" class="col-md-3 col-form-label">اختر المستوى : </label>
                          
                                <div class="col-md-9 form-inline">
								
                                    <select class="validate[required] form-control" id="icode" name="icode" style="color: #9900CC; font-weight: bold"   >
									  <option selected></option>
                                       
												<?php
												if ($icodes) {
													
													foreach ($icodes as $icode):
														?>
														<option value="<?php echo $icode->ICODE ?>"><?php echo $icode ->ICODE .' '.$icode ->NIVEAU .' '.$icode-> FILIERE?></option>
														<?php
													endforeach;
													}
													?>
																		
                                    </select>
                                  
                                </div>	
								<div class="row">
								 <div class="col-md-10"></div>
									   <div class="col-md-2">
												  <button type="submit" name="valid_1" id="valid_1" value="valid_1" class="btn btn-primary ">
												 <p>   <span class="glyphicon glyphicon-print "></span> &nbsp;طباعة القائمة </p></button> 
									   </div> 
                                       									   
                               </div>							   

                       </div>
				
                </form>
				  </div>
				  
				
				
	
   </div>

   <div id="show_data">
	</div>

</div>

<script type="text/javascript" src="<?php echo base_url() ?>custom/form_examen.js"  charset="utf-8"></script>  
