<?php

include("../../model/user.php");

$email = $_POST["email"];
if(check_email($email)){
	echo 1;
} else {
	echo 0;
}

?>