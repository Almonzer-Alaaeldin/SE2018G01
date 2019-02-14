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
	<title>SAW | About Us</title>
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
<div class="container">
	<h1>About Us</h1>
	<hr>
	<h1># SE2018G01</h1>
<h2>Team Members</h2>
    <ul>
      <li>Ahmed Abdalla</li>
      <li>Islam Shaaban</li>
      <li>Almonzer Alaaeldin</li>
      <li>Amgad Abdelkhaleq</li>
      <li>Ehab Abdelghany</li>
      <li>Baher Abdelfatah</li>
      <li>Hazem Mostafa</li>
      <li>Omar Taher</li>
    </ul>
<h2>Final BRD</h2>
    <a href = "https://github.com/Almonzer-Alaaeldin/SE2018G01/blob/master/BRD%20Document/BRD%20document.pdf">Final BRD</a>
<h2>Final SRS</h2>
    <a href = "https://github.com/Almonzer-Alaaeldin/SE2018G01/blob/master/SRS%20Document/Final%20SRS.pdf">Final SRS</a>

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
