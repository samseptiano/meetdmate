<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>MeetD'Mate | About Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Heaped a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom-Stylesheet-Links -->	
<?php include('include/css.php');?>
	<script>
		$(function () {
			$("#slider1").responsiveSlides({
				auto: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>
<!-- //JavaScript -->
</head>
<body>
	<!-- Header -->
	<div class="header">
		<?php include('include/header.php');?>
      </div>
   
			<!-- //Navbar -->
	<!-- //Header -->
	<!-- banner -->
	<div class="banner">
	</div>
	<!-- //banner -->
<div class="about w3agile-1">
		<div class="container">
			<h1 class="title">About Us</h1>
			<div class="about-info">
				<div class="col-md-7 about-grids">
					<div class="about-row">
						<div class="col-md-4 about-imgs">
							<img src="images/1.jpg" alt="" class="img-responsive zoom-img"/>
						</div>
						<div class="col-md-4 about-imgs">
							<img src="images/2.jpg" alt=""  class="img-responsive zoom-img"/>
						</div>
						<div class="col-md-4 about-imgs">
							<img src="images/3.jpg" alt=""  class="img-responsive zoom-img"/>
						</div>
						<div class="clearfix"> </div>
					</div>
					<h4>Temukan Pujaan Hatimu Di Meet D'mate!</h4>
					<p>Meet D'mate adalah sebuah aplikasi kencan online yang mempertemukan pasangan dari berbagai lokasi.  Temukan belahan jiwamu tanpa batas dimanapun dan kapan pun. Memiliki persentase kecocokan dalam emosional dan spiritual berdasarkan hasil tes yang dilakukan.<br><br>  Jadi, Siap bertemu dengan pujaan Hati?</p>		
				</div>
				<div class="col-md-5 about-grids">
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>Why Choosing Us? </h4>
							<p>Meet D'mate memiliki persentase kecocokan antar pengguna berdasarkan spiritual dan emosional.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>Our Tasks</h4>
							<p>Mempertemukan pasangan dalam menjalin relasi baik pertemanan maupun mencari pasangan hidup.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="pince">
						<div class="pince-left">
							<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
						</div>
						<div class="pince-right">
							<h4>Our History</h4>
							<p>Aplikasi ini telah berdiri sejak 2017.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//about-->
	<!-- testimonials -->
	<div class="testimonials w3agile-2">
		<div class="container">
			<h4 class="title">Quotes</h4>
			<div class="testimonials-grid">
								<img src="<?php echo base_url()?>asset/landing/images/quote.png" alt=" " class="img-responsive" />
								<p>"The best and most beautiful things in this world cannot be seen or even heard, but must be felt with the heart."</p>
								<h5>Helen Keller<span></span></h5>
							</div>
		</div>
	</div>
	<!-- //testimonials -->
	<div class="footer agileits">
			<?php include('include/footer.php');?>
	</div>
</body>
</html>
