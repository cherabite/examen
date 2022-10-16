
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;بحث بالاسم و اللقب</p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body" > 

			<div id="errorvalidation"> 
			</div>
		          <form id="form_nom"   class="form-horizontal"   >	
                         
				 <div class=" row">	
					   <div class="col-md-5">
							    <div class="form-group row">
										<label class="control-label col-md-5" style="color:blue">اللقب  : </label>
									<div class="col-md-7">
										<input  type="text"  name="nom" id="nom" value="<?php echo set_value('nom'); ?>"  placeholder="اللقب بالعربية"  onkeypress="return vara(this, event, ' ')" 
										 class="validate[required,minSize[2],maxSize[30],custom[onlyArabic]] text-input inputligne">
								    </div>
									
                                </div>	
						 </div>
                        <div class="col-md-5">								
                                <div class="form-group row">   
										<label class="control-label col-md-5" style="color:blue">الإسم :</label>
										<div class="col-md-7">
										<input class="validate[required,minSize[2],maxSize[30],custom[onlyArabic]] text-input inputligne" type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom'); ?>"  placeholder="الإسم بالعربية"  onkeypress="return vara(this, event, ' ')"   />
								        </div>
									
								</div> 
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
				 <script type="text/javascript" src="<?php echo base_url() ?>custom/form_nom.js"  charset="utf-8"></script>  