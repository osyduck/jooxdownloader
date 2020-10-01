<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Download Lagu Ori Disini Coeg">
    <meta name="author" content="Anon">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>Download Lagu Gratis</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 80px;
		}
	</style>
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
		  <a href="#" class="navbar-brand">Download Lagu</a>        </div>
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
                        <div class="panel-title">Download Lagu Gratis</div>
                    </div>    
                    <div class="panel-body">
					<form method="post" id="searchform" action="websearch.php">
						<p><label>Cari Lagu Disini</label></p>
                         <div style="margin-bottom: 20px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="text" name="q" id="q" placeholder="Locked Away" class="form-control" required="required">
                          </div>
                       <div style="margin-top:20px" class="form-group">
                             <button id="btn-login" type="submit" href="#" class="form-control btn btn-info">Cari Lagu Anda!</button>
                       </div><hr><nav><ul class="pager" id="type" style="display:none;"><li><a id="single" href="#">Single</a></li><li><a id="artis" href="#">Artis</a></li><li><a id="album" href="#">Album</a></li></ul></nav><div id="salsakp"><i>DonlodLagoe</i> adalah layanan download lagu yang disediakan secara gratis untuk anda.Kami menyediakan lagu lagu original disini dengan bit rate sangat tinggi(320kpbs) jadi anda dapat mendengarkan lagunya dengan lancar tanpa takut kualitas musiknya memburuk ketika anda mengeraskan volumenya.Ada juga kualitas <i>TV Size</i> dengan bit rate normal(100kbps) dengan ukuran file lebih kecil dan sangat cocok bagi anda yang mendengarkan musik dengan volume sedang.Situs kami juga bebas dari iklan yang membuat anda semakin nyaman ketika menggunakannya</div><nav id="pagination" class="text-center" style="display:none;">
  <ul class="pagination">
    <li id="btn1" class="active" style="visibility:hidden;"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    <li id="btn2" style="visibility:hidden;"><a href="#">2</a></li>
	<li id="btn3" style="visibility:hidden;"><a href="#">3</a></li>
	<li id="btn4" style="visibility:hidden;"><a href="#">4</a></li>
	<li id="btn5" style="visibility:hidden;"><a href="#">5</a></li>
	<li id="btn6" style="visibility:hidden;"><a href="#">6</a></li>
	<li id="btn7" style="visibility:hidden;"><a href="#">7</a></li>
	<li id="btn8" style="visibility:hidden;"><a href="#">8</a></li>
	<li id="btn9" style="visibility:hidden;"><a href="#">9</a></li>
	<li id="btn10" style="visibility:hidden;"><a href="#">10</a></li>
  </ul>
