<?php
session_start();
include_once('dbconnect.php');
include_once('security_functions.php');
include_once('redirect.php');
 
if (isset($_POST['Email'], $_POST['Password'])) {
    $Email = $_POST['Email'];
    $password = $_POST['Password'];
    if (login($Email, $password) == TRUE || login_check()) {
        // Login success
		$_SESSION['message'] = "تم الدخول بنجاح!";
		$_SESSION['message_type'] = "alert-success";
		//Check if user is verified, approved or not
		$Statement = $conn->prepare("SELECT Verified FROM accounts WHERE AccountID = ? LIMIT 1");
		$Statement->bind_param("i",$_SESSION['UserID']);
		$Statement->execute();
		$result = $Statement->get_result();
		$result = $result->fetch_array();
		$Statement->close();
		redirect('../profile/index.php');
    } else {
        // Login failed
		$_SESSION['message'] = "بياناتك غير صحيحة (البريد الالكتروني أو كلمة السر).";
		$_SESSION['message_type'] = "alert-danger";
        redirect('../index.php');
    }
} else {
    $_SESSION['message'] = "حدث عطلٍ ما.. حاول مرة أخرى.";
	$_SESSION['message_type'] = "alert-danger";
	 redirect('../index.php');
}

?>