<?php

include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$post = $_POST["post"];
save_post($post, $id);

header("Location: new_post.php?message=saved");


?>