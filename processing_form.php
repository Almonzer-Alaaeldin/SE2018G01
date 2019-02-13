<!DOCTYPE html>
<html lang="en">

<body>
<?php 
$driver = 'mysql';
$database = "dbname=service_web_database";  
$dsn = "$driver:host=localhost;$database";  
try {
  $db = new PDO($dsn, "islam", "1234");  
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
  $for_query = '';
  if(!empty($_POST["ProgLang"]))
  {
   $inProgLang = implode(",",$_POST["ProgLang"]);
  }
  else
  {
   echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
  }

  $inWorkingHours= $_POST["WorkingHours"];
  $inPayment= $_POST["Payment"];
  $inEmail = $_POST["Email"];
  $selectOption = $_POST['phOption'];
  $inPhone = $_POST["Phone"];
  $inPassword = $_POST["password"]; 
  $inRePassword = $_POST["Repeatpassword"];
  if($inPassword==$inRePassword){
    $encryptPassword = password_hash($inPassword, PASSWORD_DEFAULT);
    $ps=array($inEmail,$inPassword);
    $st=$db->prepare("INSERT INTO accounts(email,password_hash,type) VALUES(?,?,'developer')");
    $st->execute($ps);
    $account_id=$db->lastInsertId();
    $data=array( $account_id,$inFullname, $inCountry, $inAge,$inExperience,$inExpertise,$inSkills,$inWorkingHours,$inPayment,$inProgLang,$selectOption.$inPhone);
    $stmt = $db->prepare("INSERT INTO developers (account_id,name,country, age , years_of_exp ,field, skills,working_hrs, payment,programming_languages,phone) VALUES(?,?,?,?,?,?,?,?,?,?,?)"); //Fetching all the records with input credentials
    $stmt->execute($data);
  }
  else
  {
    echo  "<label class='text-danger'>* Please Check The Password Equality</label>";
  }




}

?>
</body> 
</html>
