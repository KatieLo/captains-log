<?php
require_once '../../vendor/autoload.php';

// Init template engine
$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../view')
));

// Prepare data
$data = array();
$data["planet"] = "World!";

// Render template
echo $m->render('example', $data); // "Hello World!"
?>