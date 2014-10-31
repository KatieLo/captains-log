<?php 

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$name = ucwords(get_name($id));
$date = $_GET["date"];
$post = nl2br(get_past_post($id, $date));

include("../view/header_html.php");
include("../view/view_post_html.php");
include("../view/footer_html.php");
	
?>