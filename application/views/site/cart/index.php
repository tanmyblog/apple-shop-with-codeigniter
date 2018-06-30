<html>
<head>
    <title>Giỏ hàng</title>
    <?php
$e = array(
    'general' => true, //description
    'og' => true,
    'twitter' => true,
    'robot' => true,
);
meta_tags($e, $title = 'Xem giỏ hàng nhanh tiến hành thanh toán', $desc = 'Đăng nhập tài khoản thành viên trong giỏ hàng để đặt hàng và thanh toán trực tuyến nhanh hơn, thành viên sẽ được ưu đãi tốt nhất', $imgurl = '', $url = '');
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
                    <li class="active">giỏ hàng</li>
                </ol> 
                <div class="clearfix"> </div>
                <!-- //breadcrumbs -->

                <div class="check" id="cartContent">
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif;?>
                <?php if($carts): ?>
                <div class="col-md-9 cart-items" >
                    <div id="cartBody">
                        <form action="<?php echo base_url('cart/update'); ?>" method="post" >
                            <?php $total_amount = 0 ?>
                            <?php foreach($carts as $row): ?>
                            <?php $total_amount += $row['subtotal'] ?>
                                <div class="cart-header">
                                    <div class="close1"><a href="<?php echo base_url('cart/delete/'.$row['id']);?>" class="btn btn-danger" data-id="15"><i class="fa fa-close"></i></a></div>
                                    <div class="cart-sec simpleCart_shelfItem">
                                        <div class="cart-item cyc">
                                            <img src="<?php echo base_url('upload/product/'.$row['image_link']); ?>" class="img-responsive" alt="">
                                        </div>
                                        <div class="cart-item-info">
                                            <h3> <a href="#"><?php  echo str_replace("-"," ", $row['name']); ?></a> </h3><br />
                                            <ul class="qty">
                                                <li><p>Mã sản phẩm: <?php echo $row['id']; ?></p></li>
                                                <li><p">Giá : <?php echo number_format($row['price']); ?><p></p></p"></li>
                                                <li class="qty"><input type="number" name="qty_<?php echo $row['id']; ?>" min="1" max="100" size="1" value="<?php echo $row['qty']; ?>" class="input txtQuantity"></li>
                                                <li><p id="amount_15">Tổng: <?php echo number_format($row['subtotal']); ?></p></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a href="<?php echo base_url('cart/delete'); ?>" class="btn btn-danger">Xóa giỏ hàng</a>
                            <button class="btn btn-primary">Cập nhật</button>
                        </form>
                    
                    </div>
                </div>
                <div class="col-md-3 cart-total">
                    <a class="continue" href="<?php echo base_url();?>" id="btnContinue">Tiếp tục mua hàng</a>
                    <div class="price-details">
                        <h3>Chi tiết giá</h3>
                        <p>Tổng sản phẩm: <?php echo $total_items; ?></p>
                        <p>Tạm tính <?php echo number_format($total_amount); ?> đ</p>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="total_price">
                        <li class="last_price"> <h4>Thành tiền</h4></li>
                        <li class="last_price"><span><?php echo number_format($total_amount); ?> đ</span></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="clearfix"></div>
                    <a class="order" href="<?php echo base_url("dat-hang"); ?>" id="btnCheckout">Tiến hành thanh toán</a>
                </div>
                <?php else: ?>
                <h4>Giỏ hàng không có sản phẩm, click <a href="<?php echo base_url();?>">vào đây</a> để về trang chủ</h4>
                <?php endif; ?>
                <div class="clearfix"> </div>
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