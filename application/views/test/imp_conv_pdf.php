
<style>

 .col{
	 color:#9900CC;
	 }
</style>
<?php 
if($eleve->PRESUME==0){
$date = date_create($eleve->DNS);
$DNS = date_format($date, 'Y-m-d');      		
}else{
	$date = date_create($eleve->DNS);
   $DNS = 'خــلال '.date_format($date, 'Y'); 
}
	 
echo '<table class="tab1" width="100%" height="100%" border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF">
  <tr>
    <td align="center"> 
	
        <table width="100%" border="0"  cellspacing="0" >
        <tr>
          <td width="10%" ></td>
          <td width="65%" class="Style39">
		
						  الجمهورية الجزائرية الديمقراطية الشعبية<br>
						  وزارة التربية الوطنية<br>
						  الديوان الوطني للتعليم و التكوين عن بعد <br>
						  اســــتدعـــــــــــــــــاء<br>
						  امتحان المستوى دورة : '. $date_conv .'<br>
						  معلومات خاصة بالمتعلم عن بعد<br>
						  
						  المركز الولائي : '. $eleve->CLANNEXE .'<br>
						
						
		  </td>
          <td width="25%">
		  <div align="center">
		        <img style="width:70;height:70;"  src="'. base_url().'images/onefd.png"/>  
           </div>				
		 </td>
        </tr>
      </table>
	  <br/>
	   <table width="95%" border="0"  cellspacing="0" dir="ltr">
          <tr>
              <td align="right" class="col"> '. $eleve->ORDREC.'</td> <td align="right" > رقم الترتيب :</td> 
		      <td  align="right" class="col">'. $eleve->IANNEXE.''. $eleve->IANNEEINS.''. $eleve->INSEQ.'</td> <td  align="right">رقم التسجيل :</td>
	       </tr>
		   <tr>
               <td align="right" class="col" > '. $eleve->PRENOM.'</td> <td align="right" > الإســم  :</td> 
		       <td align="right"  class="col">'. $eleve->NOM.'</td> <td align="right" >اللقب  :</td>
	       </tr>
		   	<tr>
               <td align="right"class="col" > '. $eleve->LNS.'</td> <td align="right" > بــ :</td> 
		       <td align="right" class="col">'. $DNS.'</td> <td align="right" >تاريخ ومكان الإزدياد :</td>
	       </tr>
		   	 <tr>
               <td colspan="3" align="right" class="col"> '. $eleve->ADRESSE.'</td> <td align="right" > العنوان :</td> 
	         </tr>
     </table>
<br/><br/>
	   <strong class="Style29"><U>معلومات خاصة بمركز إجراء الامتحان</U></strong>
	   <br/>
	   <table width="95%" border="0"  cellspacing="0" dir="ltr" align="right">
	     <tr>

			  <td class="col">'. $eleve->NSALLE.'</td> <td>رقم القاعة</td>
			  <td colspan="3" class="col">  '.$eleve->NOMCENTRE.'</td> <td>مركز الإجراء</td>
	     </tr>
		 <tr>

			  <td colspan="4" class="col">'.$eleve->ADDCENTRE.'</td> <td colspan="2">عنوان مركز الإجراء</td>
	     </tr>
		 <tr>
		      <td class="col">'. $eleve->WILAYAC .'</td> <td> ولاية :</td>
			  <td class="col">'. $eleve->DAIRAC .'</td> <td>دائرة :</td>
			  <td class="col">'. $eleve->COMMUNEC .'</td> <td>بلدية:</td>
	     </tr>
		 <tr>
		      <td class="col">'. $eleve->ICODE .'</td> <td>رمزالمستوى :</td>
			  <td class="col">'. $eleve->FILIERE .'</td> <td> الشعبة :</td> 
			  <td class="col">'. $eleve->NIVEAU .'</td> <td>المستوى :</td>
	     </tr>
     </table>
	<br/>
	 <h2>مواقيت ومواد الإختبار </h2>
	 
	     <table width="95%"  border="2" align="center" bordercolor="#000000" style="text-align:center;">
  <tr>
    <td  colspan="2"  align="center"  ><div> الفترة المسائية </div> </td>
    <td colspan="2" align="center"  ><div> الفترة الصباحية </div> </td>
    <td rowspan="2" align="center" > <h4>الشعبة </h4></td>
    <td rowspan="2" align="center"> <h4>المستوى </h4></td>
  </tr>
  <tr>
    <td align="center" >
	  15 سا و 45 د <br/>
           17 سا و 45 د 
	
	</td>
    <td >
       13 سا و 30 د  <br/>
           15 سا و 30 د 
	</td>
    <td align="center"  >
       10 سا و15د  <br/>
        12 سا و15د 
	</td>
    <td align="center">
    <div > 8 سا-10سا </div>
	</td>
  </tr>
  <tr>
    <td ><div align="center" class="style31">'. $program->m4  .'</div></td>
    <td ><div align="center" class="style31">'. $program->m3  .'</div></td>
    <td ><div align="center" class="style31">'. $program->m2 .'</div></td>
    <td ><div align="center" class="style31">'. $program->m1 .'</div></td>
    <td  ><div align="center" class="style31">'. $eleve->FILIERE .'<br />
   </div></td>
    <td dir="rtl"><div align="center" class="style29">'. $eleve->NIVEAU .'  </div></td>
  </tr>
</table>
<br/>
	   <table width="100%" border="0"  cellspacing="0" dir="ltr">
          <tr> 
              <td align="right"  > 
			     <div align="right">
			  تعليمات هامة للمترشح <br/>
			  * على المترشح(ة)إحضار هذا الاستدعاء ، بطاقة الهوية و أدوات الامتحان   <br/>
			  * لا يقبل تأخر المترشح (ة) لأكثر من 30 دقيقة من بداية الإختبار <br/>
			  * يمنع منعا باتا إحضار المترشح(ة)للهاتف النقال إلى مركز الإجراء أو أية وسيلة أخرى للإتصال <br/>
			  *لايسمح للمترشح(ة) بمغادرة قاعة الإمتحان إلا بعد مضي 60 دقيقة من إنطلاق إختبار المادة <br/>
			  *كل طالب(ة) يحصل على صفر من عشرين(00/20) في مادة من المواد يعتبر راسبا في الامتحان <br/>
			  *غياب المترشح(ة) في مادة يلغي إمتحانه في الدورة <br/>
			  *لا يسمح للطالب(ة) إلا بإستعمال الأوراق المسلمة له من طرف المركز <br/>
			  *يسمح للطالب(ة) استعمال الآلة الحاسبة العلمية غير القابلة للبرمجة <br/>
			  *في حالة الغش أو محاولة الغش يطرد المترشح(ة) من المركز ويلغى إمتحانه ، وتطبق  عليه إجراءات الإقصاء طبقا للقوانين المعمول بها <br/>
			  *على المترشح(ة)سحب كشف النقاط من الموقع فور الإعلان عن النتائج <br/>
			  
			     </div>
			  </td> 
	       </tr> 
     </table>
	 <table width="100%" border="0"  cellspacing="0" dir="ltr">
          <tr>
		   <td width="30%"  align="center" >  
		  		  <div>
				   <img src="'. base_url() .'images/cachet.png" alt="onefd" width="236" height="100" >
                 </div>
		 
		   </td> 
		   <td></td>
		   </tr>
	</table>	   
	<br/><br/><br/><br/><br/><br/>
	<h2>هام: لايقبل الطعن في نتائج الامتحان</h2>	   
	  
      </td>
  </tr>
 
</table> ';
?>