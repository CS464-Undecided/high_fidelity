<?php
require_once 'database.php'; 
$salt = "cs464";

$databaseObj = new database();

function isLoggedIn() {
	if(isset($_SESSION["loggedIn"])) {
		if($_SESSION["loggedIn"] === true) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function logUserIn($user) {
	$_SESSION['firstName'] = $user->firstName;
	$_SESSION['userName'] = $user->userName;
	$_SESSION['PID'] = $user->PID;
	$_SESSION['lastName'] = $user->lastName;			
	$_SESSION['email'] = $user->email;
	$databaseObj = new database();
}
function getUserFromSession() {
	if(!isset($_SESSION["loggedIn"])) {
		return false;
	}
	return new User($_SESSION['PID'], $_SESSION['firstName'], $_SESSION['lastName'], $_SESSION['userName'], $_SESSION['email']);
	
}
/*
function createNewuser($firstName, $lastName, $userName, $gender, $mobileNumber, $imageLocation, $email, $password, $question_id, $question_answer, $is_admin) {
	$newUser = new User($firstName, $lastName, $userName, $gender, $mobileNumber, $imageLocation, $email, $password, $question_id, $question_answer, $is_admin);

}*/
function cleantext($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
}

// Sanitization function
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleantext($input);
        $output = trim($input);
    }
    return $output;
}
?>
