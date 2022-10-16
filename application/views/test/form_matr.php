		    
   	<div id="info_matr">    
		    <div class="panel-body" id="matr"> 
	 
			<div id="errorvalidation"> 
			</div>
	 	          <form id="form_matr"   class="form-horizontal"   >	
           
                    <div class="form-group row">
                                <label for="dns" class="col-md-3 col-form-label">رقـــم التـســجيــل :</label>
                                <div class="col-md-9 form-inline">
								
                                    <input class="validate[required,minSize[5],maxSize[5],custom[onlyNumberSp]] text-input form-control" style="color: #9900CC; font-weight: bold;width:80px"  name="nseq" id="nseq" 
								value="<?php echo set_value('nseq'); ?>"	type="text"	size="5" placeholder="" autocomplete="off" maxlength="5" onkeypress="return vnum(this, event, ' ')" >			
									
								
                                    <select class="validate[required] form-control" id ="anneeins" name="anneeins" style="color: #9900CC; font-weight: bold"   >
                                        <option value="<?php echo set_value('anneeins'); ?>"><?php echo set_value('anneeins'); ?></option>
                                    </select>
                                  
                                    <select  class="validate[required] form-control" id="annexe"   name="annexe" style="color: #9900CC; font-weight: bold" >
                                        <option value="<?php echo $cwefd->CODE_CWEFD; ?>"><?php echo $cwefd->CODE_CWEFD; ?></option>
                                    </select> 
									 <label for="a" class="col-form-label"><?php echo $cwefd->WILAYA_CWEFD; ?></label>
                                </div>									
                                                            

                            </div>
                            <div class="form-group row">
                                <label for="dns" class="col-md-3 col-form-label">تــاريـخ المـيــلاد :</label>
                                <div class="col-md-9 form-inline">
								
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
                                                           

                            </div>
							
                            <div class="form-group row">
                                <div class=" form-inline">

                                    <label for="dns" class="col-md-3 col-form-label">أكتب الأحرف الموجودة في الصورة</label>	
                                    <div class="col-md-2">
								
                                        <input class="validate[required,minSize[4],maxSize[4],custom[onlyNumberSp]] text-input form-control" 
										 style="color: #9900CC; font-weight: bold; width:150px" name="captcha" id="captcha"
									type="text"	size="4" placeholder="أكتب الأحرف الموجودة في الصورة" autocomplete="off" maxlength="4" onkeypress="return vnum(this, event, ' ')" >					
     						
                                    </div>
									<div class="col-sm-2">
									<div class="image">
                                       <?php echo $captcha; ?>
									 </div>
                                   </div>

                                    <div class="col-md-2">
                                       
                                    </div> 

                                </div>
                            </div>  
							
			
				  </div>
				   <div class="row">
				      <div class="col-md-9">
                      </div>
                     <div class="col-md-3">
					<button type="submit" id="valid" class="btn btn-primary btn-block">
                    <h4>   <span class="glyphicon glyphicon-print "></span> &nbsp;التحقق من المعلومات </h4></button> 
		             </div>
                </div>
				</form>
	    </div>			
<script type="text/javascript" src="<?php echo base_url() ?>custom/conv.js"  charset="utf-8"></script>  				