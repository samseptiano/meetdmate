<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Meet D'Mate | Homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Heaped a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom-Stylesheet-Links -->	
	<?php include('include/css.php'); ?>

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
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<script src="<?php echo base_url();?>asset/landing/js/wow.min.js"></script>

</head>
<body>
	<!-- Header -->
	<div class="header">
	<?php include('include/header.php'); ?>
      </div>
   
			<!-- //Navbar -->
		<!-- Slider -->
		<div class="slider">
			<ul class="rslides" id="slider1">
				<li>
					<img src="<?php echo base_url();?>asset/landing/images/slide-1.jpg" alt="Wanderer">
					
					<div class="caption">
						<h3>Find Your Mate Emotionally And Spiritually</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url();?>asset/landing/images/slide-2.jpg" alt="Wanderer">
					<div class="caption">
						<h3>Find Your Mate Emotionally And Spiritually</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url();?>asset/landing/images/slide-1.jpg" alt="Wanderer">
					<div class="caption">
						<h3>Find Your Mate Emotionally And Spiritually</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url();?>asset/landing/images/slide-2.jpg" alt="Wanderer">
				
					<div class="caption">
						<h3>Find Your Mate Emotionally And Spiritually</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url();?>asset/landing/images/slide-1.jpg" alt="Wanderer">
					<div class="caption">
						<h3>Find Your Mate Emotionally And Spiritually</h3>
					</div>
				</li>
			</ul>
		</div>
		<!-- //Slider -->

	<!-- //Header -->
	<!-- Services -->
	
	<div class="footer agileits">
		<?php include('include/footer.php');?>
	</div>
	
</body>
</html>