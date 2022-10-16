<div class="well">
					<p style="text-align:center">نتائج الإستعلام :</p>
					</div>	 
		    	<div class="table-responsive text-nowrap well">
				         <table class="table table-striped table-responsive table-bordered" id="list_patient"    >
							<thead>
								<tr bgcolor="#88B4F7">
									<th>رقم الترتيب</th>
									<th>رقم التسجيل</th>
									<th>اللقب</th>
									<th>الاسم</th>
									<th>الميلاد</th>
									<th>حكم</th>
									<th>المستوى</th>
									<th>رقم المركز</th>
									<th>اسم المركز</th>
									<th>الولاية</th>
									<th>رقم الحجرة</th>
								
								</tr>
							<thead> <tbody>
							<?php
							foreach ($eleves as $eleve){
							echo
							 '<tr>
	                             <td>   '. $eleve->ORDREC .' </td>
						         <td>   '. $eleve->IANNEXE .''.$eleve->IANNEEINS.''.$eleve->INSEQ .' </td>
							     <td>   '. $eleve->NOM .' </td>
							     <td>   '. $eleve->PRENOM .' </td>
							     <td>   '. $eleve->DNS .' </td>
							     <td>   '. $eleve->PRESUME .' </td>
								 <td>   '. $eleve->ICODE .' </td>
								 <td>   '. $eleve->NCENTRE .' </td>
								 <td>   '. $eleve->NOMCENTRE .' </td>
								 <td>   '. $eleve->WILAYAC .' </td>
								 <td>   '. $eleve->NSALLE .' </td>
							</tr> ';
							}
							?> 
                              </tbody>
                              </table>
							  </div>
	<script type="text/javascript" src="<?php echo base_url() ?>custom/form_total.js"  charset="utf-8"></script>  						  