<?php
set_time_limit(0);
ignore_user_abort(1);
if(!$_POST['q']||!$_POST['w']||!$_POST['r']):
	print(json_encode(array('content' => false)));
	exit;
endif;
	header('Content-Type: application/json');
	$ch = curl_init('http://api.joox.com/web-fcgi-bin//web_category_search?callback=mutiara&lang=id&country=id&type=1&search_input='.rawurlencode(trim($_POST['q'])).'&pn='.trim($_POST['w']).'&sin='.trim($_POST['e']).'&ein='.trim($_POST['r']).'&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = str_replace('mutiara(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	$list = '<div class="row"><div class="col-md-12"><div class="alert alert-success"><b>'.$json->resultnum.'</b> album yang ditemukan terkait dengan "<b>'.trim($_POST['q']).'</b>"</div></div>';
	$baby = count($json->result);for($i=0;$i<$baby;$i++):
		if($baby<1)
			$list .= '<div class="col-md-3"><img class="img-circle" src="assets/images/default-avatar.png" width="140" height="140"></div>';
		else
			$list .= '<div class="col-md-3"><img class="img-circle" src="'.$json->result[$i]->bigpic.'" width="128" height="128"><p><a class="btn btn-default" href="album.php?id='.$json->result[$i]->id.'" role="button">'.base64_decode($json->result[$i]->title).' &raquo;</a></p></div>';
	endfor;
	$list .= '</div>';
	if($json->resultnum<=30):
		$btn1 = 1;
		$btn2 = 0;
		$btn3 = 0;
		$btn4 = 0;
		$btn5 = 0;
		$btn6 = 0;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=60):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 0;
		$btn4 = 0;
		$btn5 = 0;
		$btn6 = 0;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=90):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 0;
		$btn5 = 0;
		$btn6 = 0;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=120):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 0;
		$btn6 = 0;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=150):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 0;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=180):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 1;
		$btn7 = 0;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=200):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 1;
		$btn7 = 1;
		$btn8 = 0;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=210):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 1;
		$btn7 = 1;
		$btn8 = 1;
		$btn9 = 0;
		$btn10 = 0;
	elseif($json->resultnum<=240):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 1;
		$btn7 = 1;
		$btn8 = 1;
		$btn9 = 1;
		$btn10 = 0;
	elseif($json->resultnum<=300):
		$btn1 = 1;
		$btn2 = 1;
		$btn3 = 1;
		$btn4 = 1;
		$btn5 = 1;
		$btn6 = 1;
		$btn7 = 1;
		$btn8 = 1;
		$btn9 = 1;
		$btn10 = 1;
	endif;
	print(json_encode(array('result' => true, 'content' => $list, 'btn1' => array('show' => $btn1, 'q' => trim($_POST['q']), 'w' => 1, 'e' => 0, 'r' => 29) , 'btn2' => array('show' => $btn2, 'q' => trim($_POST['q']), 'w' => 2, 'e' => 30, 'r' => 59), 'btn3' => array('show' => $btn3, 'q' => trim($_POST['q']), 'w' => 3, 'e' => 60, 'r' => 89), 'btn4' => array('show' => $btn4, 'q' => trim($_POST['q']), 'w' => 4, 'e' => 90, 'r' => 119), 'btn5' => array('show' => $btn5, 'q' => trim($_POST['q']), 'w' => 5, 'e' => 120, 'r' => 149), 'btn6' => array('show' => $btn6, 'q' => trim($_POST['q']), 'w' => 6, 'e' => 150, 'r' => 179), 'btn7' => array('show' => $btn7, 'q' => trim($_POST['q']), 'w' => 7, 'e' => 180, 'r' => 199), 'btn8' => array('show' => $btn7, 'q' => trim($_POST['q']), 'w' => 8, 'e' => 210, 'r' => 199), 'btn9' => array('show' => $btn9, 'q' => trim($_POST['q']), 'w' => 9, 'e' => 240, 'r' => 199), 'btn10' => array('show' => $btn10, 'q' => trim($_POST['q']), 'w' => 10, 'e' => 270, 'r' => 199), 'sum' => $json->resultnum)));