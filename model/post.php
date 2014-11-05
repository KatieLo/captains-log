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

	$stmt = $dbh->prepare("SELECT content, log_date FROM post WHERE user_id=:user_id ORDER BY log_date DESC");
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

function search_posts($search_term, $id){
	global $dbh;
	$search_term = trim($search_term);

	$stmt = $dbh->prepare("SELECT content, log_date FROM post WHERE content LIKE :search AND user_id=:user_id ORDER BY log_date DESC");
	$stmt->execute(array('search' => '%'.$search_term.'%', 'user_id' => $id));

	$results = array();
	$seach_result_substring_lenght = 200;
	foreach ($stmt as $row) {
		$result = array();
		$result["content"] =  $row["content"];

		$pos = stripos($result["content"], $search_term);
		$endPos = $pos + strlen($search_term) + ($seach_result_substring_lenght/2);
		$startPos = $pos - ($seach_result_substring_lenght/2);

		if($startPos < 0){
			$startPos = 0;
		} 

		if($endPos > strlen($result["content"]) - 1){
			$endPos = strlen($result["content"]);
		}
		
		$search_match_substring = substr($result["content"], $startPos, $endPos - $startPos);
		
		if($startPos > 0){
			$result["content"] = "...".$search_match_substring;
		} else {
			$result["content"] = $search_match_substring;
		}

		$result["date"] = $row["log_date"];
		$results[] = $result;
	}
	return $results;
}

// takes in content, $text, and a phrase to highlight, $search, and returns the content with the phrase highlighted
function highlight_text($text, $search){
	$text = preg_replace("/($search)/i","<span style='font-weight:bold'>\${1}</span>",$text);
	return $text;
}

function get_todays_date(){
	return date('Y-n-j');
}

?>