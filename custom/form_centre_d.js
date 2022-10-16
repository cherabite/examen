        


           
   $(document).ready(function () {
	   

       $('.list_patient').DataTable();
	   $("#ajax_loader").hide(); 
	   jQuery("#form_centre_d").validationEngine({ 'custom_error_messages': {
				 '#centre_d': {
                'required': {
                    'message': "اختر مركز الإجراء"
                }
               }
		
        }
        });
	       //===================================   
        $("#valid").click(function (event) {
              event.preventDefault();
        var valid = $("#form_centre_d").validationEngine('validate');
        if (valid == true) {  
        	var form=  $("#form_centre_d");
			 $("#ajax_loader").show();
                        $.ajax({
                            type: 'POST',
                            url: base_url+'index.php/wel/form_centre_d',
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
                               	  $('#list_patient').DataTable(
									{
									dom: 'lBfrtip',
									buttons: [
										'copyHtml5',
										'excelHtml5',
										'csvHtml5',
										'pdfHtml5'
									],
									"language": {"sProcessing": "جارٍ التحميل...",
												"sLengthMenu": "أظهر _MENU_ مدخلات",
												"sZeroRecords": "لم يعثر على أية سجلات",
												"sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
												"sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
												"sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
												"sInfoPostFix": "",
												"sSearch": "البحث:",
												"sUrl": "",
												"oPaginate": {
													"sFirst": "الأول",
													"sPrevious": "السابق",
													"sNext": "التالي",
													"sLast": "الأخير"}

											}
								}
									);
								 
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

	
	