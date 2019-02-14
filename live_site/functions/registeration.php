<?php
session_start();
if (!isset($_POST['type']) || $_SERVER["REQUEST_METHOD"] != "POST") {
	$_SESSION['message'] = "You tried to access inaccessible page!";
	$_SESSION['message_type'] = "alert-danger";
	header("Location: ../index.php");
}
include("input_validate.php");
include("security_functions.php");
require_once("dbconnect.php");
//Get form type
$Form_Type = input_validate($_POST['type']);
//Getting common inputs for both companys and developers (after validating them)
$Name			= input_validate($_POST['Name']);
$Email			= input_validate($_POST['Email']);
$Password		= input_validate($_POST['Password']);
$Repeat_Password= input_validate($_POST['Repeatpassword']);
$Phone_Number	= input_validate($_POST['Phone']);
$Phone_Code		= input_validate($_POST['Phone_Code']);
//Concatenate phone code with phone number
$Phone = $Phone_Code.$Phone_Number;

$Password_Hash = '';
//Flag for sucess/fail in account creation
$Flag = false;
if($Password !== $Repeat_Password) {
	$_SESSION['message'] = "The password and its repetition didn't match!";
	$_SESSION['message_type'] = "alert-warning";
	header("Location: ../registeration.php");
}
else {
	//Password and its repetition match
	//Hash the password
	$Password_Hash = password_hash($Password,PASSWORD_BCRYPT);
	$Verification_Hash = md5(uniqid($Email, true));
	
	//Create account
	$CreationSucceed = false;
	if ($Form_Type == "company") {
		//Company
		//Getting custom form data after validating them
		$Mission= input_validate($_POST['mission']);
		$Vision	= input_validate($_POST['vision']);
		$Brief	= input_validate($_POST['brief']);

		require_once "../models/Company.php";
		$CreationSucceed = Company::Create($Name,$Phone,$Mission,$Vision,$Brief,$Email,$Password_Hash,$Verification_Hash);
	} else if ($Form_Type == "developer") {
		//Developer
		//Getting custom form data after validating them
		$Country			= input_validate($_POST['Country']);
		$Age				= input_validate($_POST['Age']);
		$YearsOfExperience	= input_validate($_POST['Experience']);
		$FieldsOfExperience	= input_validate($_POST['Expertise']);
		$Skills				= input_validate($_POST['Skills']);
		$ProgrammingLangs	= input_validate($_POST['Programming']);
		$WorkingHrs			= input_validate($_POST['WorkingHours']);
		$PaymentPerHr		= input_validate($_POST['Payment']);
		
		require_once "../models/Developer.php";
		$CreationSucceed = Developer::Create($Name,$Phone,$Country,$Age,$YearsOfExperience,$FieldsOfExperience,$PaymentPerHr,$WorkingHrs,$ProgrammingLangs,$Skills,$Email,$Password_Hash,$Verification_Hash);
	} else {
		//Not valid!
		$_SESSION['message'] = "You tried to access inaccessible page!";
		$_SESSION['message_type'] = "alert-danger";
		header("Location: ../index.php");
	}
	if ($CreationSucceed) {
		//Succeed
		$_SESSION['message'] = "Account created successfully!";
		$_SESSION['message_type'] = "alert-success";
		login($Email,$Password);
		header("Location: ../profile/index.php");
	} else {
		//Failed
		$_SESSION['message'] = "Something went wrong, please try again later.";
		$_SESSION['message_type'] = "alert-danger";
		header("Location: ../index.php");
	}
	
}
/*
$_SESSION['message'] = "Something went wrong, please try again later.";
$_SESSION['message_type'] = "alert-danger";
header("Location: ../index.php");
*/


//Check first step succeed
if ($Flag) {
	//Company Registeration
	if ($Form_Type == "company") {
		
			
	}
	//Developer Registeration
	else if ($Form_Type == "developer") {
		

		if ($Statement->execute()) {
			//Query for office creation
			

			if ($Statement->execute()) {
				$_SESSION['message'] = "Account created successfully!";
				$_SESSION['message_type'] = "alert-success";
				login($Email,$Password);
				header("Location: ../profile/index.php");
			} else {
				$conn->query("DELETE FROM accounts WHERE AccountID = LAST_INSERT_ID()");
				$_SESSION['message'] = "Something went wrong, please try again later.";
				$_SESSION['message_type'] = "alert-danger";
				header("Location: ../index.php");
			}
			$Statement->close();
			$conn->close();
		} else {
			$_SESSION['message'] = "Something went wrong, please try again later.";
			$_SESSION['message_type'] = "alert-danger";
			header("Location: ../index.php");
		}
		$Statement->close();
		$conn->close();
	}
}
?>