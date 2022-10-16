        


           
   $(document).ready(function () {
	   
	   $("#ajax_loader").hide(); 
	   jQuery("#form_sais_abs").validationEngine({ 'custom_error_messages': {
				 '#icode': {
                'required': {
                    'message': "اختر المستوى"
                }
               }
		
        }
        });
	       //===================================   
        $("#valid").click(function (event) {
              event.preventDefault();
        var valid = $("#form_sais_abs").validationEngine('validate');
        if (valid == true) {  
        	var form=  $("#form_sais_abs");
			 $("#ajax_loader").show();
                        $.ajax({
                            type: 'POST',
                            url: base_url+'index.php/wel/form_sais_abs',
                            dataType: 'json',
                            data: form.serialize(),
							cache:false,
                            success: function (res) {
							 $("#ajax_loader").hide(); 
                              if (res.success == 0  ) {
					           $('#form_sais').html(''); 
						     $("#errorvalidation").html(  '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>'+
							  '<div ><ol>' +
							  res.valid_error +
							  '</ol></div>'+
							  '</div>');
                            $('html, body').animate({ scrollTop: 0 }, 0);							  
                             }
							 if(res.success == 1){
							
								 $("#errorvalidation").html('');
								  $('#form_sais').html(''); 
								 $('#form_sais').html(res.valid); 
                            
								 
								 $('html, body').animate({ scrollTop: 0 }, 0);
							 }
							  if (res.captcha !== null  ) {
							  $('#captcha').val('');
							  $('.image').html(res.captcha);
							  }
							 
                            },
							error: function(xhr,textStatus, errorThrown){
								if(textStatus){
									alert('الملقم لا يستجيب  . أعد المحاولة ');
							     }else{
									alert('الملقم لا يستجيب  . أعد المحاولة ');
								 }
								 $("#ajax_loader").hide();
						  }
							
                        });
						// return true;
        }else{
            return false;
        }
		
               
  					 });
 //==========================================================================
 		

//============================================================================		
 });// end   $(document).ready(function 

//==========================================================================	    

	
	