<?php
session_start();
if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
	define('ROOT','/SWProject');
} else {
	define('ROOT','');
}
require_once "functions/security_functions.php";
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Main Template.dwt.php" codeOutsideHTMLIsLocked="true" -->
	
	<head>
	<!-- InstanceBeginEditable name="Title" -->
	<title>SAW | Welcome</title>
	<!-- InstanceEndEditable -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Splash Screen CSS-->
	<link rel="stylesheet" href="css/splash_screen.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" type="text/css" href="css/Styles.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/MainScript.js"></script>
		<script src="js/all.js"></script>
	</head>
<body>
		<?php require_once('assets/navbar.php'); ?>
		<?php require_once('assets/splash-screen.php'); ?>
		<?php if (isset($_SESSION['message'])): ?>
		<div class="alert alert-dismissible text-center fade show <?= $_SESSION['message_type']; ?>" role="alert" style="margin-top: -20px;">
			<?= $_SESSION['message'] ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php unset($_SESSION["message"],$_SESSION["message_type"]) ?>
		<?php endif ?>
<!-- InstanceBeginEditable name="Page Content" -->
	<!--Image Carousel START-->
	<div class="jumbotron text-center" style="margin-bottom: 0; padding: 0px 0px 0px 0px; background-color: lavender">
      <div id="ImgSlide" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#ImgSlide" data-slide-to="0"></li>
        <li data-target="#ImgSlide" data-slide-to="1" class="active"></li>
        <li data-target="#ImgSlide" data-slide-to="2"></li>
      </ul>

      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="assets/images/Dev1.jpg" alt="Devs" style="height: 400px; width: 100%; filter: blur(3px) contrast(0.5); ">
           	<div class="carousel-caption">
        		<h1 style="color: black;">Developers</h1>
        		<p style="color: black;">Become a developer</p>
      		</div>
        </div>
        <div class="carousel-item  active">
          <img src="assets/images/office4.jpg" alt="Bussiness" style="height: 400px; width: 100%; filter: blur(2px) contrast(0.5);">
            <div class="carousel-caption">
        		<h1 style="color: black;">Bussiness</h1>
        		<p style="color: black;">Some bussiness</p>
      		</div>
        </div>
        <div class="carousel-item">
          <img src="assets/images/Enter1.jpg" alt="Enterpenurship" style="height: 400px; width: 100%; filter: blur(1px) contrast(0.5);">
            <div class="carousel-caption">
        		<h1 style="color: black;">Enterpenurship</h1>
        		<p style="color: black;">Kickstart your bussiness</p>
      		</div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#ImgSlide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#ImgSlide" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
    </div>
	<!--Image Carousel END-->
<div class="container">	
 <div class="row">
  	<div class="col-sm-12">
  		<h1>Welcome</h1>
  		<p>This website is an online platform for those who are looking to start their careers whether as a developer/freelancer or someone looking to make their own startups and need technical aid.
		</p>
  	</div>
  </div>
  <div class="row" >
  	<div class="col-sm-12">
  		<h1>Advertising</h1>
		<p>The website gives starting developers the platform on which they can create
		a name for their own and build their portfolio, each developer can login and
		create their own profile the website also keeps stats of successful job rates
		and feedback and also offers additional periodic advertising for active users
		of the platform by sending scheduled automated emails. The website also
		offers a proposal service where developers can propose their services to
		particular clients.</p>
  	</div>

  </div>
   <div class="row">
  	<div class="col-sm-12">
  		<h1>Meeting Needs</h1>
		<p>
		If someone wants it, another probably is ready to serve it. On this platform
		multiple services will be available by multiple developers to choose from,
		and for the ones not yet available service requests will be considered to add
		the service to the available ones, by checking periodically what is the most
		required service is and adding it to the list of available services.
		</p>
  	</div>
  </div>
</div>	
<!-- InstanceEndEditable -->


	<?php require_once('assets/login_form.php'); ?>
	<?php require_once("assets/footer.php"); ?>
	<!-- InstanceBeginEditable name="JavaScript" -->
	<script>
	
	</script>
	<!-- InstanceEndEditable -->
	
		

	</body>
<!-- InstanceEnd --></html>
