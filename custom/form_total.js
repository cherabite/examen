

        


           
   $(document).ready(function () {
	   

 //==========================================================================
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

//============================================================================		
 });// end   $(document).ready(function 

//==========================================================================	    

	
	