
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;فائمة حسب مركز الاجراء و المستوى</p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" id="matr"> 
	 
			<div id="errorvalidation"> 
			</div>
	 	          <form id="form_niv"   class="form-horizontal"   >	
                 
                    <div class="form-group row">
				
                                <label for="dns" class="col-md-3 col-form-label">اختر المستوى : </label>
                          
                                <div class="col-md-7 form-inline">
								
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
                               <div class="col-md-2">
					                      <button type="submit" id="valid" class="btn btn-primary ">
                                         <p>   <span class="glyphicon glyphicon-search "></span> &nbsp;بحث </p></button> 
		                       </div>                           

                       </div>
				
                </form>
				  </div>
				  
				
				
	
   </div>

   <div id="show_data">
	</div>

</div>

<script type="text/javascript" src="<?php echo base_url() ?>custom/form_niv.js"  charset="utf-8"></script>  
