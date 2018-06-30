<html>
<head>
    <title>Thanh toán thành công</title>
    <?php
$e = array(
    'general' => true, //description
    'og' => true,
    'twitter' => true,
    'robot' => false,
);
meta_tags($e, $title = 'Thanh toán thành công', $desc = 'Bạn đã thanh toán thành công đơn hàng chúng tôi sẽ liên hệ bạn sớm nhất', $imgurl = '', $url = '');
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

	<!-- content -->
    <div class="products">  

        <div class="container">

            <!-- main content -->
            <div class="col-md-9 product-w3ls-right">
                <!-- breadcrumbs --> 
                <ol class="breadcrumb breadcrumb1">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Thanh toán đơn hàng thành công</li>
                </ol> 
                <div class="clearfix"> </div>
                <!-- //breadcrumbs -->
                
                <div class="products-row">
					<div class="alert alert-success">
						<h3>Thanh toán trực tuyến thành công thành công! chúng tôi sẽ liên hệ bạn sớm nhất</h3>
					</div>
					<h4>Nhấn vào đây để về <a href="<?= base_url(); ?>">Trang chủ</a></h4>
                </div>
            </div>
            <!-- end main content -->
            
            <!-- sidebar -->
            <div class="col-md-3 rsidebar">
                <?php $this->load->view('site/sidebar.php', $this->data); ?>
            </div>
            <!-- end sidebar -->

            <div class="clearfix"> </div>
            
        </div>
    </div>
    <!--//products-->  




<?php $this->load->view('site/footer.php', $this->data);?>

</body>
</html>
