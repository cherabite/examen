		<div id="info_nom_pre">     
      
		    <div class="panel-body" id="nom_pre"> 

			<div id="errorvalidation"> 
			</div>
		          <form id="form_nom_pre"   class="form-horizontal"   >	
                         
						
							    <div class="form-group row">
										<label class="control-label col-md-3" style="color:blue">اللقب  : </label>
									<div class="col-md-4">
										<input  type="text"  name="nom" id="nom" value="<?php echo set_value('nom'); ?>"  placeholder="اللقب بالعربية" autocomplete="off" onkeypress="return vara(this, event, ' ')" 
										 class="validate[required,minSize[2],maxSize[30],custom[onlyArabic]] text-input inputligne">
								    </div>
									<div class="col-md-5"></div>
                                </div>								
                                <div class="form-group row">   
										<label class="control-label col-md-3" style="color:blue">الإسم :</label>
										<div class="col-md-4">
										<input class="validate[required,minSize[2],maxSize[30],custom[onlyArabic]] text-input inputligne" type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>"  placeholder="الإسم بالعربية" autocomplete="off" onkeypress="return vara(this, event, ' ')"   />
								        </div>
									<div class="col-md-5"></div>
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
							
				<input type="hidden" name="n_cwefd" id="n_cwefd" value="<?php echo $cwefd->CODE_CWEFD; ?>"  > 
				  </div>
				   <div class="panel-footer clearfix">
				<div class="col-md-9">
                 </div>
                     <div class="col-md-3">
					<button type="submit" id="valid" class="btn btn-primary btn-block">
                    <h4>   <span class="glyphicon glyphicon-print "></span> &nbsp;التحقق من المعلومات </h4></button> 
		             </div>
                </div>
				 </form>
	</div>			 
				 <script type="text/javascript" src="<?php echo base_url() ?>custom/nom_pre.js"  charset="utf-8"></script>  