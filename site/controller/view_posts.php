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
$today = get_todays_date();
$data["name"] = ucwords(get_name($id));
$data["posts"] = get_all_posts($id);
$has_posts = false;

if(count($data["posts"]) > 0){
	$has_posts = true;
}
$data["has_posts"] = $has_posts;

foreach($data["posts"] as &$post){
    if($post["date"] == $today){
    	$post["link_text"] = "Today";
    } else {
    	$post["link_text"] = $post["date"];
    }
}
unset($post); // because $post is being passed by reference, after the foreach loop, $post variable is still a pointer to the last element in the array.

// Render template
echo $m->render('header'); 
echo $m->render('view_posts', $data); 
echo $m->render('footer'); 

?>