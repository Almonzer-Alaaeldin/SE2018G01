<!DOCTYPE html>
<html lang="en">
<head>
  <title>Developer Registration</title>
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
  $database = "dbname=developer_profile";  
  $dsn = "$driver:host=localhost;$database";  
  try {  
    $db = new PDO($dsn, "root", "");  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } 
  catch(PDOException $e){
    echo "Connection failed: " .$e->getMessage();
  }
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    $inFullname = $_POST["Name"]; 
    $inCountry= $_POST["Country"];
    $inAge= $_POST["Age"];
    $inExperience= $_POST["Experience"];
    $inExpertise= $_POST["Expertise"];
    $inSkills= $_POST["Skills"];
    $inProgramming= $_POST["Programming"];
    $inWorkingHours= $_POST["WorkingHours"];
    $inPayment= $_POST["Payment"];
    $inEmail = $_POST["Email"];
    $inPhone = $_POST["Phone"];
    $inPassword = $_POST["password"]; 
    $inRePassword = $_POST["Repeatpassword"];
    $encryptPassword = password_hash($inPassword, PASSWORD_DEFAULT);
    $data=array( $inFullname, $inCountry, $inAge,$inExperience,$inExpertise,$inSkills,$inProgramming,$inWorkingHours,$inPayment,$inEmail,$inPhone,$inPassword,$inRePassword);
    $stmt = $db->prepare("INSERT INTO developer_profile(NAME,Country, Age , Years_of_exp , Fields_of_Expertise, Skills, Programming_languages_mastered,Working_Hours, Payment_per_hour,email,phone_number,PASS_WORD,repeat_password) VALUES(?,?,?,?,?,?,?,?,?,?, ?, ?, ?)"); //Fetching all the records with input credentials
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
        <a href="developerregistrationform.html">Try Login</a>
        <?php 
      }*/
  }
  ?>
</body>
</html>
