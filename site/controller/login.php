<?php

include("../../model/user.php");

$message = $_GET["message"];
$extra_html = "";
if($message == "invalid_login") {
	$extra_html = "<div>You had an invalid login; please try again.</div>";
}
else if($message == "session_expired") {
	$extra_html = "<div>Your session has expired; please log in again.</div>";
}

include("../view/login_html.php");

?>