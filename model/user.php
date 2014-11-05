<?php

include("lib.php");

/*
/* Function creates a new User object and saves it to the Database, 
/* assigns the new user a unique user ID,
/* Returns the user ID if successful and 0 if failed.
*/

function get_name($id){
	global $dbh;

	$stmt = $dbh->prepare("SELECT first_name FROM user WHERE id=:id");
	$stmt ->execute(array('id' => $id));
	$name = "";
	foreach ($stmt as $row) {
		$name = $row['first_name'];
	}
	return $name;
}


function create_new_user($password, $name, $email) {
	global $dbh;

	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$new_id = -1;
	$stmt = $dbh->prepare("INSERT INTO user (first_name, email, password) VALUES (:name, :email, :hash)");
	$stmt->execute(array('name'=>$name,'email'=>$email,'hash'=>$hash));
	$new_id = $dbh->lastInsertId();;

	if($new_id > 0) {
		set_session($new_id);
		return $new_id;	
	} else {
		return 0;
	}
}

function set_session($id) {
	// $dbh comes from lib - use global to include it because it's defined outside function
	global $dbh;
	
	// generate a random string to use as the session string
	$session_string = generateRandomString(20);


	// prepare the query and update the DB with the random session string
	$stmt = $dbh -> prepare("UPDATE user SET session=:session_string WHERE id=:id");
	$stmt -> execute(array('session_string' => $session_string, 'id' => $id));
	

	// set the session cookie in the browser (only lasts while browser is open)
	$_SESSION["session_key"] = $session_string;
	
}

function destroy_session() {
	global $dbh;
	$id = check_session();
	
	$stmt = $dbh -> prepare("UPDATE user SET session=:'' WHERE id=:id");
	$stmt -> execute(array('session_string' => '', 'id' => $id));

	$_SESSION["session_key"] = "";
}

function check_session() {
	global $dbh;
	$session = $_SESSION["session_key"];

	if ($session == "" || $session == false || $session == null) {
		header("Location: login.php?message=session_expired");
		die();
	}

	$stmt = $dbh -> prepare("SELECT id FROM user WHERE session=:session");
	$stmt -> execute(array('session' => $session));
	$id = -1;
	foreach ($stmt as $row) {
	    $id = $row["id"];
	}

	if ($id == -1) {
		header("Location: login.php?message=session_expired");
		die();
	} else {
		return $id;
	}
}

function check_login($email, $password) {
	global $dbh;
	$password_hash = "";
	$id = -1;

	$stmt = $dbh -> prepare("SELECT id, password FROM user WHERE email=:email");
	$stmt -> execute(array('email' => $email));

	foreach ($stmt as $row) {
	    $id = $row["id"];
	    $password_hash = $row["password"];
	}

	if(password_verify($password, $password_hash)) {
		set_session($id);
		return true;
	}
	else {
		return false;
	}
}

function check_email($email) {
	global $dbh;
	$exists = false;

	$stmt = $dbh -> prepare("SELECT id FROM user WHERE email=:email");
	$stmt -> execute(array('email' => $email));
	foreach ($stmt as $row) {
		$exists = true;
	}
	return $exists;
}

// Copied from http://stackoverflow.com/questions/4356289/php-random-string-generator
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>