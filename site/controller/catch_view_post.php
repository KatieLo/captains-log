<?php

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$date = 
$post = get_past_post($id, $date);
header("Location: log?date=".$date);


?>