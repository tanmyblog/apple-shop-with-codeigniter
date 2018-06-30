<!DOCTYPE html>
<html lang="en">
<head>
<title>Apple Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Apple Shop, Chuyên hàng apple giá rẻ, iPhone chính hãng, iPad giá rẻ, Macbook Pro Retina cao cấp" />
<meta name="decsription" content="Apple Shop, Chuyên hàng apple giá rẻ, iPhone chính hãng, iPad giá rẻ, Macbook Pro Retina cao cấp" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<script src="js/owl.carousel.js"></script>  
<!--flex slider-->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
<script>
$(document).ready(function() { 
	$(".owl-product-marquee").owlCarousel({ 
	  autoPlay: 3000, //Set AutoPlay to 3 seconds 
	  items :4,
	  itemsDesktop : [640,5],
	  itemsDesktopSmall : [480,2],
	  navigation : true
 
	}); 
}); 
</script>
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" id="sourcecode">
		$(function()
		{
			$('.scroll-pane').jScrollPane();
		});
	</script>
	<!-- //the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<!-- the mousewheel plugin --> 
	<script src="js/bootstrap.js"></script>	
</head>
<body>
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<!-- <p><a href="#">UPTO $50 OFF ON LAPTOPS | USE COUPON CODE LAPPY </a></p> -->
			</div>
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> Tài Khoản<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="login.html">Đăng nhập </a></li> 
							<li><a href="signup.html">Đăng ký</a></li> 
						</ul> 
					</li> 
					<li class="dropdown head-dpdn">
						<a href="about.php" class="dropdown-toggle"><i class="fa fa-info" aria-hidden="true"></i> About</a>
					</li> 
					<li class="dropdown head-dpdn">
						<a href="contact.php" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Contact</a>
					</li> 
					<li class="dropdown head-dpdn">
						<a href="help.php" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
					<h1><a href="index.php"><span>A</span>pple <i>Shop</i></a></h1>
					<h6>shopping online</h6> 
				</div>	
				<div class="header-search">
					<form action="#" method="post">
						<input type="search" name="Search" placeholder="Tìm sản phẩm..." required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart"> 
					<div class="cart"> 
						<form action="#" method="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="display" value="1" />
							<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>
					</div>
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->
		<div class="header-three"><!-- header-three -->
			<div class="container">
				<div class="menu">
					<div class="cd-dropdown-wrapper">
						<a class="cd-dropdown-trigger" href="#0">Danh Mục Sản Phẩm</a>
						<nav class="cd-dropdown"> 
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content"> 
								<li class="has-children">
									<a href="#">Apple</a> 
									<ul class="cd-secondary-dropdown is-hidden">
										<li class="go-back"><a href="#">Menu</a></li>
										<li class="has-children">
											<a href="#">iPhone</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">Apple</a></li>
												<li><a href="products.html">iPhone 7</a></li> 
												<li><a href="products.html">iPhone 8</a></li>
												<li><a href="products.html">iPhone X</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">iPad</a> 
											<ul class="is-hidden"> 
												<li class="go-back"><a href="#">Apple</a></li>
												<li><a href="products.html">iPad Pro</a></li> 
												<li><a href="products.html">iPad Air</a></li>
												<li><a href="products.html">iPad Mini</a></li>
											</ul>
										</li> 
										<li class="has-children">
											<a href="#">Mac</a> 
											<ul class="is-hidden"> 
											<li class="go-back"><a href="#">Apple</a></li>
												<li><a href="products.html">iMac Pro</a></li> 
												<li><a href="products.html">Macbook Pro</a></li>
												<li><a href="products.html">Macbook Air</a></li> 
											</ul>
										</li>
									</ul> <!-- .cd-secondary-dropdown --> 
								</li> <!-- .has-children -->
							</ul> <!-- .cd-dropdown-content -->
						</nav> <!-- .cd-dropdown -->
					</div> <!-- .cd-dropdown-wrapper -->	 
				</div>
				<div class="move-text">
					<div class="marquee"><a href="offers.html"> New collections are available here...... <span>Get extra 10% off on everything | no extra taxes </span> <span> Try shipping pass free for 15 days with unlimited</span></a></div>
					<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					  //@ sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>
	<!-- //header -->