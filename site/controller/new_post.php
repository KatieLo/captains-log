<?php

$message = $_GET["message"];
if($message == "welcome"){
	$welcome = "<div>Welcome to Captain's Log! Create your first post.</div>";
}

include("../view/new_post_html.php");

?>
