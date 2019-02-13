<?php
$driver = 'mysql';
$database = "dbname=service_web_database";  
$dsn = "$driver:host=localhost;$database";  
try {
  $db = new PDO($dsn, "islam", "1234");  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} 
catch(PDOException $e){
  echo "Connection failed: " .$e->getMessage(); 
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $inFullname = $_POST["name"]; 
  $inCountry= $_POST["country"];
  $inAge= $_POST["age"];
  $inExperience= $_POST["years_of_exp"];
  $inExpertise= $_POST["field"];
  $inSkills= $_POST["skills"];
  $for_query = '';
  if(!empty($_POST["ProgLang"]))
  {
   $inProgLang = implode(",",$_POST["ProgLang"]);
  }
  else
  {
   echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
  }
  $inWorkingHours= $_POST["working_hrs"];
  $inPayment= $_POST["payment"];
  $inEmail = $_POST["email"];
  $inPhone = $_POST["phone"];
  $data=array( $inFullname, $inCountry, $inAge,$inExperience,$inExpertise,$inSkills,$inProgLang,$inWorkingHours,$inPayment,$inPhone);
  $sql="UPDATE developers SET name = ?, country = ?, age= ? , years_of_exp = ?, field = ?, skills= ?, programming_languages = ?,working_hrs  = ?, payment = ?, phone = ?   WHERE account_id = 9;";
      //number 9 is the "$account_id" which will come from the login

  $db->prepare($sql)->execute($data);

	}
	header('Location: developer_UI.php');
?>
