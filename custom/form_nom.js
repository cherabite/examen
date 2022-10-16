        


           
   $(document).ready(function () {
	   
	   	//==========================================================================	
             jQuery("#form_nom").validationEngine({ 'custom_error_messages': {
				'#nom': {
                'required': {
                     'message': "أكتب لقبك "
				}
                },
			 '#prenom': {
                'required': {
                    'message': "أكتب إسمك "
				}
                }
				
			
				
              
        }
        });
  //==========================================================================         
        $("#valid").click(function (event) {
              event.preventDefault();
             var valid = $("#form_nom").validationEngine('validate');
			//  valid = true;
        if (valid == true) { 
            $("#ajax_loader").show();		
        	var form=  $("#form_nom");
                        $.ajax({
                            type: 'POST',
                            url: base_url+'index.php/wel/form_nom',
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
							error: function(jqXHR,textStatus, errorThrown){alert(errorThrown);$("#ajax_loader").hide();}
                        });
						// return true;
        }else{
            return false;
        }
		
               
  					 });
				   
 });// end   $(document).ready(function 

//==========================================================================	    

//==========================================================================	
	
     	