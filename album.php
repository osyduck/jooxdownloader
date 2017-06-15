<?php
set_time_limit(0);
ignore_user_abort(1);
if(!$_GET['id']||!is_numeric($_GET['id'])){
	header('location: index.php');
	exit;
}
	$ch = curl_init('http://api.joox.com/web-fcgi-bin/web_get_albuminfo?albumid='.trim($_GET['id']).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
	$json = curl_exec($ch);
	curl_close($ch);
	$json = json_decode($json);
	if(!$json->albuminfo){
		header('location: index.php');
		exit;
	}
	$name = base64_decode($json->albuminfo->creator->name);
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
	<body>
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
							<img class="img-circle" height="128" width="128" src="<?=$json->albuminfo->picUrl?>">
							<h2><?=$name?></h2>
							<p><small><i>Waktu rilis: <?=base64_decode($json->albuminfo->date)?></i></small></p>
						</div><hr>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Song Name</th>
											<th>Artis</th>
											<th>Album</th>
											<th>Playtime</th>
										</tr>
									</thead>
								<tbody>
							<? 
							$r = 0;$rf = count($json->albuminfo->songlist);
							for($i=0;$i<$rf;$i++):
								$r++;
								print '<tr><td>'.$r.'</td><td><a href="song.php?id='.base64_encode($json->albuminfo->songlist[$i]->songid).'">'.base64_decode($json->albuminfo->songlist[$i]->songname).'</a></td><td><a href="singer.php?id='.$json->albuminfo->songlist[$i]->singerid.'">'.base64_decode($json->albuminfo->songlist[$i]->singername).'</a></td><td><a href="album.php?id='.$json->albuminfo->songlist[$i]->albumid.'">'.base64_decode($json->albuminfo->songlist[$i]->albumname).'</a></td><td><b>'.gmdate('i:s', $json->albuminfo->songlist[$i]->playtime).'</b></td></tr>';
							endfor; ?>
								</tbody>
							  </table>
							 </div>
							</div>
</div>                     
                    </div>  
        </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>