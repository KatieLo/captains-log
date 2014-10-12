<?php

include("../../model/user.php");

// catch the variables from the HTML form at sign_up_html.php

$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$name = $_POST["name"];
$email = $_POST["email"];

/* 
/* Basic error checking: if password is too short, 
/* or passwords don't match set message variable to the appropriate value.
/* Controller sign_up.php uses this value to set the content of
/* extra html displayed to the user at view sign_up_html.php 
*/

if(strlen($password1) < 5) {
	header("Location: sign_up.php?message=passwords_too_short");
	die();
} else if($password1 != $password2) {
	header("Location: sign_up.php?message=passwords_dont_match");
	die();
}

?>