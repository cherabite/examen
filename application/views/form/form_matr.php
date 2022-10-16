
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;بحث برقم التسجيل</p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" id="matr"> 
	 
			<div id="errorvalidation"> 
			</div>
	 	          <form id="form_matr"   class="form-horizontal"   >	
                 
                    <div class="form-group row">
				
                                <label for="dns" class="col-md-3 col-form-label">رقـــم التـســجيــل :</label>
                                <div class="col-md-7 form-inline">
								
                                    <input class="validate[required,minSize[5],maxSize[5],custom[onlyNumberSp]] text-input form-control" style="color: #9900CC; font-weight: bold;width:80px"  name="nseq" id="nseq" 
								  value="<?php echo set_value('nseq'); ?>"	type="text"	size="5" placeholder="" autocomplete="off" maxlength="5" onkeypress="return vnum(this, event, ' ')" >			
									
								
                                    <select class="validate[required] form-control" id="anneeins" name="anneeins" style="color: #9900CC; font-weight: bold"   >
									  <option selected></option>
                                          <option value="2002">2002</option>
										    <option value="2003">2003</option>
											  <option value="2004">2004</option>
											    <option value="2005">2005</option>
												  <option value="2006">2006</option>
												    <option value="2007">2007</option>
													  <option value="2008">2008</option>
													    <option value="2009">2009</option>
														  <option value="2010">2010</option>
														    <option value="2011">2011</option>
															  <option value="2012">2012</option>
															    <option value="2013">2013</option>
																  <option value="2014">2014</option>
																    <option value="2015">2015</option>
																	  <option value="2016">2016</option>
																	    <option value="2017">2017</option>
																		  <option value="2018">2018</option>
																		    <option value="2019">2019</option>
																			 <option value="2020">2020</option>
																			  <option value="2021">2021</option>
																			   <option value="2022">2022</option>
																			
																				
                                    </select>
                                  
                                    <select  class="validate[required] form-control" id="annexe"   name="annexe" style="color: #9900CC; font-weight: bold" >
                                        <option value="<?php echo $cwefd->IANNEXE; ?>"><?php echo $cwefd->IANNEXE; ?></option>
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

<script type="text/javascript" src="<?php echo base_url() ?>custom/form_matr.js"  charset="utf-8"></script>  
