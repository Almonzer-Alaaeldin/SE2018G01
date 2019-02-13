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

$sql = "DELETE  developers,accounts FROM developers INNER JOIN accounts ON developers.account_id=accounts.id WHERE account_id=9 ;";
      //number 9 is the "$account_id" which will come from the login
$db->query($sql);



header('Location: index.php');
?>
