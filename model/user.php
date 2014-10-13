<?php

include("lib.php");

/*
/* Function creates a new User object and saves it to the Database, 
/* assigns the new user a unique user ID,
/* Returns the user ID if successful and 0 if failed.
*/
function create_new_user($password, $name, $email) {
	global $dbh;

	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$new_id = -1;
	$stmt = $dbh->prepare("INSERT INTO user (first_name, email, password) VALUES (:name, :email, :hash)");
	$stmt->execute(array('name'=>$name,'email'=>$email,'hash'=>$hash));
	$new_id = $dbh->lastInsertId();

	if($new_id > 0) {
		return $new_id;
		
	} else {
		return 0;
	}
}


?>