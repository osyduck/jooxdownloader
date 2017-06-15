<?php
set_time_limit(0);
ignore_user_abort(1);
if(!$_POST['q']):
	print(json_encode(array('content' => false)));
	exit;
endif;
	header('Content-Type: application/json');
	$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_smartbox?callback=mutiara&lang=id&country=id&search='.base64_encode(trim($_POST['q'])).'&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = str_replace('mutiara(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	$list = '<div class="row"><div class="col-md-12"><div class="alert alert-success"><b>'.count($json->itemlist).'</b> Hasil ditemukan</div></div>';
	$r = 0;$faa = count($json->itemlist);
	for($i=0;$i<$faa;$i++):
		$r++;
		$list .= '<div class="col-md-6"><div class="alert alert-info"><a href="#" onclick="javascript:$(\'#q\').val(\''.base64_decode($json->itemlist[$i]->name).'\');" class="alert-link">'.$r.'. '.base64_decode($json->itemlist[$i]->name).'</a></div></div>';
	endfor;
	$list .= '</div>';
	print(json_encode(array('result' => true, 'content' => $list)));