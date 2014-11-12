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
$id = check_session();
$has_message = false;
$message = $_GET["message"];
$name = ucwords(get_name($id));
$date = get_todays_date();
$post = get_todays_post($id);
$notification_text = "";

$data["logged-in"] = false;

if($id > -1){
	$data["logged-in"] = true;
} else {
	$has_message = true;
	$data["extra_html"] = "Your session has expired. Please log in.";
}
	
if($message == "welcome"){
	$notification_text = "The trick to being productive is logging what you accomplish each day. Just write down what you did - even (or especially) if it's not a  lot.</div>";
	$has_message = true;
} else if($message == "saved"){
	$notification_text = "Your post was saved.";
	$has_message = true;
} 

$data["notification_text"] = $notification_text;
$data["has_message"] = $has_message;
$data["name"] = $name;
$data["date"] = $date;
$data["post"] = $post;



// Render template
echo $m->render('header', $data); 
if($data["logged-in"]){
	echo $m->render('new_post', $data); 	
} else {
	echo $m->render('login', $data); 
}

echo $m->render('footer'); 

?>