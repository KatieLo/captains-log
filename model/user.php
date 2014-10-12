<?php

include("lib.php");

/*
/* Function creates a new User object and saves it to the Database, 
/* assigns the new user a unique user ID,
/* sets a current session for the new user.
*/
function create_new_user($password, $name, $email) {
	global $dbh;

	$hash = password_hash($password, PASSWORD_DEFAULT);

	$new_id = -1;
	$stmt = $dbh->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :hash)");
	$stmt->execute(array('name'=>$name,'email'=>$email,'hash'=>$hash));
	$new_id = $dbh->lastInsertId();

	if($new_id > 0) {
		set_session($new_id);
		header("Location: log.php?message=welcome");
		die();
	} else {
		header("Location: register.php?message=error");
		die();
	}
}


?>