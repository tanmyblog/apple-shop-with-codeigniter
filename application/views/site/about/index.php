<html>
<head>
    <title>Apple Shop - Trang thông tin </title>
    <?php
        $e = array(
            'general' => true, //description
            'og' => true,
            'twitter' => true,
            'robot' => true,
        );
        meta_tags($e, $title = 'Trang thông tin', $desc = 'Apple Shop chuyên cung cấp các loại sản phẩm Apple chính hãng, xách tay giá rẻ nhất thị trường Việt Nam', $imgurl = '', $url = '');
    ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="<?php echo public_url(); ?>site/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->
    <link href="<?php echo public_url(); ?>site/css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider -->
    <link href="<?php echo public_url(); ?>site/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo public_url(); ?>site/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/nganluong.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>site/css/contact.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo public_url(); ?>js/jquery-ui/jquery-ui.min.css" type="text/css" media="screen" />

    <!-- font-awesome icons -->
    <link href="<?php echo public_url(); ?>site/css/font-awesome.css" rel="stylesheet">

    <!-- js -->
    <script src="<?php echo public_url(); ?>site/js/jquery-2.2.3.min.js"></script>

    <!-- web-fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
    <!-- web-fonts -->
    <script src="<?php echo public_url(); ?>site/js/owl.carousel.js"></script>
    <!--flex slider-->
    <script defer src="<?php echo public_url(); ?>site/js/jquery.flexslider.js"></script>

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
    <script src="<?php echo public_url(); ?>site/js/imagezoom.js"></script>
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
    <script src="<?php echo public_url(); ?>site/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
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
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/easing.js"></script>
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
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- //the jScrollPane script -->
    <script type="text/javascript" src="<?php echo public_url(); ?>site/js/jquery.mousewheel.js"></script>
    <!-- the mousewheel plugin -->
    <script src="<?php echo public_url(); ?>site/js/bootstrap.js"></script>
    <script type="text/javascript">
    $(function() {
        $.fn.raty.defaults.path = "<?php echo public_url('js/raty/img'); ?>";
        $('.raty').raty({
            score: function() {
            return $(this).attr('data-score');
            },
            readOnly  : true,
        });
    });
    </script>
    <style>.raty img{width:16px !important;height:16px; !important;}</style>

</head>
<body>
    <!-- header -->
    <div class="header">  
        <?php $this->load->view('site/header.php', $this->data);?>
    </div>
    <!-- //header -->

    <!--  about-page -->
	<div class="about">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">About Apple Shop</h3>
			<div class="about-text">	
				<p>Apple Shop là một hệ thống website bán hàng và thanh toán trực tuyến với phiên bản đầu tiền được phát hành vào tháng 6, năm 2018. Website chuyên cung cấp các loại sản phẩm của Apple chính hãng cao cấp giá rẻ, các sản phẩm xách tay đến từ thị trường Mỹ... Chúng tôi có chế độ bảo hành tốt đối với tất cả các sản phẩm, chăm sóc khách hàng là nhiệm vụ hàng đầu của các nhân viên bán hàng. Tính đến thời điểm hiện tại hệ thống website của chúng tôi có đến: </p> 
				<div class="col-md-3 ftr-top-left about-text-grids">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i>
					<h4><?php foreach ($view->result() as $v){ echo $v->viewPro; } ?> <br>Products</h4>
				</div>
				<div class="col-md-3 ftr-top-left about-text-grids">
					<i class="fa fa-users" aria-hidden="true"></i>
					<h4><?php foreach($user->result() as $u) { echo $u->userCount; } ?> <br> Users </h4>
				</div>
				<div class="col-md-3 ftr-top-left about-text-grids">
					<i class="fa fa-credit-card" aria-hidden="true"></i>
					<h4><?php foreach ($tran->result() as $t) {echo $t->tranCount;} ?> <br>Transactions</h4>
				</div>
				<div class="col-md-3 ftr-top-left about-text-grids">
					<i class="fa fa-globe" aria-hidden="true"></i>
					<h4>1<br>Cities</h4>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="history">
				<h3 class="w3ls-title">Tác giả</h3>
				<p>Apple Shop được phát triển bởi <a href='https://hotanmy.blogspot.com'>Hồ Tấn Mỹ</a> sinh viên Trường Đại Học Công Nghệ TP.HCM với phiên bản đầu tiên được phát hành vào đầu tháng 6 năm 2018. Hệ thống website có đầy đủ các chức năng cơ bản của một website bán hàng, tích hợp chức năng thanh toán trực tuyến để hỗ trợ thanh toán và đặt hàng nhanh. Ngoài ra, hệ thống website còn được tối ưu hóa SEO giúp trang web trở nên thân thiện với bộ máy tìm kiếm của Google.</p> 
			</div>
		</div>
	</div>
	<!-- //about-page --> 
    <!-- footer -->
    <?php $this->load->view('site/footer.php', $this->data); ?>

</body>
</html>