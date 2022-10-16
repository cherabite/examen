
            </div>
       
	
			 
	  	  </div>
	    
		  <div id="well2" class="well well-lg">
	       <h4 class="text-center"> <a href="#">الديوان الوطني للتعليم و التكوين عن بعد </a></h4>
			 
	  	  </div>
	  </div>


  
 </div>
  
  
  	<div id="ajax_loader" style="display:none">
    <img id="loading-image" src="<?php echo base_url() ?>images/wait.gif" class="img-responsive"/ >
	<h3> من فظلك . إنتظر معالجة طلبك .. ! </h3>
    </div>
	
	   	<div class="modal fade" tabindex="-1" role="dialog" id="choi_wilaya">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
		  <div class="modal-header text-center">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="p">&times;</span></button>
			<h4 class="modal-title" style="color: #9900CC; font-weight: bold">أخــتر المركز الولائــي (أو الملـحق التابع للمركز الولائي) الذي تريد التسجيل فيه  :</h4>
		  </div>

     
    <form class="form-horizontal" method="post"  action="<?php echo base_url('index.php/inscriptic/action') ?>">

      <div class="modal-body">
      
           <div id="add-class-messages">
		   
		   </div>

			  <div class="form-group">
						<label for="className" class="col-sm-3 control-label">الولايـــة : </label>
							<div class="col-sm-7">
									  <select class="form-control" name="wilaya"  id="wilaya"   style="color: #9900CC; font-weight: bold" dir="rtl">
										 <option selected></option>
										 
										  <option id="01" >أدرار</option>
										  <option id="02" >الشلف</option>
										  <option id="03" >الأغواط</option>
										  <option id="25" >أم البواقي</option>
										  <option id="07" >باتنة</option>
										  <option id="06" >بجاية</option>
										  <option id="07" >بسكرة</option>
										  <option id="08" >بشار</option>
										  <option id="26" >البليدة</option>
										  <option id="15" >البويرة</option>
										  <option id="01" >تمنراست</option>
										  <option id="12" >تبسة</option>
										  <option id="13" >تلمسان</option>
										  <option id="14" >تيارت</option>
										  <option id="15" >تيزي وزو</option>
										  <option id="16" >الجزائر</option>
										  <option id="17" >الجلفة </option>
										  <option id="06" >جيجل</option>
										  <option id="19" >سطيف </option>
										  <option id="20" >سعيدة </option>
										  <option id="21" >سكيكدة</option>
										  <option id="31" >سيدي بلعباس</option>
										  <option id="23" >عنابة</option>
										  <option id="23" >قالمة</option>
										  <option id="25" >قسنطينة</option>
										  <option id="26" >المدية</option>
										  <option id="27" >مستغانم</option>
										  <option id="17" >المسيلة</option>
										  <option id="20" >معسكر</option>
										  <option id="30" >ورقلة</option>
										  <option id="31" >وهران</option>
										  <option id="20" >البيض</option>
										  <option id="30" >إيليزي</option>
										  <option id="19" >برج بوعريريج</option>
										  <option id="15" >بومرداس</option>
										  <option id="23" >الطارف</option>
										  <option id="08" >تندوف</option>
										  <option id="14" >تيسمسيلت</option>
										  <option id="39" >الوادي</option>
										  <option id="12" >خنشلة</option>
										  <option id="41" >سوق أهراس</option>
										  <option id="16" >تيبازة</option>
										  <option id="21" >ميلة</option>
										   <option id="44" >عين الدفلى</option>
										  <option id="20" >النعامة</option>
										  <option id="13" >عين تيموشنت</option>
										  <option id="03" >غرداية</option>
										  <option id="27" >غليزان</option>                
									 </select>
							</div>
							<div class="col-sm-2">
							</div>
			  </div>
		  <input type="hidden" name="act" id="act" value=""/>	  
      </div>
      <div class="modal-footer">
	  
	         
                    <div class="pull-left">

                        <div>
                            <button type="submit" class="btn btn-primary" id="valide" >مــوافق </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغــلاق</button>
                        </div>
                    </div>
               
	    
       </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
  </body>
  </html>