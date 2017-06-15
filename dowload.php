<?php
/* set_time_limit(0);
ignore_user_abort(1);
if(!$_GET['id']||!$_GET['size']){
	header('location: index.php');
	exit;
}
	$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_get_songinfo?songid='.base64_decode(trim($_GET['id'])).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIE, 'wmid=14997771; user_type=2; country=id; session_key=96870dd03ab9280c905566cad439c904;');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = str_replace('MusicInfoCallback(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	if(!$json->album_url){
		header('location: index.php');
		exit;
	}
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	(trim($_GET['size'])=='tv') ? header('Content-Type: audio/mp4') : header('Content-Type: audio/mpeg');
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Disposition: attachment;filename=".$json->msong." - ".$json->msinger.".mp3");
	header("Content-Transfer-Encoding: binary");
	$file = (trim($_GET['size'])=='tv') ? $json->m4aUrl : $json->hdUrl;
	$ch = curl_init($file);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIE, 'wmid=10641174; user_type=1; country=id; session_key=54e9c8a1e32bdcb01cbd94312acbf670;');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	print $json; */