<?php
set_time_limit(0);
ignore_user_abort(1);
if(!$_GET['id']||!is_numeric($_GET['id'])){
	header('location: index.php');
	exit;
}
if(!$_POST['w']):
	$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_album_singer?cmd=2&singerid='.trim($_GET['id']).'&sin=0&ein=29&lang=id&country=id&callback=mutiara&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = str_replace('mutiara(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	if(!$json->name){
		header('location: index.php');
		exit;
	}
	$name = base64_decode($json->name);
	?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Donlod Lagu Ori Disini Coeg">
    <meta name="author" content="Anon">
    <link rel="icon" href="assets/images/favicon.ico">
    <title><?=$name?> - Donlod Lagu Gratis</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 80px;
		}
	</style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a href="#" class="navbar-brand">DonlodLagoe</a>        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Index</a></li>
		  </ul>
		</div>
      </div>
    </nav>
    <div class="container">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title"><?=$name?> - DunludLagu Gratis</div>
                    </div>    
                    <div class="panel-body">
						<div class="text-center">
							<img class="img-circle" height="128" width="128" src="<?=$json->pic?>">
							<h2><?=$name?></h2>
						</div><hr>
						<nav>
							<ul class="pager">
								<li><a id="single" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');" href="#">Single (<?=$json->songnum?>)</a></li>
								<li><a id="album" href="#">Album (<?=$json->albumnum?>)</a></li>
							</ul>
						</nav>
						<div id="salsakp">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Song Name</th>
											<th>Album</th>
											<th>Playtime</th>
										</tr>
									</thead>
								<tbody>
							<? 
							$r = 0;$adf = count($json->songlist);
							for($i=0;$i<$adf;$i++):
								$r++;
								print '<tr><td>'.$r.'</td><td><a href="song.php?id='.base64_encode($json->songlist[$i]->songid).'">'.base64_decode($json->songlist[$i]->songname).'</a></td><td><a href="album.php?id='.$json->songlist[$i]->albumid.'">'.base64_decode($json->songlist[$i]->albumname).'</a></td><td><b>'.gmdate('i:s', $json->songlist[$i]->playtime).'</b></td></tr>';
							endfor; ?>
								</tbody>
							  </table>
							 </div>
							</div>
						<nav id="pagination" class="text-center">
						  <ul class="pagination">
						<? if($json->sum<=30): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						<? elseif($json->sum<=60): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');"><a href="#">2 </a></li>
						<? elseif($json->sum<=90): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');"><a href="#">2 </a></li>
							<li id="btn3" onclick="openpage('<?=trim($_GET['id'])?>', '60', '89', '3');"><a href="#">3 </a></li>
						<? elseif($json->sum<=120): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');"><a href="#">2 </a></li>
							<li id="btn3" onclick="openpage('<?=trim($_GET['id'])?>', '60', '89', '3');"><a href="#">3 </a></li>
							<li id="btn4" onclick="openpage('<?=trim($_GET['id'])?>', '90', '119', '4');"><a href="#">4 </a></li>
						<? elseif($json->sum<=150): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');">><a href="#">2 </a></li>
							<li id="btn3" onclick="openpage('<?=trim($_GET['id'])?>', '60', '89', '3');"><a href="#">3 </a></li>
							<li id="btn4" onclick="openpage('<?=trim($_GET['id'])?>', '90', '119', '4');"><a href="#">4 </a></li>
							<li id="btn5" onclick="openpage('<?=trim($_GET['id'])?>', '120', '149', '5');"><a href="#">5 </a></li>
						<? elseif($json->sum<=180): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');"><a href="#">2 </a></li>
							<li id="btn3" onclick="openpage('<?=trim($_GET['id'])?>', '60', '89', '3');"><a href="#">3 </a></li>
							<li id="btn4" onclick="openpage('<?=trim($_GET['id'])?>', '90', '119', '4');"><a href="#">4 </a></li>
							<li id="btn5" onclick="openpage('<?=trim($_GET['id'])?>', '120', '149', '5');"><a href="#">5 </a></li>
							<li id="btn6" onclick="openpage('<?=trim($_GET['id'])?>', '150', '179', '6');"><a href="#">6 </a></li>
						<? elseif($json->sum<=200): ?>
							<li id="btn1" class="active" onclick="openpage('<?=trim($_GET['id'])?>', '0', '29', '1');"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li id="btn2" onclick="openpage('<?=trim($_GET['id'])?>', '30', '59', '2');"><a href="#">2 </a></li>
							<li id="btn3" onclick="openpage('<?=trim($_GET['id'])?>', '60', '89', '3');"><a href="#">3 </a></li>
							<li id="btn4" onclick="openpage('<?=trim($_GET['id'])?>', '90', '119', '4');"><a href="#">4 </a></li>
							<li id="btn5" onclick="openpage('<?=trim($_GET['id'])?>', '120', '149', '5');"><a href="#">5 </a></li>
							<li id="btn6" onclick="openpage('<?=trim($_GET['id'])?>', '150', '179', '6');"><a href="#">6 </a></li>
							<li id="btn7" onclick="openpage('<?=trim($_GET['id'])?>', '180', '199', '7');"><a href="#">7 </a></li>
						<? endif; ?>
						  </ul>
						</nav>
