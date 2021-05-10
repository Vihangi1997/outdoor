<html>
<head>
  <style>
    .left, .right {
      height: 85%;
      width: 50%;
      position: fixed;
      overflow-x: hidden;
      padding-top: 20px;
   }
   .left {
      left: 0;
      background-color: #b3d9ff;
   }
   .right {
      right: 0;
      background-color: #cce6ff ;
   }
   .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
   }
  
  </style>
</head>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
   
    <div class="content-wrapper">
        <div class="left">
         <h2 style="color: #0066cc;"><center><u>Our Vision </u></center></h2><br>
         <p><center>Our vision is to inspire men around Sri Lanka and make them trust in their sense of fashion and outfit.<center></p>
    <br>
    <p><center>OutDoor Textile is dynamic, innovative lifestyle brand motivated by realistic goals and objectives.</center></p>
        </div>
      <div class="right">
          <h2 style="color: #000666;"><center><u>Our Mission</u></center></h2><br>
          <p><center>Inspire and improve personality through our passion for creative, world-class menswear solutions.</p><br>
    <p>Work, engage and retain the best talent and conducting involves learning among stakeholders.</p><br>
    <p>Taking advantage of new technologiesto maximize productivity, build demand.</p><br>
    <p>Establish socially appropriate and ethically appropriate principles of sustainability.</p>
        </div>
      
    </div>
   
  
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>