</nav>
					</form>
                        </div>                     
                    </div>  
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script>
	function newpage(t,i,a,ra,tri){
		$.ajax({
			url:tri,
			data:'q='+i+'&w='+t+'&e='+a+'&r='+ra,
			timeout:false,
			type:'POST',
			dataType:'JSON',
			success:function(hasil){
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login").html('Cari Lagu Anda!');
				$("#salsakp").html(hasil.content);
				$("#pagination").css('display', 'block');
				$("#type").css('display', 'block');
				(hasil.btn1.show) ? $("#btn1").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn1.w+'\',\''+hasil.btn1.q+'\',\''+hasil.btn1.e+'\',\''+hasil.btn1.r+'\',\''+tri+'\')') : $("#btn1").css('visibility', 'hidden');
				(hasil.btn2.show) ? $("#btn2").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn2.w+'\',\''+hasil.btn2.q+'\',\''+hasil.btn2.e+'\',\''+hasil.btn2.r+'\',\''+tri+'\')') : $("#btn2").css('visibility', 'hidden');
				(hasil.btn3.show) ? $("#btn3").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn3.w+'\',\''+hasil.btn3.q+'\',\''+hasil.btn3.e+'\',\''+hasil.btn3.r+'\',\''+tri+'\')') : $("#btn3").css('visibility', 'hidden');
				(hasil.btn4.show) ? $("#btn4").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn4.w+'\',\''+hasil.btn4.q+'\',\''+hasil.btn4.e+'\',\''+hasil.btn4.r+'\',\''+tri+'\')') : $("#btn4").css('visibility', 'hidden');
				(hasil.btn5.show) ? $("#btn5").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn5.w+'\',\''+hasil.btn5.q+'\',\''+hasil.btn5.e+'\',\''+hasil.btn5.r+'\',\''+tri+'\')') : $("#btn5").css('visibility', 'hidden');
				(hasil.btn6.show) ? $("#btn6").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn6.w+'\',\''+hasil.btn6.q+'\',\''+hasil.btn6.e+'\',\''+hasil.btn6.r+'\',\''+tri+'\')') : $("#btn6").css('visibility', 'hidden');
				(hasil.btn7.show) ? $("#btn7").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn7.w+'\',\''+hasil.btn7.q+'\',\''+hasil.btn7.e+'\',\''+hasil.btn7.r+'\',\''+tri+'\')') : $("#btn7").css('visibility', 'hidden');
				(hasil.btn8.show) ? $("#btn8").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn8.w+'\',\''+hasil.btn8.q+'\',\''+hasil.btn8.e+'\',\''+hasil.btn8.r+'\',\''+tri+'\')') : $("#btn8").css('visibility', 'hidden');
				(hasil.btn9.show) ? $("#btn9").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn9.w+'\',\''+hasil.btn9.q+'\',\''+hasil.btn9.e+'\',\''+hasil.btn9.r+'\',\''+tri+'\')') : $("#btn9").css('visibility', 'hidden');
				(hasil.btn10.show) ? $("#btn10").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn10.w+'\',\''+hasil.btn10.q+'\',\''+hasil.btn10.e+'\',\''+hasil.btn10.r+'\',\''+tri+'\')') : $("#btn10").css('visibility', 'hidden');
				(t=='1') ? $("#btn1").addClass("active") : $("#btn1").removeClass("active");
				(t=='2') ? $("#btn2").addClass("active") : $("#btn2").removeClass("active");
				(t=='3') ? $("#btn3").addClass("active") : $("#btn3").removeClass("active");
				(t=='4') ? $("#btn4").addClass("active") : $("#btn4").removeClass("active");
				(t=='5') ? $("#btn5").addClass("active") : $("#btn5").removeClass("active");
				(t=='6') ? $("#btn6").addClass("active") : $("#btn6").removeClass("active");
				(t=='7') ? $("#btn7").addClass("active") : $("#btn7").removeClass("active");
				(t=='8') ? $("#btn8").addClass("active") : $("#btn8").removeClass("active");
				(t=='9') ? $("#btn9").addClass("active") : $("#btn9").removeClass("active");
				(t=='10') ? $("#btn10").addClass("active") : $("#btn10").removeClass("active");
			},error: function (a, b, c) {
				$("button").removeAttr("disabled", "disabled");
				$("#btn-login").html('Cari Lagu Anda!');
				$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
				$("#pagination").css('display', 'none');
				$("#type").css('display', 'none');
			},beforeSend:function() {
				$("#btn-login").html('Loading..');
				$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
				$("button").attr("disabled", "disabled");
				$("#pagination").css('display', 'none');
				$("#type").css('display', 'none');
			}
		});
		return false		
	}
	$(document).keypress(function (e) {
		if (e.which == 13)
			$("form#searchform").submit();
	});
	$(document).ready(function(){
		$('#q').focus();
			$('#q').keypress(function(){
				var pdata = $('form#searchform').serialize();
				$.ajax({
					url:'search.php',
					data:pdata,
					timeout:false,
					type:'POST',
					dataType:'JSON',
					success:function(hasil){
						$("button").removeAttr("disabled", "disabled");
						$("#btn-login").html('Cari Lagu Anda!');
						$("#salsakp").html(hasil.content);
						$("#pagination").css('display', 'none');
						$("#type").css('display', 'none');
						},error: function (a, b, c) {
							$("button").removeAttr("disabled", "disabled");
							$("#btn-login").html('Cari Lagu Anda!');
							$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
							$("#pagination").css('display', 'none');
							$("#type").css('display', 'none');
						},beforeSend:function() {
							$("#btn-login").html('Loading..');
							$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
							$("button").attr("disabled", "disabled");
							$("#pagination").css('display', 'none');
							$("#type").css('display', 'none');
						}
				});
			});
		$("form#searchform").submit(function () {
			if($('#q').val().length>3){
				var pdata = 'q='+$('#q').val()+'&w=1&e=0&r=29';
				var purl = $(this).attr('action');
				$.ajax({
					url:purl,
					data:pdata,
					timeout:false,
					type:'POST',
					dataType:'JSON',
					success:function(hasil){
						$("button").removeAttr("disabled", "disabled");
						$("#btn-login").html('Cari Lagu Anda!');
						$("#salsakp").html(hasil.content);
						$("#type").css('display', 'block');
						$("#pagination").css('display', 'block');
						$("#single").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'websearch.php\')');
						$("#artis").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'artistsearch.php\')');
						$("#album").attr('onclick', 'newpage(\'1\', \''+hasil.btn1.q+'\', \'0\', \'29\', \'albumsearch.php\')');
						(hasil.btn1.show) ? $("#btn1").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn1.w+'\',\''+hasil.btn1.q+'\',\''+hasil.btn1.e+'\',\''+hasil.btn1.r+'\',\'websearch.php\')') : $("#btn1").css('visibility', 'hidden');
						(hasil.btn2.show) ? $("#btn2").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn2.w+'\',\''+hasil.btn2.q+'\',\''+hasil.btn2.e+'\',\''+hasil.btn2.r+'\',\'websearch.php\')') : $("#btn2").css('visibility', 'hidden');
						(hasil.btn3.show) ? $("#btn3").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn3.w+'\',\''+hasil.btn3.q+'\',\''+hasil.btn3.e+'\',\''+hasil.btn3.r+'\',\'websearch.php\')') : $("#btn3").css('visibility', 'hidden');
						(hasil.btn4.show) ? $("#btn4").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn4.w+'\',\''+hasil.btn4.q+'\',\''+hasil.btn4.e+'\',\''+hasil.btn4.r+'\',\'websearch.php\')') : $("#btn4").css('visibility', 'hidden');
						(hasil.btn5.show) ? $("#btn5").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn5.w+'\',\''+hasil.btn5.q+'\',\''+hasil.btn5.e+'\',\''+hasil.btn5.r+'\',\'websearch.php\')') : $("#btn5").css('visibility', 'hidden');
						(hasil.btn6.show) ? $("#btn6").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn6.w+'\',\''+hasil.btn6.q+'\',\''+hasil.btn6.e+'\',\''+hasil.btn6.r+'\',\'websearch.php\')') : $("#btn6").css('visibility', 'hidden');
						(hasil.btn7.show) ? $("#btn7").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn7.w+'\',\''+hasil.btn7.q+'\',\''+hasil.btn7.e+'\',\''+hasil.btn7.r+'\',\'websearch.php\')') : $("#btn7").css('visibility', 'hidden');
						(hasil.btn8.show) ? $("#btn8").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn8.w+'\',\''+hasil.btn8.q+'\',\''+hasil.btn8.e+'\',\''+hasil.btn8.r+'\',\'websearch.php\')') : $("#btn8").css('visibility', 'hidden');
						(hasil.btn9.show) ? $("#btn9").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn9.w+'\',\''+hasil.btn9.q+'\',\''+hasil.btn9.e+'\',\''+hasil.btn9.r+'\',\'websearch.php\')') : $("#btn9").css('visibility', 'hidden');
						(hasil.btn10.show) ? $("#btn10").css('visibility', 'visible').attr('onclick', 'newpage(\''+hasil.btn10.w+'\',\''+hasil.btn10.q+'\',\''+hasil.btn10.e+'\',\''+hasil.btn10.r+'\',\'websearch.php\')') : $("#btn10").css('visibility', 'hidden');
						$("#btn1").removeClass("active").addClass("active");
						$("#btn2").removeClass("active");
						$("#btn3").removeClass("active");
						$("#btn4").removeClass("active");
						$("#btn5").removeClass("active");
						$("#btn6").removeClass("active");
						$("#btn7").removeClass("active");
						$("#btn8").removeClass("active");
						$("#btn9").removeClass("active");
						$("#btn10").removeClass("active");
						},error: function (a, b, c) {
							$("button").removeAttr("disabled", "disabled");
							$("#btn-login").html('Cari Lagu Anda!');
							$("#salsakp").html('<div class="alert alert-warning" role="alert">'+c+'</div>');
							$("#pagination").css('display', 'none');
							$("#type").css('display', 'none');
						},beforeSend:function() {
							$("#btn-login").html('Loading..');
							$("#salsakp").html('<div class="text-center"><p><img src="assets/images/loader.gif"/></p><p class="text-muted">Tunggu sebentar</p></div>');
							$("button").attr("disabled", "disabled");
							$("#pagination").css('display', 'none');
							$("#type").css('display', 'none');
						}
				});
				}
				return false
			});
		});
	</script>
  </body>
</html>
