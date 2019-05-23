<?php
  include 'functions.php';
  if(!$_GET['id'])
  {
    header('location: index.php');
    exit;
  }
  $id  = $_GET['id'];
  $quality = $_GET['q'];
  $format = $_GET['f'];
  $ch = curl_init('https://api.joox.com/web-fcgi-bin/web_get_songinfo?songid='.base64_decode($id).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIE, 'wmid=14997771; user_type=2; country=id; session_key=96870dd03ab9280c905566cad439c904;');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
  $json = curl_exec($ch);
  
  $json = str_replace('MusicInfoCallback(', '', $json);
  $json = str_replace(')', '', $json);
  $json = json_decode($json);
  $fi = "";
  $filetype = ".".$format;
  $mime = "";
  $size = "";
  if ($quality == '320' && $format == 'mp3')
  {
    $fi = $json->r320Url;
    $mime = "audio/mpeg";
    $size = $json->size320;
  }
   
  elseif ($quality == '192' && $format == 'm4a')
  {
    $fi = $json->r192Url;
    $mime = "audio/mp4";
    $size = curl_get_file_size($fi);
  }
   
  elseif ($quality == '128' && $format == 'mp3')
  {
    $fi = $json->mp3Url;
    $mime = "audio/mpeg";
    $size = $json->size128;
  }
   
  elseif ($quality == '90' && $format == 'm4a')
  {
    $fi = $json->m4aUrl;
    $mime = "audio/mp4";
    $size = curl_get_file_size($fi);
  }
   
  else
  {
    if (!function_exists('http_response_code'))
    {
      header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    }
    
    else
    {
      http_response_code(404);
    }
    header("Cache-Control: no-cache, no-store, must-revalidate");
    die("Format and Quality Not Found or you type it wrong, please go back !");
  }
  
  $sing = $json->msinger;
  $song = $json->msong;
/*
	echo '<pre>';
	print_r($json);
	echo '</pre>';
*/
/*header("Content-type: application/x-file-to-save");*/
  header("Content-Type: ".$mime);
  header("Content-Transfer-Encoding: Binary");
  header("Content-Length: ".$size);
  header('Content-Disposition: attachment; filename="'.$sing.' - '.$song.''.$filetype.'"');
  header("Cache-Control: public, max-age=604800");
  readfile($fi);
?>