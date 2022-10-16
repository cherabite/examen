
<div class="container" style="margin-top:45">  
   <div class="panel panel-primary">
           <div class="panel-heading" >
							<div class="row" >
								<div class=" col-md-12">
								 <p class="text-center "style=" font-weight: bold" ><span class="glyphicon glyphicon-search "
								 style="color:#99ff33"></span>&nbsp;جدول إحصائي إجمالي </p> 
								</div>
							  
							 </div>
					</div>
		    <div class="panel-body"> 
	          <H1 align=center> <STRONG>جــدول إحصاء المترشحين  .</STRONG><BR></H1>
						<div class="table-responsive text-nowrap well">
				         <table class="table table-striped table-responsive table-bordered" id="list_patient"    >
							<thead>
								<tr bgcolor="#88B4F7">
								
									<th >المستوى</th>
									<th>عدد المترشحين</th>
									
								</tr>
							<thead>
							<tbody>
							<?php
						if ($stats) {
							$i=0;
							foreach ($stats as $stat ):
						
							   echo '<tr>
	
							  <td>' .  $stat->CODE . '</td>
							  <td>' . $stat->SOM. '</td>
							 
							 </tr>';	
							  
							endforeach;
						
						}
						?>
				        </tbody>
						</table>
					</div>
								
				
		 </div>
				  
				
				
	
   </div>

   

</div>

<script type="text/javascript" src="<?php echo base_url() ?>custom/table_stat_total.js"  charset="utf-8"></script>  
