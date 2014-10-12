<?php 

include("../../model/user.php"); 


/*
/* Get error message from catch_sign_up.php and use contents to set  
/* the $extra_html to the appropriate error message to display in the view. 
*/



$message = $_GET["message"];
if($message == "passwords_dont_match") {
	$extra_html = "<div>Sorry, your passwords didn't match.</div>";
}
else if($message == "passwords_too_short"){
	$extra_html = "<div>Sorry, your password is too short.</div>";
}
else if($message == "error"){
	$extra_html = "<div>Sorry, something went wrong, please try again.</div>";
}

include("../view/sign_up_html.php");

?>