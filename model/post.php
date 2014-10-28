<?php

include("lib.php");

function save_post($post, $id){
	global $dbh;

	$date = get_todays_date();
	$content = get_todays_post($id);

	if($content == ""){
		$stmt = $dbh->prepare("INSERT INTO post (content, user_id, log_date) VALUES (:content, :user_id, :log_date)");
		$stmt->execute(array('content'=>$post, 'user_id'=>$id, 'log_date'=>$date));
	} else {
		$stmt = $dbh->prepare("UPDATE post SET content=:content WHERE log_date=:date AND user_id=:user_id");
		$stmt->execute(array('content'=>$post, 'user_id'=>$id, 'date'=>$date));
	}	
}

function get_todays_post($id) {
	global $dbh;

	$date = get_todays_date();
	$stmt = $dbh->prepare("SELECT content FROM post WHERE log_date=:date AND user_id=:user_id");
	$stmt->execute(array('date' => $date, 'user_id'=>$id));
	$content = "";
	foreach ($stmt as $row) {
		$content = $row["content"];
	}
	return $content;
}

function get_past_post($id, $date){
	global $dbh;

	$stmt = $dbh->prepare("SELECT content FROM post WHERE log_date=:date AND user_id=:user_id");
	$stmt->execute(array('date' => $date, 'user_id'=>$id));
	$content = "";
	foreach ($stmt as $row) {
		$content = $row["content"];
	}
	return $content;
}

function get_all_posts($id){
	global $dbh;

	$stmt = $dbh->prepare("SELECT content, log_date FROM post WHERE user_id=:user_id");
	$stmt->execute(array('user_id'=>$id));
	
	$posts = array();
	
	foreach ($stmt as $row) {
		$post = array();
		$post["content"] =  $row["content"];
		$post["date"] = $row["log_date"];
		$posts[] = $post;
	}
	return $posts;

}

function get_todays_date(){
	return date('Y-n-j');
}

?>