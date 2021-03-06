<?php
include('Aksi_Register.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  
 
</head>

<body>



     <div class="container">
      <form class="form-login" method="POST" action="Register.php">
        <h2 class="form-login-heading">Register</h2>

        <div class="login-wrap">

        	<?php if (isset($_SESSION['success'])): ?>
        		<div class="error success">
        			<h3>
        				<?php 
        					echo $_SESSION['success'];
        					unset($_SESSION['success']);
        				 ?>
        			</h3>
        		</div>
       		<?php endif ?>
       		<?php if (isset($_SESSION["username"])): ?>
       			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
       			<p><a href="Cek_Login.php?=logout='1'" style="color: red;">Logout</a></p>
       		<?php endif ?>
     	</from>
     </div>
    </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
 
</body>

</html>
