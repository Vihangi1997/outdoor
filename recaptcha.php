<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<head>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg">Register a new membership</p>

    	<form action="register.php" method="POST" onsubmit="return(validate());">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group" style="width: 100%;">
            <div class="g-recaptcha" data-sitekey="6LeAo6IaAAAAANyNz_udkbXZ-NeoiTyxo8zOkIf">
              <span id="captcha_error" class="text-danger"></span>
            </div>
          </div>
          <!--
          <?php
            if(!isset($_SESSION['captcha'])){
              echo '
                <div class="form-group" style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6LeeBaAaAAAAACZ_D5ZLlk-MvNkDyqJ09jaBbgxt"></div>
                </div>
              ';
            }
          ?>
        -->
          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php">I already have a membership</a><br>
      <a href="landing.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
<script>
  $(document).ready(function(){
    $('#captcha_form').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:"register.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json"
        beforeSend:function()
        {
          $('#register').after('disabled','disabled');
        },
        success:function(data)
        {
          $('#register').attr('disabled',false);
          if (data.success) 
          {
            $('#captcha_form')[0].reset();
            $('#first_name_error').text('');
            $('#last_name_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            $('#captcha_error').text('');
            grecaptcha.reset();
            alert('Form Successfully validated');
          }
          else
          {
            $('#first_name_error').text(data.first_name_error);
            $('#last_name_error').text(data.last_name_error);
            $('#email_error').text(data.email_error);
            $('password_error').text(data.password_error);
            $('#captcha_error').text(data.captcha_error);

          }
        }
      })
    })
  })
</script>