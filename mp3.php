<?php



$id  = $_GET['id'];
$ch = curl_init('https://api.joox.com/web-fcgi-bin/web_get_songinfo?songid='.base64_decode($id).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIE, 'wmid=14997771; user_type=2; country=id; session_key=96870dd03ab9280c905566cad439c904;');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);

	$json = str_replace('MusicInfoCallback(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	$fi = $json->r320Url;
	$sing = $json->msinger;
	$song = $json->msong;
/*	echo '<pre>';
	print_r($json);
	echo '</pre>'; */
header("Content-type: application/x-file-to-save");
header('Content-Disposition: attachment; filename="'.$song.' - '.$sing.'.mp3"');
readfile($fi);



?>

