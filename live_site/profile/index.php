<?php
session_start();
require_once "../functions/security_functions.php";
if (!login_check()) {
	header("Location: ../index.php");
}
if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
	define('ROOT','/SWProject');
} else {
	define('ROOT','');
}
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Logged In Template.dwt.php" codeOutsideHTMLIsLocked="true" -->
	
	<head>
	<!-- InstanceBeginEditable name="Title" -->
	<title>SAW | My Profile</title>
	<!-- InstanceEndEditable -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Splash Screen CSS-->
	<link rel="stylesheet" href="../css/splash_screen.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" type="text/css" href="../css/Styles.css">
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/MainScript.js"></script>
		<script src="../js/all.js"></script>
	</head>
<body>
		<?php require_once('../assets/navbar.php'); ?>
		<?php require_once('../assets/splash-screen.php'); ?>
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
<h1>Welcome!</h1>
</div>	
<!-- InstanceEndEditable -->
	<?php require_once('../assets/footer.php'); ?>
	<!-- InstanceBeginEditable name="JavaScript" -->
	<script>
	
	</script>
	<!-- InstanceEndEditable -->
	
		

	</body>
<!-- InstanceEnd --></html>
