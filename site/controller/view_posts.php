<?php 

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$name = ucwords(get_name($id));
$posts = get_all_posts($id);
$today = get_todays_date();


include("../view/view_posts_html.php");
	
?>