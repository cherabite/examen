        


           
   $(document).ready(function () {
	 
	   	//==========================================================================	
             jQuery("#form_dns").validationEngine({ 'custom_error_messages': {
				
			 
				
				'#jour': {
                'required': {
                    'message': "أدخل اليوم الذي ولدت فيه "
				}
                },
				'#mois': {
                'required': {
                    'message': "أدخل  الشهر الذي ولدت فية "
				}
                },
				'#annee': {
                'required': {
                    'message': "أدخل السنة التي ولدت فيها "
				}
                }

               
        }
        });
  //==========================================================================         
        $("#valid").click(function (event) {
              event.preventDefault();
        var valid = $("#form_dns").validationEngine('validate');
			//  valid = true;
        if (valid == true) {  
        	var form=  $("#form_dns");
			 $("#ajax_loader").show();
                        $.ajax({
                            type: 'POST',
                            url: base_url+'index.php/wel/form_dns',
                            dataType: 'json',
                            data: form.serialize(),
							cache:false,
							
                            success: function (res) {
							 $("#ajax_loader").hide(); 
                              if (res.success == 0  ) {
					      $('#show_data').html('');
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
								  $('#show_data').html(''); 
								 $('#show_data').html(res.valid); 
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
 				   
 });// end   $(document).ready(function 

//==========================================================================	    

	
	