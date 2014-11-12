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
$data["logged-in"] = false;
$id = check_session();
if($id > -1){
	$data["logged-in"] = true;
} else {
    $has_message = true;
    $data["extra_html"] = "Your session has expired. Please log in.";
}

$data["has_message"] = $has_message;
$today = get_todays_date();
$data["name"] = ucwords(get_name($id));
$data["date"] = $_GET["date"];
$data["post"] = nl2br(get_past_post($id, $data["date"]));

if($data["date"] == $today){
	$data["link_text"] = "today";
} else {
	$data["link_text"] = $data["date"];
}

echo $m->render('header', $data); 
if($data["logged-in"]){
	echo $m->render('view_post', $data); 	
} else {
	echo $m->render('login', $data); 
}
echo $m->render('footer'); 
	
?>