<?php
class Company {
    //global for each function 
    public static function Create($Name,$Phone,$Mission,$Vision,$Brief,$Email,$Password_Hash,$Verification_Hash) {
		require_once "service_web_database.php";
        $Statement = $conn->prepare("INSERT INTO accounts (email,password_hash,type,is_verified) VALUES (?,?,'company',?)");
		$Statement->bind_param("sss",$Email,$Password_Hash,$Verification_Hash);
        if($statement->execute()) {
			$Statement2 = $conn->prepare("INSERT INTO companies (name,phone,mission,vision,brief,account_id) VALUES (?,?,?,?,?,LAST_INSERT_ID())");
			$Statement2->bind_param("sssss",
								  $Name,
								  $Phone,
								  $Mission,
								  $Vision,
								  $Brief);
			if ($statement2->execute()) {
				return true;
			} else {
				$conn->query("DELETE FROM accounts WHERE AccountID = LAST_INSERT_ID()");
				return false;
			}
    	} else {
			$conn->close();
			return false;
		}
	}

/*public function delete(){
global $db ; 
$query_delete="DELETE FROM companies WHERE id=$this->id;"
}*/




};



?>