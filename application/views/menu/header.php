<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('is_login')== true ) {
?>
    <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> examen_cwefd_setif</title>
  
        <script> var base_url= "<?php echo base_url() ?>"</script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/table/jquery-3.3.1.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine-ar.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine.js" charset="utf-8"></script>	
		
	    <script type="text/javascript" src="<?php echo base_url() ?>custom/charger_date.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/table/jquery.dataTables.min.js" ></script>
   <script type="text/javascript" src="<?php echo base_url() ?>assets/table/dataTables.buttons.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/table/buttons.flash.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/table/jszip.min.js" ></script>
	 <script type="text/javascript" src="<?php echo base_url() ?>assets/table/pdfmake.min.js" ></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>assets/table/vfs_fonts.js" ></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>assets/table/buttons.html5.min.js" ></script>
	    <script type="text/javascript" src="<?php echo base_url() ?>assets/table/buttons.print.min.js" ></script>
		 <link href="<?php echo base_url() ?>assets/table/jquery.dataTables.min.css" rel="stylesheet">
		  <link href="<?php echo base_url() ?>assets/table/buttons.dataTables.min.css" rel="stylesheet">
		          <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
		 <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet">
		  <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/validationEngine.jquery.css" type="text/css"/>
		  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style2.css">
       <script type="text/javascript"  >
	   $(document).ready(function() {
   
} );
	   </script>	    
        <style>
		.strikeout1{
			font-weight: 900;
			font-size:37px
		}
       .row {
  margin-right: -15px;
  margin-left: -15px;
}
        li{text-align: right}
        </style>
      
    </head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">C_SETIF</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
		
          <ul class="nav navbar-nav">
		 <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-search"></i>&nbsp; بحث ب <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?php echo base_url('index.php/auth/form_matr'); ?>"  role="button" >&nbsp;رقم التسجيل  </a></li>                              
            <li><a href="<?php echo base_url('index.php/auth/form_nom'); ?>"> الاسم و اللقب</a></li>
			<li><a href="<?php echo base_url('index.php/auth/form_dns'); ?>"> تاريخ الميلاد</a></li>
			<li><a href="<?php echo base_url('index.php/auth/form_total'); ?>" target="_blank" > بحث شامل</a></li>
          </ul>
        </li>
          
        <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-list "></i>&nbsp; قوائم حسب <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?php echo base_url('index.php/auth/form_centre_deroulement'); ?>"  >&nbsp;مركز الإجراء  </a></li>                              
            <li><a href="<?php echo base_url('index.php/auth/form_niv_centre'); ?>"> المستوى + مركز الإجراء</a></li>
			<li><a href="<?php echo base_url('index.php/auth/form_niv'); ?>"> حسب المستوى</a></li>
          </ul>
        </li>
         
		 <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon  glyphicon-stats "></i>&nbsp; جداول إحصائية<span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="<?php echo base_url('index.php/auth/table_stat_total'); ?>"  >&nbsp;جدول إجمالي  </a></li>                              
            <li><a href="<?php echo base_url('index.php/auth/table_stat_centre'); ?>"> جدول حسب مركز الإجراء</a></li>
          </ul>
        </li>	
          <li><a href="<?php echo base_url('index.php/auth/form_sais_abs'); ?>"><i class="glyphicon  glyphicon-pencil "></i>&nbsp; حجز الغياب</a></li> 
		   <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon  glyphicon-print "></i>&nbsp; تقارير و طباعة<span class="caret"></span></a>
          <ul class="dropdown-menu">  
		  <li><a href="<?php echo base_url('index.php/auth/form_examen_list_abs'); ?>" >&nbsp;دفتر الغياب  </a></li> 
            <li><a href="<?php echo base_url('index.php/auth/form_examen'); ?>" >&nbsp;جدول التصحيح   </a></li>                              
            <li><a href="<?php echo base_url('index.php/auth/table_stat_abs'); ?>">جدول إحصاء الغياب</a></li>
          </ul>
        </li>
		  
		  <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i>&nbsp; <?php echo 'Administrateur' ;?><span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li><a href="#"  role="button" > <i class="glyphicon glyphicon-user"></i> &nbsp;المستخدم : <?php echo 'ONEFD_ADMIN' ?> </a></li>                              
            <li><a href="<?php echo base_url('index.php/auth/logout'); ?>"> تسجيل خروج</a></li>
          </ul>
        </li>
                        
          </ul>
		 
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  
<?php
			}else{
				$this->load->view('login/login');	
			}
           ?>	