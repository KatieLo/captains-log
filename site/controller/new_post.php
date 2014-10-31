<?php
include("../../model/user.php");
include("../../model/post.php");

$id = check_session();
$name = ucwords(get_name($id));
$date = get_todays_date();
$post = get_todays_post($id);
$message = $_GET["message"];
$notification_text = "";
if($message == "welcome"){
	$notification_text = "<div>The trick to being productive is logging what you accomplish each day. Just write down what you did - even (or especially) if it's not a  lot.</div>";
} else if($message == "saved"){
	$notification_text = "<div>Your post was saved.</div>";
}

include("../view/header_html.php");
include("../view/new_post_html.php");
include("../view/footer_html.php");

?>