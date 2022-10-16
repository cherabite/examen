 <?php
$date  = date_create($date_conv);
$date_conv = date_format($date, 'd-m-Y');
 
if($eleve->PRESUME==0){
$date = date_create($eleve->DNS);
$DNS = date_format($date, 'Y-m-d');      		
}else{
	$date = date_create($eleve->DNS);
   $DNS = 'خــلال '.date_format($date, 'Y'); 
}
?>
<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   <style type="text/css">
   .style19 {	color: #000000;
	font-size: 16px;
	font-weight: bold;
}
.style25 {font-size: 12px}
.style29 {	font-size: 16px;
	font-weight: bold;
}
.style31 {
	font-size: 14;
	font-weight: bold;
}
.style32 {
	font-size: 14px;
	font-weight: bold;
}
.style33 {color: #000000;
	font-size: 18px;
	font-weight: bold;
}
.style27 {font-size: 14px}
.Style4 {
	font-size: 24px;
	font-weight: bold;
}
.Style11 {font-size: 18px; font-weight: bold; }
.Style7 {font-size: 18px; font-weight: bold; color: #0000FF; }
.Style14 {font-size: 18px}
.style18 {
	color: #000000;
	font-weight: bold;
	font-size: 16px;

}
.style21 {
	color: #0000FF;
	font-weight: bold;
	font-size: 23px;

}
.style22 {
	color: #000000;
	font-weight: bold;
	font-size: 23px;

}


.style19 {
	color: #000000;
	font-size: 16px;
	font-weight: bold;
}
.style23 {
	color: #000000;
	font-size: 16px;
}
.style25 {font-size: 12px}
.style31 {font-size: 16px; font-weight: bold; }
.style33 {
	font-size: 36px;
	
	
	font-weight: bold;
}
.Style34 {font-size: 17px}
.style35 {color: #000000}
.Style37 {font-size: 24px}
.Style40 {font-size: 13px}
.Style41 {
	color: #0000FF;
	font-weight: bold;
}
.Style43 {color: #006600}
.style45 {color: #006600; font-size: 22px; }
.style46 {font-size: 18px; color: #000000; }
.style47 {font-size: 13px; font-weight: bold; }
-->
</style>
  </head>
<body>
<div align="center" style="margin-top: 0; margin-bottom: 0"; ><center><div align="center"><center>
<table width="588" border="0" cellpadding="0" cellspacing="0" bordercolor="#111111" bgcolor="#FFFFFF" style="border-collapse: collapse; margin-bottom: 0;">
              <tr>
                <td height="671" valign="top"><table width="750" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                      <td >
                    
                  <tr>
                    <td height="593" valign="top"><table width="653" border="0" align="center">
                      <tr>
                        <td width="647"><table width="700" border="0">
                          <tr>
                            <td width="103">&nbsp;</td>
                            <td width="405"><p align="center" class="style25" style="margin-top: 0; margin-bottom: 0" ><strong>										  

								 <p align="center" class=" style31" style="margin-top: 0; margin-bottom: 0" ><strong>الجمهورية الجزائرية الديمقراطية الشعبية</strong></p>
                                <p align="center" class=" style31" style="margin-top: 0; margin-bottom: 0" ><strong>وزارة التربية الوطنية</strong></p>
                                <p align="center" class=" style31" style="margin-top: 0; margin-bottom: 0"><strong>الديوان الوطني للتعليم والتكوين عن بعد </strong></p>
                                <p align="center" class=" style33" style="margin-top: 0; margin-bottom: 0">اســــتدعـــــــــــــــــاء</p></td>
                            <td width="103"> <img src="<?php echo base_url() ?>images/logo.png" class="img-circle"  alt="onefd" width="102" height="99" ></td>
                          </tr>
                        </table>                          <p align="center" class="style25" style="margin-top: 0; margin-bottom: 0" >                          </td>
                      </tr>
                      <tr>
                        <td><div align="center">
                          <p class="Style4 Style34"style="margin-top: 0; margin-bottom: 0" >امتحان المستوى دورة : <?php echo $date_conv ?></p>
                        </div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="style19">
                            <div align="center" class="Style14"><span class="Style37"> معلومات خاصة بالمتعلم عن بعد </span>                              
                              <hr width="190">
                            </div>
                            <table width="750" border="0" align="center">
                              <tr>
                                <td colspan="5" dir="rtl"><div align="center"  ><span class="style22">المركز الولائي :<span class="Style7"><span class="style35">: </span><span class="style21"><?php echo $eleve->CLANNEXE ; ?></span></span></span></div></td>
                              </tr>
                              <tr>
                                <td width="182"><div align="right"></div>                                  <div align="right"><span class="Style7"><?php echo $eleve->ORDREC;?></span></div></td>
                                <td><div align="right" class="style18">:رقم الترتيب </div></td>
                                <td colspan="2"><div align="right"><span class="Style7"><?php echo $eleve->IANNEXE.''. $eleve->IANNEEINS.''. $eleve->INSEQ;?></span></div></td>
                                <td width="114"><div align="right"><span class="style18">:رقم التسجيل</span></div></td>
                              </tr>
                              <tr>
                                <td><div align="right"><span class="Style7"><?php echo $eleve->PRENOM;?></span></div></td>
                                <td width="75"><div align="right"><span class="style18">:الإسم</span></div></td>
                                <td colspan="2"><div align="right"><span class="Style7"><?php echo $eleve->NOM; ?></span></div></td>
                                <td><div align="right" ><span class="style23">:اللقب</span></div></td>
                              </tr>
                              <tr>
                                <td colspan="2"><div align="right">
                                    <div align="right"><span class="Style7"><?php echo $eleve->LNS ;?></span></div>
                                </div></td>
                                <td width="23"><div align="right">:بـ</div></td>
                                <td width="209"><div align="right"><span class="Style7">
                                    <?php  echo $DNS;?>
                                </span></div></td>
                                <td><div align="right" class="style18">:تاريخ ومكان الإزدياد </div></td>
                              </tr>
                              <tr>
                                <td colspan="4"><div align="right"><span class="Style7"><?php echo $eleve->ADRESSE; ?></span></div></td>
                                <td><div align="right"><span class="style18">:العنوان</span></div></td>
                              </tr>
                            </table>
                            <p align="center" class="Style14" style="margin-top: 0; margin-bottom: 0; font-size: 24px;">                            معلومات خاصة بمركز إجراء الامتحان </p>
                            <div align="center"><hr width="280">
                            </div>
                            <table border="0" align="center">
                              <tr>
                                <td colspan="6"><div align="right">
                                  <div align="right"></div>
                                </div>                                  <div align="left"></div>                                <div align="right" ><span class="Style7">
                                    </span>
                                    <table width="750" border="0">
                                      <tr>
                                        <td width="96"><div align="right"><span class="Style7"><?php echo $eleve->NSALLE;?></span></div></td>
                                        <td width="88"><div align="left">:رقم القاعة</div></td>
                                        <td width="295"><div align="right"><span class="Style7">
                                            <?php  echo $eleve->NOMCENTRE;?>
                                        </span></div></td>
                                        <td width="128"><div align="right"><span class="Style18">:مركز الإجراء</span></div></td>
                                      </tr>
                                    </table>
                                <span class="Style7">                                    </span></div>                                <div align="right"></div></td>
                              </tr>
                              <tr>
                                <td colspan="6"><div align="right"></div>                                  <div align="right">
                                  <table width="750" border="0">
                                    <tr>
                                      <td width="487"><div align="right"><span class="Style7"><?php echo $eleve->ADDCENTRE?></span></div></td>
                                      <td width="128"><div align="right"><span class="Style18">:عنوان مركز الإجراء</span></div></td>
                                    </tr>
                                  </table>
                                </div>                                  <div align="right"></div>                                  <div align="left"></div>                                  <div align="right"></div>                                  <div align="right"></div>                                  <div align="right" dir="rtl">
                                    <div align="right"></div>
                              </div>                                <div align="right" class="Style18"></div></td>
                              </tr>
                              <tr>
                                <td colspan="5"><table width="750" border="0" align="right">
                                  <tr>
                                    <td width="98"><div align="right"><span class="Style7"><?php echo $eleve->WILAYAC ?></span></div></td>
                                    <td width="69">:ولاية</td>
                                    <td width="164"><div align="right"><span class="Style7"><?php echo $eleve->DAIRAC ?></span></div></td>
                                    <td width="50"><div align="left">:دائرة</div></td>
                                    <td width="157"><div align="right"><span class="Style7"><?php echo $eleve->COMMUNEC ?></span></div></td>
                                    <td width="61"><div align="right">:بلدية</div></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td width="133"><div align="right"><span class="Style7"><?php echo $eleve->ICODE ;?></span></div></td>
                                <td width="75"><div align="left">:رمزالمستوى</div></td>
                                <td width="177"><div align="right"><span class="Style7">
                                <span class="style35"><?php if ( $eleve->ICODE !='104'  and $eleve->ICODE !='204' and $eleve->ICODE !='304' and $eleve->ICODE !='404')  {echo "الشعبة:";
?>
                                </span><?php echo $eleve->FILIERE ;}  ?></span></div>                                  <div align="left"></div></td>
                                <td width="155"><div align="right"><span class="Style7"><?php echo $eleve->NIVEAU ;?></span></div></td>
                                <td width="68"><div align="right">:المستوى</div></td>
                              </tr>
                            </table>
                            
                        </div></td>
                      </tr>
                      
                      <tr>
                        <td><div align="center" class="Style11">مواقيت ومواد الإختبار </div></td>
                      </tr>
                    </table>
                     
                      <div align="center">
                        <?php
					 if ($eleve->ICODE=='104'){ 
                       echo ' eeee';
                      }
                     
		
					  ?>
                      </div>
  <table width="700" height="176" border="2" align="center" bordercolor="#000000">
  <tr>
    <td height="39" colspan="2"><div align="center" class="style29"> الفترة المسائية</div></td>
    <td colspan="2"><div align="center" class="style29">الفترة الصباحية</div></td>
    <td rowspan="2" valign="middle"><p align="center" class="style29" >المستوى</p></td>
    <td rowspan="2"><div align="center"><span class="style29">الشعبة</span></div></td>
  </tr>
  <tr>
    <td width="90"><div align="center" class="style25">
      <p align="center" style="margin-top: 0; margin-bottom: 0"><strong><span dir="rtl">15 سا و 45 د  </span></strong> </p>
      <p align="center"style="margin-top: 0; margin-bottom: 0"  dir="rtl"><strong>17 سا و 45 د </strong></p>
    </div></td>
    <td width="102"><div align="center" class="style25">
      <p align="center" style="margin-top: 0; margin-bottom: 0"><strong><span dir="rtl">13 سا و 30 د  </span></strong> </p>
      <p align="center"style="margin-top: 0; margin-bottom: 0"  dir="rtl"><strong>15 سا و 30 د </strong></p>
    </div></td>
    <td width="110" height="46"><div align="center" class="style25">
      <p align="center"style="margin-top: 0; margin-bottom: 0" > <strong><span dir="rtl">  10 سا و15د  </span></strong> <br />
            <strong><span dir="rtl"> 12 سا و15د </span></strong></p>
    </div></td>
    <td width="87" height="46"><div align="center" class="style25">
      <p align="center"> <strong><span dir="rtl"> 8 سا-10سا </span></strong></p>
    </div></td>
  </tr>
  <tr>
    <td height="79" ><div align="center" class="style31"><?php echo $program->m4 ; ?></div></td>
    <td ><div align="center" class="style31"><?php echo $program->m3 ; ?></div></td>
    <td ><div align="center" class="style31"><?php echo $program->m2 ; ?></div></td>
    <td ><div align="center" class="style31"><?php echo $program->m1 ; ?></div></td>
    <td width="88" ><div align="center" class="style31"><?php echo $eleve->FILIERE ; ?><br />
   </div></td>
    <td width="106" dir="rtl"><div align="center" class="style29"><?php echo $eleve->NIVEAU ;?>  </div></td>
  </tr>
</table>
					  
					  
                      <table width="750" border="0">
                      <tr>
                        <td colspan="2">
				
						</td>
                        </tr>
                      <tr>
                        <td width="236" rowspan="11"><img src="<?php echo base_url() ?>images/cachet.png" alt="onefd" width="236" height="100"></td>
                        <td width="504"><div align="right"><span class="style31">:تعليمات هامة للمترشح </span></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*على المترشح(ة)إحضار هذا الاستدعاء ، بطاقة الهوية و أدوات الامتحان</strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*لا يقبل تأخر المترشح (ة) لأكثر من 30 دقيقة من بداية الإختبار</strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><span style="margin-top: 0; margin-bottom: 0; font-weight: bold;">*&#1593;&#1604;&#1609; &#1575;&#1604;&#1605;&#1578;&#1585;&#1588;&#1581; &#1575;&#1581;&#1578;&#1585;&#1575;&#1605; &#1575;&#1604;&#1608;&#1602;&#1578; &#1575;&#1604;&#1605;&#1581;&#1583;&#1583; &#1604;&#1576;&#1583;&#1575;&#1610;&#1577; &#1603;&#1604; &#1575;&#1582;&#1578;&#1576;&#1575;&#1585;</span></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*يمنع منعا باتا إحضار المترشح(ة)للهاتف النقال إلى مركز الإجراء أو أية وسيلة أخرى للإتصال</strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*لايسمح للمترشح(ة) بمغادرة قاعة الإمتحان إلا بعد مضي 60 دقيقة من إنطلاق إختبار المادة </strong></div></td>
                      </tr>
                      <tr>
                        <td class="Style40"><div align="right" dir="rtl"><strong>*كل طالب(ة) يحصل على صفر من عشرين(00/20) في مادة من المواد يعتبر راسبا في الامتحان</strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*غياب المترشح(ة) في مادة يلغي إمتحانه في الدورة </strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*لا يسمح للطالب(ة) إلا بإستعمال الأوراق المسلمة له من طرف المركز </strong></div></td>
                      </tr>
                      <tr>
                        <td><div align="right" class="Style40" dir="rtl"><strong>*يسمح للطالب(ة) استعمال الآلة الحاسبة العلمية غير القابلة للبرمجة </strong></div></td>
                      </tr>
                      <tr>
                        <td height="17"><div align="right" class="Style40" dir="rtl">
                          <p style="margin-top: 0; margin-bottom: 0; font-weight: bold;">*في حالة الغش أو محاولة الغش يطرد المترشح(ة) من المركز ويلغى إمتحانه ، وتطبق  

عليه إجراءات الإقصاء طبقا للقوانين المعمول بها</p>
                          </div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="17"><div align="right"><span class="style47" dir="rtl">*على المترشح(ة)سحب كشف النقاط من الموقع فور الإعلان عن النتائج</span></div></td>
                      </tr>
                      <tr>
                        <td height="17" colspan="2"><div align="right" class="Style37">
                          <table width="700" border="1" bordercolor="#0000FF">
                            <tr>
                              <td><div align="center"><strong><span class="style45">&#1607;&#1575;&#1605;: <span class="style46">&#1604;&#1575;&#1610;&#1602;&#1576;&#1604; &#1575;&#1604;&#1591;&#1593;&#1606; &#1601;&#1610; &#1606;&#1578;&#1575;&#1574;&#1580; &#1575;&#1604;&#1575;&#1605;&#1578;&#1581;&#1575;&#1606;</span></span></strong></div></td>
                            </tr>
                          </table>
                        </div></td>
                        </tr>
                    </table>                    
                    </td>
                  </tr>
							                               
                            </table>
                </td>
              </tr>
        </table>
          </center>
    </div>
  </center>
</div>
</body>
</html>