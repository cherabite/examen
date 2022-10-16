
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;فائمة حسب مركز الاجراء</p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" id="matr"> 
	 
			<div id="errorvalidation"> 
			</div>
	 	          <form id="form_centre_d"   class="form-horizontal"   >	
                 
                    <div class="form-group row">
				
                                <label for="dns" class="col-md-3 col-form-label">مركز الإجراء </label>
                                <div class="col-md-7 form-inline">
								
                                    <select class="validate[required] form-control" id="centre_d" name="centre_d" style="color: #9900CC; font-weight: bold"   >
									  <option selected></option>
             
												<?php
												if ($centres) {
													
													foreach ($centres as $centre):
														?>
														<option value="<?php echo $centre->NCENTRE ?>"><?php echo $centre ->NCENTRE.' '.$centre ->NOMCENTRE  ?></option>
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

<script type="text/javascript" src="<?php echo base_url() ?>custom/form_centre_d.js"  charset="utf-8"></script>  
