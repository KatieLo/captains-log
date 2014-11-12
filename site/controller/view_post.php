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
if($id > -1){
	$data["logged-in"] = true;
}
$data["name"] = ucwords(get_name($id));
$data["date"] = $_GET["date"];
$data["post"] = nl2br(get_past_post($id, $data["date"]));

echo $m->render('header', $data); 
echo $m->render('view_post', $data); 
echo $m->render('footer'); 
	
?>