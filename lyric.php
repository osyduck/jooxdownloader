<?php
  include 'functions.php';
  if(!$_GET['id'])
  {
    header('location: index.php');
    exit;
  }
  
  $id  = $_GET['id'];
  $ch = curl_init('https://api.joox.com/web-fcgi-bin/web_get_songinfo?songid='.base64_decode($id).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_COOKIE, 'wmid=14997771; user_type=2; country=id; session_key=96870dd03ab9280c905566cad439c904;');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
  $json = curl_exec($ch);
  curl_close($ch);
  $json = str_replace('MusicInfoCallback(', '', $json);
  $json = str_replace(')', '', $json);
  $json = json_decode($json);
  
  /* Getting Lyrics */
  $ch = curl_init('https://api.joox.com/web-fcgi-bin/web_lyric?musicid='.base64_decode(trim($_GET['id'])).'&lang=id&country=id&_='.time());
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
  $ly = curl_exec($ch);
  curl_close($ch);
  $ly = str_replace('MusicJsonCallback(', '', $ly);
  $ly = str_replace(')', '', $ly);
  $ly = json_decode($ly);
  
  $ly = str_replace('[999:00.00]***Lirik didapat dari pihak ketiga***', '***Recoded By J***', base64_decode($ly->lyric));
  $ly = str_replace('[offset:0]', '', $ly);
  
  $filetype = ".txt";
  $mime = "text/plain";
  $sing = $json->msinger;
  $song = $json->msong;
  ob_start();
  ?>
Nama Lagu : <?=$song?>

Penyanyi : <?=$sing?>

Album : <?=$json->malbum?>

Tanggal Rilis : <?=tgl_indo($json->public_time, true);?>

Durasi Lagu : <?=gmdate('i:s', $json->minterval)?>


Lirik Lagu:
<?=$ly?>
<?php
  $lyrics = ob_get_clean();
/*	echo '<pre>';
	print_r($json);
	echo '</pre>'; */
/*header("Content-type: application/x-file-to-save");*/
  header("Content-type: ".$mime);
  //header("Content-Transfer-Encoding: Binary");
  header("Content-Length: ".strlen($lyrics));
  header('Content-Disposition: attachment; filename="'.$sing.' - '.$song.' Lyrics'.$filetype.'"');
  header("Cache-Control: no-cache, no-store, must-revalidate");
  header("Pragma: no-cache");
  //header("Cache-Control: public, max-age=604800");
  echo $lyrics;
?>
