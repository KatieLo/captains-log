<?php
require_once '../../vendor/autoload.php';
include("../../model/user.php");
include("../../model/post.php");

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
	
$data["search_term"] = $_POST['search'];
$data["results"] = search_posts($data["search_term"], $id);
$has_posts = false;

if(count($data["results"]) > 0){
	$has_results = true;
}
$data["has_results"] = $has_results;

foreach($data["results"] as &$result){
	$data["highlighted_content"] = highlight_text($result["content"], $data["search_term"]);
    if($result["date"] == $today){
    	$result["link_text"] = "Today";
    } else {
    	$result["link_text"] = $result["date"];
    }
}
unset($result);	

// Render template
echo $m->render('header', $data); 
if($data["logged-in"]){
    echo $m->render('results', $data);     
} else {
    echo $m->render('login', $data); 
}
echo $m->render('footer'); 

?>