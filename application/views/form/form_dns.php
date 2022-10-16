
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;بحث بتاريخ الميلاد</p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" > 

			<div id="errorvalidation"> 
			</div>
		          <form id="form_dns"   class="form-horizontal"   >	
                         
				         <div class="form-group row">
                                <label for="dns" class="col-md-3 col-form-label">تــاريـخ المـيــلاد :</label>
                                <div class="col-md-7 form-inline">
								
                                    <select class="validate[required] form-control" id ="jour"  name="jour"  style="color: #9900CC; font-weight: bold"  >
                                        <option  value="<?php echo set_value('jour'); ?>"><?php echo set_value('jour'); ?></option>
                                    </select>
								
                                    <select class="validate[required] form-control" id ="mois" name="mois" style="color: #9900CC; font-weight: bold"  >
                                        <option  value="<?php echo set_value('mois'); ?>"><?php echo set_value('mois'); ?></option>
                                    </select>
                                  
                                    <select  class="validate[required] form-control" id="annee"   name="annee" style="color: #9900CC; font-weight: bold" >
                                        <option  value="<?php echo set_value('annee'); ?>"><?php echo set_value('annee'); ?></option>

                                    </select> 
									<input id ="pre" name="pre" type="checkbox" value="1" onclick="presumer()" style="margin-right:25px"  />
									<label class="control-label" style="color:red">مفترض</label>
                                </div>									
                                 <div class="col-md-2">
					                      <button type="submit" id="valid" class="btn btn-primary ">
                                         <p>   <span class="glyphicon glyphicon-search "></span> &nbsp;بحث </p></button> 
		                       </div>                             

                            </div>
							
                
				  </div>

				 </form>
	</div>	
	<div id="show_data">
	</div>
</div>	
				 <script type="text/javascript" src="<?php echo base_url() ?>custom/form_dns.js"  charset="utf-8"></script> 
				 