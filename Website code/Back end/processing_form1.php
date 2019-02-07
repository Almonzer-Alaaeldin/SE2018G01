<!DOCTYPE html>
<html lang="en">
<head>
  <title>Client Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link rel="stylesheet" href="styles/Styles.css">
</head>
<body>
<?php
$driver = 'mysql';
$database = "dbname=saw";  
$dsn = "$driver:host=localhost;$database";  
try {  
$db = new PDO($dsn, "root", "");  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";} 
catch(PDOException $e){ echo "Connection failed: " .$e->getMessage(); }

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $inFullname = $_POST["Name"];
 $inEmail = $_POST["Email"]; 
 $inPhone = $_POST["Phone"];
 $inMission = $_POST["Mission"];
 $inVision = $_POST["Vision"];
 $inAbout = $_POST["About"];
 $inPositions = $_POST["Positions"];
 $inRequirments = $_POST["Requirments"];
 $inPhases = $_POST["Phases"];
 $inPassword = $_POST["password"]; 
 $inRePassword = $_POST["Repeatpassword"];

$encryptPassword = password_hash($inPassword, PASSWORD_DEFAULT);
$data=array($inFullname, $inEmail, $inPhone , $inMission , $inVision , $inAbout , $inPositions , $inRequirments , $inPhases ,$inPassword,$inRePassword);
$stmt = $db->prepare("INSERT INTO client_profile(Name, Email , Phone , Mission , Vision , Company_Description , Needed_Position , Job_Requirements , Selection_Phases ,PW,RePW) VALUES(?,?,?,?,?,?,?,?, ?, ?, ?)"); //Fetching all the records with input credentials
$stmt->execute($data);
/*$result = $stmt->affected_rows;
  $stmt -> close();
  $db -> close(); 
  if($result > 0)
  {
    <div style="text-align:left">
    <h1>Registration Successful </h1>
    </div>
    <br/>
  }
  else
  {
   echo "Oops. Something went wrong. Please try again"; 
   ?>
   <a href="clientregistrationform.html">Try Login</a>
   <?php 
  }*/
}

?>
</body> 
</html>
