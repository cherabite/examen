 $(document).ready(function () {
 
    //==========================================================================
		$("#voir").click(function (event) {
                    event.preventDefault();

             $("#ajax_loader").show();
			var form=  $("#form_total");
                        $.ajax({
                            type: 'POST',
                            url: base_url+'index.php/finence/calcul_total',
                            dataType: 'json',
                            data: form.serialize(),
							cache:false,
                            success: function (res) {
							$("#ajax_loader").hide();
                              if (res.success == 0  ) {
					     
						     $("#errorvalidation").html(  '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">Attention </span>'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>'+
							  '<div ><ol>' +
							  res.valid_error +
							  '</ol></div>'+
							  '</div>');
							  $('html, body').animate({ scrollTop: 0 }, 0);
              					  
                             }
							 if(res.success == 1){
								  $('#tab-conten').html(''); 
								 $('#tab-conten').html(res.valid); 
								 $('html, body').animate({ scrollTop: 0 }, 0);
							 }
							 if(res.success == 2){
								  $('#tab-conten').html(''); 
								  $('#tab-conten').html(res.valid); 
								  $('html, body').animate({ scrollTop: 0 }, 0);
							 }
							  if (res.captcha !== null  ) {
							  $('#captcha').val('');
							  $('.image').html(res.captcha);
							  }
                            },
							error: function(jqXHR,textStatus, errorThrown){$("#ajax_loader").hide();
							 alert('Activer votre compte');
							}
                        });
						// return truhe;
       
               
					 }); 
//====================================================================================================	
 
 
  });