<?php
class Developer {
    //global for each function 
    public static function Create($Name,$Phone,$Country,$Age,$YearsOfExperience,$FieldsOfExperience,$PaymentPerHr,$WorkingHrs,$ProgrammingLangs,$Skills,$Email,$Password_Hash,$Verification_Hash)
	{
		require_once "service_web_database.php";
        $Statement = $conn->prepare("INSERT INTO accounts (email,password_hash,type,is_verified) VALUES (?,?,'developer',?)");
		$Statement->bind_param("sss",$Email,$Password_Hash,$Verification_Hash);
        if($Statement->execute()) {
			$Statement2 = $conn->prepare("INSERT INTO developers (name,phone,country,age,years_of_exp,field,payment,working_hrs,programming_languages,skills,account_id) VALUES (?,?,?,?,?,?,?,?,?,?,LAST_INSERT_ID())");

			$Statement2->bind_param("sssiisiiss",
								   $Name,
									$Phone,
									$Country,
									$Age,
									$YearsOfExperience,
									$FieldsOfExperience,
									$PaymentPerHr,
									$WorkingHrs,
									$ProgrammingLangs,
									$Skills);
			if ($Statement2->execute()) {
				return true;
			} else {
				$conn->query("DELETE FROM accounts WHERE AccountID = LAST_INSERT_ID()");
				return false;
			}
    	} else {
			$db->close();
			return false;
		}
	}

/*public function delete(){
global $db ; 
$query_delete="DELETE FROM companies WHERE id=$this->id;"
}*/




};



?>