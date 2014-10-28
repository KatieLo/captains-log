<?php 

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$name = get_name($id);
$posts = get_all_posts($id);


include("../view/view_posts_html.php");
	
?>