</div>                     
                    </div>  
        </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
	function openpage(t,i,a,ra){
		$.ajax({
			url:'singer.php?id='+t,
			data:'q='+i+'&w='+a,
			timeout:false,
			type:'POST',
			dataType:'JSON',
			success:function(hasil){
				$("#salsakp").html(hasil.content);
				(ra=='1') ? $("#btn1").addClass("active") : $("#btn1").removeClass("active");
				(ra=='2') ? $("#btn2").addClass("active") : $("#btn2").removeClass("active");
				(ra=='3') ? $("#btn3").addClass("active") : $("#btn3").removeClass("active");
				(ra=='4') ? $("#btn4").addClass("active") : $("#btn4").removeClass("active");
				(ra=='5') ? $("#btn5").addClass("active") : $("#btn5").removeClass("active");
				(ra=='6') ? $("#btn6").addClass("active") : $("#btn6").removeClass("active");
				(ra=='7') ? $("#btn7").addClass("active") : $("#btn7").removeClass("active");
			},error: function (a, b, c) {
				$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
			},beforeSend:function() {
				$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
			}
		});
		return false		
	}</script>
  </body>
</html>
<?
else:
	header('Content-Type: application/json');
	$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_album_singer?cmd=2&singerid='.trim($_GET['id']).'&sin='.trim($_POST['q']).'&ein='.trim($_POST['w']).'&lang=id&country=id&callback=mutiara&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = str_replace('mutiara(', '', $json);
	$json = str_replace(')', '', $json);
	$json = json_decode($json);
	if(!$json->name)
		die(json_encode(array('result' => false, 'content' => '404')));
	$list = '<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Song Name</th>
											<th>Album</th>
											<th>Playtime</th>
										</tr>
									</thead>
								<tbody>';$asuceleng = count($json->songlist);
	for($i=0;$i<$asuceleng;$i++):
								$r++;
								$list .='<tr><td>'.$r.'</td><td><a href="song.php?id='.base64_encode($json->songlist[$i]->songid).'">'.base64_decode($json->songlist[$i]->songname).'</a></td><td><a href="album.php?id='.$json->songlist[$i]->albumid.'">'.base64_decode($json->songlist[$i]->albumname).'</a></td><td><b>'.gmdate('i:s', $json->songlist[$i]->playtime).'</b></td></tr>';
							endfor;
								$list .='</tbody>
							  </table>
							 </div>';
	print(json_encode(array('result' => true, 'content' => $list)));
endif;