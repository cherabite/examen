<?php
			   $annexe=$eleve->IANNEXE;
			   $anneeins=$eleve->IANNEEINS;
			   $nseq=$eleve->INSEQ;
			   $annee=$eleve->IANNEE;
			   $ordrec=$eleve->ORDREC;
			   $dncode=$eleve->ICODE;
			   $niveau=$eleve->NIVEAU;
			   $filiere=$eleve->FILIERE;
				$nom=$eleve->NOM;
				 $prenom=$eleve->PRENOM;
				  $dns=$eleve->DNS;
				 $lns=$eleve->LNS;
				 $presume=$eleve->PRESUME;
				  $adresse=$eleve->ADRESSE;
			    $nomcentre=$eleve->NOMCENTRE;
				  $nsalle=$eleve->NSALLE;
				 $adrcentre=$eleve->ADDCENTRE;
				  $ccentre=$eleve->COMMUNEC;
				   $dcentre=$eleve->DAIRAC;
				   $wcentre=$eleve->WILAYAC;
require('application/third_party/mpdf/mpdf/mpdf.php');
 $pdf=new mPDF('"ar","A4","11","utf8",10,10,10,10,6,3'); 
 $stylesheet= 'body,p { font-family:arial; font-size:22px; margin-top:2px; margin-bottom:02px; text-align:right}
  h6{text-align:center; padding-top:2px; }
              
				  ';
	//$pdf= new mPDF('ar', "A4", $fontsize=11, $fontfamily="serif");
       // $pdf->SetDirectionality('rtl');
       $pdf->WriteHTML($stylesheet, 1);	

// entete du pdf
   
//--------------------------------récupération des données à partir du controller---------------------

//--------------------------------extraction des maières par niveau----------------------------------------------

//**************************************************
//-------------------------- ---------------------دورة ماي ----------------------------------------------
$anneeex = substr($annee, 0, 4);

