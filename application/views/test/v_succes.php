
          
					 <div class="panel-body"> 	
							<form id="download1" method="post" action="<?php echo base_url('index.php/wel/imp_conv') ?>"  target="_blank"> 
						
						<div class="row">
						    <div class="col-md-6">
							    <div class="form-group row">
										<label class="control-label col-md-3">اللقب  : </label>
									<div class="col-md-9">
										<input class="inputligne" type="text"  name="nom" id="nom" value="<?php echo $eleve->NOM ?>" readonly="true" />
								    </div>
                                </div>								
                                <div class="form-group row">   
										<label class="control-label col-md-3">الإسم :</label>
										<div class="col-md-9">
										<input class="inputligne" type="text" name="prenom" id="prenom" value="<?php echo  $eleve->PRENOM ?>" readonly="true"  />
								        </div>
								</div> 
							</div>
							<div class="col-md-6">
									<div class="form-group row " >
									    <label class="control-label col-md-4" >رقم التسجيل :</label>
									    <div class="col-md-8">
											 <input class="inputligne" type="text"  dir="rtl"   value="<?php echo$eleve->IANNEXE.''. $eleve->IANNEEINS.''. $eleve->INSEQ?>" readonly="true" />
										</div>
											
									</div> 
									<div class="form-group row ">
									       <label class="control-label col-md-4" > المستوى و الشعبة :</label>
									       <div class="col-md-8">
											  <input class="inputligne" type="text"   dir="rtl" value="<?php echo $eleve->ICODE .'   '.$eleve->NIVEAU .'   '.$eleve->FILIERE ?>"  readonly="true"/>  
											</div>
										
									</div>
								
						    </div>
                        </div>
						<div class="row">
						    <div class="col-md-6">
							    <div class="form-group row">
										<label class="control-label col-md-3">تاريخ الميلاد </label>
									<div class="col-md-9">
										<input class="inputligne" type="text"  name="nom" id="nom" value="<?php echo $eleve->DNS ?>" readonly="true" />
								    </div>
                                </div>
							</div>
							 <div class="col-md-6">
							 
							</div>
					 </div>
						<br><br>
						 <div class="row">
							<div class="col-md-10">
							 </div>
								 <div class="col-md-2 pull-left">
								 <button type="submit" class="btn btn-primary " id="download_pdf" name="download_pdf" value="ok">
								   <span class="glyphicon glyphicon-print "></span> &nbsp;طبع الإستدعاء </button> 
                              </div>
							  </div>
						
						
					 </div>

				</form>
							
               
						
		
	 

  
  