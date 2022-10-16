<?php
$date  = date_create($date_conv);
$date_conv = date_format($date, 'd-m-Y');
?>
    <!DOCTYPE html>
<html>
    <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>إستدعاء إثبات المستوى</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" >
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style2.css">
		<!-- javascript    -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>custom/charger_date.js" charset="utf-8"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine-ar.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine.js" charset="utf-8"></script>
	    <script> var base_url= "<?php echo base_url() ?>"</script>
        
       <style>
	   
 
	   </style>
	   </head>
<body>
<div class="container" style="margin-top:1%">  
      <div class="well well-lg">
	      <div  id="well1" class="well well-lg">
		     <div  class="row">
			 <div class="col-md-3 col-xs-12" > 
	           <h4 class="text-center pull-right" style="padding-right: 20%;"> <span> <img src="<?php echo base_url() ?>images/logo.png" class="img-circle" alt="ONEFD" width="100px" width="100px" ></span> </h4>
			    </div>
			    <div class="col-md-6 " > 
	               <p class="text-center"style="color: white" >   الجمهورية الجزائرية الديمقراطية الشعبية</p>
			       <p class="text-center" style="color: white">   وزارة الـتــربية الــوطـنيـة</p>
			       <p class="text-center" style="color: white">  الــديوان الــوطـنـي للـتـعلــيم و التـكــويـن عن بـعـد</p>
				   <p class="text-center " style="color: white">   إستدعاء امتـحــان إثبـات المـستـوى : <?php echo $date_conv ?></p> 
			    </div>
				<div class="col-md-3 " > 
	            
			    </div>
	  	  </div>
		  </div>
	 <nav class="navbar navbar-inverse " >
      <div class="container">
       
        <div id="navbar" class="collapse navbar-collapse pull-right">
		
          <ul class="nav navbar-nav">
		         <li><a class="active" href="#choi_wilaya" role="button" data-act-id="matr" data-toggle="modal"  >&nbsp;طباعة برقم التـســجيــل <span class="glyphicon glyphicon-print pull-right"style="color:#99ff33"></span></a></li>
				 <li><a href="#choi_wilaya" role="button" data-act-id="enpr" data-toggle="modal"  >&nbsp;برقم الإستمارة <span class="glyphicon glyphicon-print pull-right"style="color:#99ff33"></span></a></li>
				  <li><a href="#choi_wilaya" role="button" data-act-id="nom_pre" data-toggle="modal" >&nbsp;بالإســم و اللقب <span class="glyphicon glyphicon-print pull-right"style="color:#99ff33"></span></a></li>
                
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		  <div class="well well-lg">
	              
       <div class="panel panel-primary">
	     
		
               
		
           
               
		