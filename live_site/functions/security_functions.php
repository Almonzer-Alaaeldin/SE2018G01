<?php
//Login Function
function login($email, $password) {
	require("dbconnect.php");
    // Using prepared statements to prevent SQL injection
	$stmt = $conn->prepare("SELECT id, email, password_hash, type
        FROM accounts
		WHERE email = ?
        LIMIT 1");
	$stmt->bind_param('s', $email);  // Bind "$email" to parameter.
    if ($stmt->execute()) {
		$stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $db_email, $db_password, $user_type);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked from too many login attempts
 
            if (checkbrute($user_id) == true) {
                // Account is locked
                return false;
            } else {
                // Check if the password in the database matches the password the user submitted.
                if (password_verify($password, $db_password) == true) {
                    // Password is correct!
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['UserID'] = $user_id;
					$_SESSION['UserType'] = $user_type;
                    $_SESSION['login_string'] = hash('sha512',$db_password);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct, so We record this attempt in the database
                    $now = time();
                    $conn->query("INSERT INTO login_attempts (AccountID) VALUES ('$user_id')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    } else {
		return false;
	}
}

function checkbrute($user_id) {
	require("dbconnect.php");
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $conn->prepare("
	SELECT Time
	FROM login_attempts
	WHERE AccountID = ?
	AND Time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check() {
	require("dbconnect.php");
    // Check if all session variables are set 
    if (isset($_SESSION['UserID'],$_SESSION['login_string'])) {
 
        $user_id = $_SESSION['UserID'];
        $login_string = $_SESSION['login_string']; 
 		$stmt = $conn->prepare("SELECT password_hash FROM accounts WHERE id = ? LIMIT 1");
		$stmt->bind_param('i', $user_id);
		
        if ($stmt->execute()) {
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password);
				
                if (hash_equals($login_string,$login_check) ){
                    // Logged In
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function is_admin() {
	require("dbconnect.php");
    // Check if all session variables are set 
    if (isset($_SESSION['UserID'],$_SESSION['login_string'])) {
 
        $user_id = $_SESSION['UserID'];
        $login_string = $_SESSION['login_string'];
 		$stmt = $conn->prepare("SELECT password_hash,type FROM accounts WHERE id = ? LIMIT 1");
		$stmt->bind_param('i', $user_id);
		
        if ($stmt->execute()) {
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password,$Type);
                $stmt->fetch();
                $login_check = hash('sha512', $password);
				
                if (hash_equals($login_string,$login_check) ){
                    // Logged In
					//Check if user is an admin and return the result
                    return ($Type == "Admin");
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}
?>