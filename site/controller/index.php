<?php
require_once '../../vendor/autoload.php';
include("../../model/user.php");
// Init template engine
$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../view')
));

// Prepare data
$data = array();

// Render template
echo $m->render('index', $data);
?>