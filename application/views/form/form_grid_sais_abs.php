					<div class="well">
					<p style="text-align:center">نتائج الإستعلام  للمستوى : <span style="color:red">   <?php echo $NIV ?> </span></p>
					</div>	 
		  <div class="table-responsive text-nowrap well">
		 
		  	<form   class="form-horizontal" id="form_grid_sais_abs" method="post" action="<?php echo base_url('index.php/wel/form_grid_sais_abs') ?>"  > 
				         <table class="table table-striped table-responsive table-bordered" id="list_patient"    >
							<thead>
								<tr bgcolor="#88B4F7">
									<th>رقم الترتيب</th>
									<th>رقم التسجيل</th>
									<th>اللقب و الإسم</th>
									<th>الميلاد</th>
									<th>اسم المركز</th>
									<th> رقم الحجرة</th>
									<th>حاضر</th>
									<th>غايب</th>
									<th>متخلي</th>
								<th>غش</th>
								
								</tr>
							<thead> <tbody>
							<?php
							if($eleves){
							foreach ($eleves as $eleve){
							$mat=$eleve->IANNEXE .''.$eleve->IANNEEINS .''.$eleve->INSEQ	;
							
							?>
							 <tr>
							 <input name="arraychois[<?php echo $mat; ?>]" type="hidden" id="arraychois[<?php echo $mat; ?>]" value="<?php echo $mat; ?>" />
	                             <td>   <?php echo $eleve->ORDREC ?> </td>
						         <td>   <?php echo $mat ?> </td>
							     <td>   <?php echo $eleve->NOM .'  '.$eleve->PRENOM ?> </td>
							     <td>   <?php echo $eleve->DNS ?> </td>
								 <td>  <?php echo $eleve->NCENTRE .'  '.$eleve->NOMCENTRE ?></td>
								 <td>   <?php echo $eleve->NSALLE ?> </td>
								 <td>   <input type="radio" name="<?php echo $mat; ?>"   value="0" <?php if($eleve->STATUT==0){echo "checked";}?> /> </td>
								 <td>   <input type="radio" name="<?php echo $mat; ?>"  value="1" <?php if($eleve->STATUT==1){echo "checked";}?> /> </td>
								 <td>  <input type="radio"  name="<?php echo $mat; ?>"   value="2" <?php if($eleve->STATUT==2){echo "checked";}?> /> </td>
								 <td>  <input type="radio"  name="<?php echo $mat; ?>"  value="3" <?php if($eleve->STATUT==3){echo "checked";}?> /> </td>
							</tr> 
							<?php
							}
							}
							?>
							
                              </tbody>
                              </table>	
							   <div class="col-md-10"></div>
							   <div class="col-md-2">
					                      <button type="submit" id="valid" class="btn btn-primary ">
                                         <p>   <span class="glyphicon glyphicon-floppy-disk "></span> &nbsp;حفظ التغييرات </p></button> 
		                       </div>
							   </form>
							  </div>
					  