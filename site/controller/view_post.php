<?php 

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$name = get_name($id);
$date = $_GET["date"];
$post = get_past_post($id, $date);

include("../view/view_post_html.php");
	
?>