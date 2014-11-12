<?php
require_once '../../vendor/autoload.php';
include("../../model/user.php");
include("../../model/post.php");

// Init template engine
$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../view')
));

$data = array();
$id = check_session();
if($id > -1){
	$data["logged-in"] = true;
}

// Render template
echo $m->render('header', $data); 
echo $m->render('about'); 
echo $m->render('footer'); 
?>