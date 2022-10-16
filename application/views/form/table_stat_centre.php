
<div class="container-fluid" style="margin-top:45">  
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
								   <th>إسم المركز</th>
									<th>104</th>
									<th>204</th>
									<th>304</th>
									<th>404</th>
									<th>122</th>
									<th>124</th>
									<th>212</th>
									<th>213</th>
									<th>214</th>
									<th>215</th>
									<th>216</th>
									<th>218</th>									
									<th>237</th>
									<th>251</th>
									<th>253</th>
									<th>255</th>
									<th>257</th>
									<th>312</th>
									<th>313</th>
									<th>314</th>
									<th>315</th>
									<th>316</th>
									<th>318</th>
									<th>337</th>
									<th>351</th>
									<th>353</th>
									<th>355</th>
									<th>357</th>
								</tr>
							<thead>
							<tbody>
							<?php
						if ($stats) {
							//print_r($stats);
							$i=0;
							foreach ($stats as $stat ):
						 echo '<tr>
	
							  <td>' .  $stat->NOMCENTRE . '</td>
							  <td>'; if($stat->a >0 ){echo $stat->a ;} echo '</td>
							  <td>' ; if($stat->b >0 ){echo $stat->b ;} echo '</td>
							  <td>' ; if($stat->c >0 ){echo $stat->c ;} echo '</td>
							  <td>' ; if($stat->d >0 ){echo $stat->d ;} echo '</td>
							  <td>' ; if($stat->e >0 ){echo $stat->e ;} echo '</td>
							  <td>' ; if($stat->f >0 ){echo $stat->f ;} echo '</td>
							  <td>' ; if($stat->g >0 ){echo $stat->g ;} echo '</td>
							  <td>' ; if($stat->h >0 ){echo $stat->h ;} echo '</td>
							  <td>' ; if($stat->i >0 ){echo $stat->i ;} echo '</td>
							   <td>' ; if($stat->ii >0 ){echo $stat->ii ;} echo '</td>
							  <td>' ; if($stat->j >0 ){echo $stat->j ;} echo '</td>
							  <td>' ; if($stat->k >0 ){echo $stat->k ;} echo'</td>
							  <td>' ; if($stat->l >0 ){echo $stat->l ;} echo '</td>
							   <td>' ; if($stat->l1 >0 ){echo $stat->l1 ;} echo '</td>
							    <td>' ; if($stat->l2 >0 ){echo $stat->l2 ;} echo '</td>
								 <td>' ; if($stat->l3 >0 ){echo $stat->l3 ;} echo '</td>
								  <td>' ; if($stat->l4 >0 ){echo $stat->l4 ;} echo '</td>
							  <td>' ; if($stat->m >0 ){echo $stat->m ;} echo '</td>
							  <td>' ; if($stat->n >0 ){echo $stat->n ;} echo '</td>
							  <td>' ; if($stat->o >0 ){echo $stat->o ;} echo '</td>
							  <td>' ; if($stat->o1 >0 ){echo $stat->o ;} echo '</td>
							  <td>' ; if($stat->p >0 ){echo $stat->p ;} echo '</td>
							  <td>' ; if($stat->q >0 ){echo $stat->q ;} echo '</td>
							  <td>' ; if($stat->r >0 ){echo $stat->r ;} echo '</td>
							  
							  <td>' ; if($stat->s >0 ){echo $stat->s ;} echo '</td>
							  <td>'; if($stat->t >0 ){echo $stat->t ;} echo'</td>
							  <td>' ; if($stat->v >0 ){echo $stat->v ;} echo'</td>
							  <td>' ; if($stat->w >0 ){echo $stat->w ;} echo '</td>
							 
							  
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


