<?php 
require_once '../../vendor/autoload.php';
include("../../model/user.php");
include("../../model/post.php");
// Init template engine
$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../view')
));

// Prepare data
$data = array();

/*
/* Get error message from catch_sign_up.php and use contents to set  
/* the $extra_html to the appropriate error message to display in the view. 
*/

$extra_html = "";

$has_message = false;
$message = $_GET["message"];

if($message == "passwords_dont_match") {
	$extra_html = "Sorry, your passwords didn't match. Please type it again.";
	$has_message = true;
} else if($message == "passwords_too_short") {
	$extra_html = "Sorry, your password is too short.";
	$has_message = true;
} else if($message == "something_went_wrong"){
	$extra_html = "Oh, snap! Something went wrong. Please try again.";
	$has_message = true;
}
$data["sign-up-page"] = true;
$data["logged-in"] = false;	
$data["extra_html"] = $extra_html;
$data["has_message"] = $has_message;

// Render template
echo $m->render('header', $data);
echo $m->render('sign_up', $data); 
echo $m->render('footer');
?>