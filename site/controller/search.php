<?php
include("../../model/user.php");
include("../../model/post.php");

	$id = check_session();
	$search_term = $_POST['search'];
	$results = search_posts($search_term, $id);
	$today = get_todays_date();
	
include("../view/results_html.php");

?>