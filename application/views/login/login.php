
<!DOCTYPE html>
<html>
    
<head>
  
       
	<title> Login </title>
		
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" >

        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" >
 
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/login.css" >
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

</head>
<!--Coded with love by Mutiullah Samim-->

<body>
   <div class="login-wrap">
  <div class="login-html">
  			<?php if(validation_errors()){
							echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">Attention </span>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';
						
						echo'<div ><ol>' ;
						
                      // echo validation_errors('<li>', '</li>'); 
                        echo validation_errors('<li><span class="label label-danger">', '</span></li>'); 
						echo'</ol></div>';
						echo'</div>';
					
					}
	    	?>
		           <?php
				
                     if (isset($message)) {
					   echo '<div  class="alert alert-warning alert-dismissible" id="message">'; 
                       echo $message;
					   echo  '</div>';
					   
					 }
				?>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">تسجيل الدخول</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <form class="sign-in-htm" action="<?php echo site_url('Auth/log_usere'); ?>" method="POST">
        <div class="group">
          <label for="user" class="label">اسم المستخدم</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">كلمة المرور</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> </label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="دخول">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="">ONEFD</a>
        </div>
      </form>
      <form class="sign-up-htm" action="" method="POST">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirm Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign Up">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </form>
    </div>
  </div>
</div>
  


</body>
</html>
