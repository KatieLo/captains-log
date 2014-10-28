<?php

include("../../model/user.php");

$email = $_POST["email"];
$password = $_POST["password"];

$valid = check_login($email, $password);
if($valid){
	header("Location: new_post.php");
	die();
} else {
	header("Location: login.php?message=invalid_login");
	die();
}

?>