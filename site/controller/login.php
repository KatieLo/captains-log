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

$extra_html = "";
$has_message = false;
$message = $_GET["message"];
if($message == "invalid_login") {
	$extra_html = "Your user name and password didn't match. Please try again.";
	$has_message = true;
} else if($message == "session_expired") {
	$extra_html = "Your session has expired; please log in again.";
	$has_message = true;
}
$data["extra_html"] = $extra_html;
$data["has_message"] = $has_message;
$data["sign-up-page"] = false;
$data["logged-in"] = false;	


// Render template
echo $m->render('header', $data);
echo $m->render('login', $data); // "Hello World!"
echo $m->render('footer');
?>