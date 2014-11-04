<?php

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
if ($id > 0) {
	$post = $_POST["post"];
	save_post($post, $id);	
	echo 1;
} else {
	echo 0;
}



?>