//**************************************************
 
 //*************************************le test de presume*********************************
   if ($presume==1 ){
	  $annee = substr($dns, 0, 4);
       $daten = 'خلال'.' '.$annee ;        
	 }
	 else {
		 $annee = substr($dns, 0, 4);
              $mois = substr($dns, 5, 2);
              $jour = substr($dns, 8, 2);  
		  $daten = $jour . '-' . $mois . '-'.$annee ; 
	 }
 
  //******fin de test de presume******************************

  
  
  
 // ----------------remplir le pdf  --------------------------------------------------------------------------------------------------------
 

 
				// ---------------------regler les marges en haut--------------------------------
				$pdf->SetMargins(0,2); 
				//--------------------regler les marges en bas---------------------------------
					 $pdf->SetAutoPageBreak(false,0);
				//---------------- ecrire dans le pdf-------------------------------------------
				$pdf->WriteHTML('
<br/> 
<table border= "0"  width="100%" CELLPADDING="18" >
<tr >

<td align="center" width="100%"  size="14" >
<h5>
الجمهورية الجزائرية الديمقراطية الشعبية
<br/>
وزارة التربية الوطنية
<br/>
الديوان الوطني للتعليم والتكوين عن بعد
</h5>
<h1>
استـــــــــــدعـاء
</h1>
امتـحان المستوى دورة <strong>مـاي '.$date_conv.'</strong>
<br/>

<h3>
معلومات خاصة بالمتعلم عن بعد
 </h3>
 <hr style=" color:black; background-color:black; height:3px;" align="left" ; width="40%"/>
 <h3>
المركز الولائي: <strong>'.$eleve->CLANNEXE .'</strong>
</h3>
 </td>
<td align="right" valign="top">
<img src="C:/xampp/htdocs/forbidden/CodeIgniter/logo.PNG" width="132" height="130" >
</td>
</tr>


<tr >
<td align="right"  size="22" >
<pre><strong> رقم التسجيل:</strong>'.$annexe.$anneeins.$nseq.'                   <strong> رقم الترتيب:</strong>'.$ordrec.'</pre>
<pre><strong> اللقب:</strong> '.$nom.'                                                                  <strong>الإسم:</strong>'.$prenom.'</pre>
<pre><strong>تاريخ ومكان الإزدياد: </strong>'.$daten.'               <strong> بـ:</strong>'.$lns.'</pre>		
<strong>العنوان:</strong> '.$adresse.'
</td>
</tr>

<tr>
<td align="center"    bgcolor=#AEDCE6  size="14">
<h2>
معلومات خاصة بمركز إجراء امتحان المستوى
 </h2>
 <hr style=" color:black; background-color:black; height:3px;" align="left" ; width="50%"/>
</td>
</tr>				


<tr>
<td align="right"   size="14">	
  
<pre><strong>مركز الإجراء:</strong>'.$nomcentre.'                                     <strong>رقم القاعة:</strong> '.$nsalle.'</pre>
<strong>عنوان مركز الإجراء:</strong>'.$adrcentre.'
<pre><strong> بلدية:</strong>'. $ccentre.'                                      <strong>الدائرة :</strong> '.$dcentre.'                      <strong>الولاية: </strong>'.$wcentre.'</pre>
<pre> <strong>المستوى:</strong>'.$niveau.'                   <strong>الشعبة:</strong>'.$filiere.'               <strong>رمز المستوى:</strong> '.$dncode.'</pre>
			
 <br/>
 </td>

</tr>		
<tr>
<td align="center"   size="14">	
<h3>
مواقيت ومواد الإختبار</h3>
<br/>
</td>
</tr>		   
</table>
<center>

<table  border= "1"  width="37%">
<tr>
<TD align="center"  width=120% colspan=3   bgcolor=#DDF3F9 ><strong>اليوم الثاني: 11-05-2017 </strong></TD> 
<TD align="center" width=120% colspan=3   bgcolor=#DDF3F9   ><strong>اليوم الأول: 10-05-2017 </strong></TD> 
<TD align="center"  width=10% elevespan=2 ><strong>الشعبة</strong></TD> 
<TD  align="center"  width=10% elevespan=2  bgcolor=#DDF3F9 ><strong>المستوى</strong></TD> 
</tr>
<tr>
<TD align="center" width=40%>سا14-سا16</TD> 
<TD align="center" width=40%  bgcolor=#DDF5F9 >سا10و15د-سا12و15د</TD> 
<TD align="center" width=40% >سا08-سا10</TD> 
<TD align="center" width=40% bgcolor=#DDF5F9>سا14-سا16</TD> 
<TD align="center" width=40% >سا10و15د-سا12و15د</TD> 
<TD align="center" width=40%  bgcolor=#DDF5F9>سا08-سا10</TD> 
</tr>
<tr>
<TD align="center" width=40%   bgcolor=#DDF3F9 ><strong>'.$program->m4.'</strong></TD> 
<TD align="center" width=40% ><strong>'.$program->m4.'</strong></TD> 
<TD align="center" width=40%    bgcolor=#DDF3F9><strong>'.$program->m4.'</strong></TD> 
<TD align="center" width=40% ><strong>'.$program->m3.'</strong></TD>
<TD align="center" width=40%   bgcolor=#DDF3F9 ><strong>'.$program->m2.'</strong></TD> 
<TD align="center" width=40% ><strong>'.$program->m1.'</strong></TD> 
<TD align="center" width=40%    bgcolor=#DDF3F9><strong>'.$filiere.'</strong></TD> 
<TD align="center" width=40% ><strong>'.$niveau.'</strong></TD> 
</tr>
</table>

</center>
<br/>
<table>
<tr>

<td align="right"   width=9%>
<h4>
<u>
تعليمات هامة للمترشح:
</u>
</h4>
<br/>
- على المترشح إحضار هذا الاستدعاء ، بطاقة التعريف ، أدوات الامتحان.
<br/>
- على المترشح أن يحضر إلى مركز الامتحان على الساعة 07و30د صباحا.
<br/>
- لا يسمح للمترشح بالتأخر عن بداية الوقت المحدد للامتحان.
<br/>
- يمنع منعا باتا على المترشح إحضار الهاتف النقال إلى مركز الإجراء.
<br/>
- لايسمح للمترشح بمغادرة قاعة الإمتحان إلا بعد مضي 45 دقيقة من إنطلاق إختبار المادة.
<br/>
- كل طالب يحصل على 00 من عشرين (00/20)في مادة من المواد يعتبر راسبا في الامتحان.
<br/>
- غياب المترشح في مادة يلغي إمتحانه في الدورة.
<br/>
- لا يسمح للطالب إلا بإستعمال الأوراق المسلمة له من طرف المركز.
<br/>
- يسمح للمترشح باستعمال الآلة الحاسبة العلمية غير المبرمجة.
<br/>
- في حالة غش أو محاولة غش يطرد المترشح من المركز ويلغى امتحانه
<br/>
وتطبق عليه إجراءات الإقصاء من الدراسة مع الديوان.
</td>

</tr>
</table>
<br/>
<br/>
<table  border= "1"   align="center"  width="60%" >
<tr>
<td  align="center"   bgcolor=#DDF3F9  width=10% >
<strong>
هام جدا: إن الطعن في نتائج الإمتحان غير مقبول
</strong>
</td>
</tr>
</table>


');			   
			   
			   $pdf->Output('Convocation_Examen.pdf','I');

             
//----------------------------fin de récupération des données------------------------------------
			

 ?>
