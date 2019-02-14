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
	<title>SAW | Create Account</title>
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
	<div class="card bg-light">
		<div class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Create Your Account (<?= isset($_GET['type']) ? ucfirst($_GET['type']) : 'Developer' ?>)</h4>
			<p class="text-center">Get started with your free account</p>
			<form action="functions/registeration.php" method="post">
				<?php if (isset($_GET['type']) && $_GET['type'] == 'company'): ?>
				<input hidden name="type" value="company"/>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i> </span>
					 </div>
					<input name="name" class="form-control" placeholder="Company Name" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
				<div class="input-group-prepend">
				<span class="input-group-text"> <i class="fas fa-eye"></i> </span>
				<textarea name="vision" rows="3" cols="40" placeholder="Vision" required></textarea> </div>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
				<div class="input-group-prepend">
				<span class="input-group-text"> <i class=" fas fa-info-circle"></i> </span>
				</div>
				<textarea name="mission" rows="3" cols="40" placeholder="Mission" required></textarea>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
				<div class="input-group-prepend">
				<span class="input-group-text"> <i class=" fas fa-info-circle"></i> </span>
				<textarea name="brief" rows="3" cols="40" placeholder="Brief Descripition" required></textarea> </div>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
				<div class="input-group-prepend">
				<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
				</div>
					<input name="Email" class="form-control" placeholder="Email address" type="email" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="Password" class="form-control" placeholder="Create password" type="password" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="Repeatpassword" class="form-control" placeholder="Repeat password" type="password" required>
				</div> <!-- form-group// -->				
				<?php else: ?>
				<input hidden name="type" value="developer"/>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-user"></i> </span>
					</div>
					<input name="Name" class="form-control" placeholder="Full name" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-globe"></i> </span>
					</div>
					<input name="Country" class="form-control" placeholder="Country" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-child"></i> </span>
					</div>
					<input name="Age" class="form-control" placeholder="Age" type="number" min="12" max="70" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
					</div>
					<input name="Experience" class="form-control" placeholder="Years of Experience" type="number" min="1" max="15" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-info"></i> </span>
					</div>
					<textarea name="Expertise" rows="3" cols="42" placeholder="Fields of Expertise" required></textarea>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="	fa fa-info-circle"></i> </span>
					</div>
					<textarea name="Skills" rows="3" cols="40" placeholder="Skills" required></textarea>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-language"></i> </span>
					</div>
					<textarea name="Programming" rows="3" cols="40" placeholder="Programming languages mastered" required></textarea>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-clock"></i> </span>
					</div>
					<input name="WorkingHours" class="form-control" placeholder="Working Hours" type="number" min="1" max="16" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="	fas fa-dollar-sign"></i> </span>
					</div>
					<input name="Payment" class="form-control" placeholder="Payment per hour" type="number" min=10 required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					</div>
					<input name="Email" class="form-control" placeholder="Email address" type="email" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>
					<select class="custom-select" name="Phone_Code" style="max-width: 120px;" required>
						<option selected="">+20</option>
						<option value="1">+972</option>
						<option value="2">+198</option>
						<option value="3">+701</option>
					</select>
					<input name="Phone" class="form-control" placeholder="Phone number" type="text" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="Password" class="form-control" placeholder="Create password" type="password" required>
				</div> <!-- form-group// -->
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
					<input name="Repeatpassword" class="form-control" placeholder="Repeat password" type="password" required>
				</div> <!-- form-group// -->
				<?php endif; ?>
				<div class="form-group text-center">
					<button name="form_submitted" type="submit" class="btn btn-primary btn-block">Create Account</button>
				</div> <!-- form-group// -->
				<p class="text-center">Have an account? <a data-toggle="modal" data-target="#LoginModal" style="cursor: pointer; color:blue">Log In</a></p>
			</form>
			
		</div>
	</div> <!-- card.// -->
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
