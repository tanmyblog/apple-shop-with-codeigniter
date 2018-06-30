<html>
<head>
    <title>Tiến hành thanh toán</title>
    <?php
$e = array(
    'general' => true, //description
    'og' => true,
    'twitter' => true,
    'robot' => false,
);
meta_tags($e, $title = 'Đặt hàng và thanh toán', $desc = 'Đăng nhập tài khoản thành viên để đặt hàng và thanh toán trực tuyến nhanh hơn, thành viên sẽ được ưu đãi tốt nhất', $imgurl = '', $url = '');
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
                    <li class="active">Đặt hàng</li>
                </ol> 
                <div class="clearfix"> </div>
                <!-- //breadcrumbs -->
            
                <div class="products-row">
                    <div class="row">
                    <div class="error_message"><h4 style="color: red; font-weight: 650"><?php echo isset($message) ? $message : ''; ?></h4></div>
                        <div class="col-sm-8">
                            <form name="NLpayBank" class="content" method="post" action="<?php echo base_url('order/checkout'); ?>" id="edit-account">
                                <div class="form-group">
                                    <label class="control-label" for="email"><span style="color: red;">*</span> Email</label>
                                    <div class="input-wrap">
                                        <input type="email" name="email" value="<?php echo isset($user->email) ? $user->email : ''; ?>" class="form-control" id="email" placeholder="Email">
                                        <div class="error_message"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="name"><span style="color: red;">*</span> Họ tên</label>
                                    <div class="input-wrap">
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo isset($user->name) ? $user->name : ''; ?>" placeholder="Họ tên">
                                        <div class="error_message"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="phone"><span style="color: red;">*</span> Số điện thoại</label>
                                    <div class="input-wrap update-phone">
                                        <input type="number" placeholder="Hãy nhập SĐT để trải nghiệm tốt hơn" value="<?php echo isset($user->phone) ? $user->phone : ''; ?>" class="form-control" name="phone" id="phone">
                                        <div class="error_message"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="address"><span style="color: red;">*</span> Địa chỉ</label>
                                    <div class="input-wrap update-phone">
                                        <textarea name="address" class="form-control" rows="2" placeholder="Nhập địa chỉ để thanh toán nhanh hơn"><?php echo isset($user->address) ? $user->address : ''; ?></textarea>
                                        <div class="error_message"><?php echo form_error('address'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label" for="message"><span style="color: red;">*</span> Ghi chú</label>
                                    <div class="input-wrap update-phone">
                                        <textarea name="message" class="form-control" rows="2" placeholder="Thêm ghi chú của bạn để chúng tôi giao hàng tốt hơn"></textarea>
                                        <div class="error_message"><?php echo form_error('message'); ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="option_payment"><span style="color: red;">*</span> Phương thức thanh toán</label>
                                    <div class="input-wrap">
                                        <select name="option_payment"  class="form-control">
                                            <option value="">-- Chọn phương thức thanh toán --</option>
                                            <option value="offline">Thanh toán khi nhận hàng</option>
                                            <option value="baokim">Thanh toán bảo kim</option>
                                            <option value="NL">Thanh toán ngân lượng</option>
                                            <option value="ATM_ONLINE">ATM Online</option>
                                            <option value="IB_ONLINE">Internet Banking Online</option>
                                            <option value="ATM_OFFLINE">ATM Offline</option>
                                            <option value="NH_OFFLINE">Ngân Hàng Offline</option>
                                            <option value="VISA">Thẻ VISA</option>
                                            <option value="CREDIT_CARD_PREPAID">CREDIT CARD</option>
                                        </select>
                                        <div class="error_message"><?php echo form_error('option_payment'); ?></div>
                                    </div>
                                </div>

                                <div class="NL box form-group">
                                    <div class="boxContent">
                                        <p>
                                        Thanh toán trực tuyến AN TOÀN và ĐƯỢC BẢO VỆ, sử dụng thẻ ngân hàng trong và ngoài nước hoặc nhiều hình thức tiện lợi khác.
                                        Được bảo hộ & cấp phép bởi NGÂN HÀNG NHÀ NƯỚC, ví điện tử duy nhất được cộng đồng ƯA THÍCH NHẤT 2 năm liên tiếp, Bộ Thông tin Truyền thông trao giải thưởng Sao Khuê
                                        <br/>Giao dịch. Đăng ký ví NgânLượng.vn miễn phí <a href="https://www.nganluong.vn/?portal=nganluong&amp;page=user_register" target="_blank">tại đây</a></p>
                                    </div>
                                </div>
                                <div class="ATM_ONLINE box form-group">
                                        <div class="boxContent">
                                            <p><i>
                                            <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>
                                                        
                                                    <ul class="cardList clearfix">
                                                    <li class="bank-online-methods ">
                                                        <label for="vcb_ck_on">
                                                            <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                            <input type="radio" value="BIDV"  name="bankcode" >
                                                        
                                                    </label></li>
                                                    <li class="bank-online-methods ">
                                                        <label for="vcb_ck_on">
                                                            <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                            <input type="radio" value="VCB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="vnbc_ck_on">
                                                            <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                            <input type="radio" value="DAB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="tcb_ck_on">
                                                            <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                            <input type="radio" value="TCB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_mb_ck_on">
                                                            <i class="MB" title="Ngân hàng Quân Đội"></i>
                                                            <input type="radio" value="MB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_vib_ck_on">
                                                            <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                                            <input type="radio" value="VIB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_vtb_ck_on">
                                                            <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                            <input type="radio" value="ICB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_exb_ck_on">
                                                            <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                                            <input type="radio" value="EXB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_acb_ck_on">
                                                            <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                            <input type="radio" value="ACB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_hdb_ck_on">
                                                            <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                                            <input type="radio" value="HDB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_msb_ck_on">
                                                            <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                                            <input type="radio" value="MSB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_nvb_ck_on">
                                                            <i class="NVB" title="Ngân hàng Nam Việt"></i>
                                                            <input type="radio" value="NVB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_vab_ck_on">
                                                            <i class="VAB" title="Ngân hàng Việt Á"></i>
                                                            <input type="radio" value="VAB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_vpb_ck_on">
                                                            <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                                            <input type="radio" value="VPB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_scb_ck_on">
                                                            <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                            <input type="radio" value="SCB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    

                                                    <li class="bank-online-methods ">
                                                        <label for="bnt_atm_pgb_ck_on">
                                                            <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                                            <input type="radio" value="PGB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="bnt_atm_gpb_ck_on">
                                                            <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                                            <input type="radio" value="GPB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="bnt_atm_agb_ck_on">
                                                            <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                            <input type="radio" value="AGB"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="bnt_atm_sgb_ck_on">
                                                            <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                                            <input type="radio" value="SGB"  name="bankcode" >
                                                        
                                                    </label></li>	
                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_bab_ck_on">
                                                            <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                                            <input type="radio" value="BAB"  name="bankcode" >
                                                        
                                                    </label></li>
                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_bab_ck_on">
                                                            <i class="TPB" title="Tền phong bank"></i>
                                                            <input type="radio" value="TPB"  name="bankcode" >
                                                        
                                                    </label></li>
                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_bab_ck_on">
                                                            <i class="NAB" title="Ngân hàng Nam Á"></i>
                                                            <input type="radio" value="NAB"  name="bankcode" >
                                                        
                                                    </label></li>
                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_bab_ck_on">
                                                            <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                                            <input type="radio" value="SHB"  name="bankcode" >
                                                        
                                                    </label></li>
                                                    <li class="bank-online-methods ">
                                                        <label for="sml_atm_bab_ck_on">
                                                            <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                                            <input type="radio" value="OJB"  name="bankcode" >
                                                        
                                                    </label></li>
                            
                                                </ul>
                                            
                                        </div>
                                </div>
                                <div class="IB_ONLINE box form-group">
                                        <div class="boxContent">
                                            <p><i>
                                                    <span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>

                                            <ul class="cardList clearfix">
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                        <input type="radio" value="BIDV"  name="bankcode" >

                                                    </label></li>
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                        <input type="radio" value="VCB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="vnbc_ck_on">
                                                        <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                        <input type="radio" value="DAB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="tcb_ck_on">
                                                        <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                        <input type="radio" value="TCB"  name="bankcode" >

                                                    </label></li>


                                            </ul>

                                        </div>
                                </div>
                                <div class="ATM_OFFLINE box form-group">
                                        <div class="boxContent">
                                            
                                            <ul class="cardList clearfix">
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                        <input type="radio" value="BIDV"  name="bankcode" >

                                                    </label></li>
                                                    
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                        <input type="radio" value="VCB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="vnbc_ck_on">
                                                        <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                        <input type="radio" value="DAB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="tcb_ck_on">
                                                        <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                        <input type="radio" value="TCB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_mb_ck_on">
                                                        <i class="MB" title="Ngân hàng Quân Đội"></i>
                                                        <input type="radio" value="MB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_vtb_ck_on">
                                                        <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                        <input type="radio" value="ICB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_acb_ck_on">
                                                        <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                        <input type="radio" value="ACB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_msb_ck_on">
                                                        <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                                        <input type="radio" value="MSB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_scb_ck_on">
                                                        <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                        <input type="radio" value="SCB"  name="bankcode" >

                                                    </label></li>
                                                <li class="bank-online-methods ">
                                                    <label for="bnt_atm_pgb_ck_on">
                                                        <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                                        <input type="radio" value="PGB"  name="bankcode" >

                                                    </label></li>
                                                
                                                <li class="bank-online-methods ">
                                                    <label for="bnt_atm_agb_ck_on">
                                                        <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                        <input type="radio" value="AGB"  name="bankcode" >

                                                    </label></li>
                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_bab_ck_on">
                                                        <i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                                        <input type="radio" value="SHB"  name="bankcode" >

                                                    </label></li>
                    
                                            </ul>

                                        </div>
                                </div>
                                <div class="NH_OFFLINE box form-group">
                                        <div class="boxContent">
                                            
                                            <ul class="cardList clearfix">
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                        <input type="radio" value="BIDV"  name="bankcode" >

                                                    </label></li>
                                                <li class="bank-online-methods ">
                                                    <label for="vcb_ck_on">
                                                        <i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                        <input type="radio" value="VCB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="vnbc_ck_on">
                                                        <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                        <input type="radio" value="DAB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="tcb_ck_on">
                                                        <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                        <input type="radio" value="TCB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_mb_ck_on">
                                                        <i class="MB" title="Ngân hàng Quân Đội"></i>
                                                        <input type="radio" value="MB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_vib_ck_on">
                                                        <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                                        <input type="radio" value="VIB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_vtb_ck_on">
                                                        <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                        <input type="radio" value="ICB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_acb_ck_on">
                                                        <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                        <input type="radio" value="ACB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_msb_ck_on">
                                                        <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                                        <input type="radio" value="MSB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_scb_ck_on">
                                                        <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                        <input type="radio" value="SCB"  name="bankcode" >

                                                    </label></li>



                                                <li class="bank-online-methods ">
                                                    <label for="bnt_atm_pgb_ck_on">
                                                        <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                                        <input type="radio" value="PGB"  name="bankcode" >

                                                    </label></li>

                                                <li class="bank-online-methods ">
                                                    <label for="bnt_atm_agb_ck_on">
                                                        <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                        <input type="radio" value="AGB"  name="bankcode" >

                                                    </label></li>
                                                <li class="bank-online-methods ">
                                                    <label for="sml_atm_bab_ck_on">
                                                        <i class="TPB" title="Tền phong bank"></i>
                                                        <input type="radio" value="TPB"  name="bankcode" >

                                                    </label></li>



                                            </ul>

                                        </div>
                                </div>
                                <div class="VISA box form-group">
                                        <div class="boxContent">
                                            <p><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>:Visa hoặc MasterCard.</p>
                                            <ul class="cardList clearfix">
                                                    <li class="bank-online-methods ">
                                                        <label for="vcb_ck_on">
                                                            Visa:
                                                            <input type="radio" value="VISA"  name="bankcode" >
                                                        
                                                    </label></li>

                                                    <li class="bank-online-methods ">
                                                        <label for="vnbc_ck_on">
                                                            Master:<input type="radio" value="MASTER"  name="bankcode" >
                                                    </label></li>
                                            </ul>	
                                        </div>
                                </div>
                                <div class="CREDIT_CARD_PREPAID box form-group">
                                    <label><input type="radio" value="CREDIT_CARD_PREPAID" name="option_payment" selected="true">Thanh toán bằng thẻ Visa hoặc MasterCard trả trước</label>
                                </div>

                                <div class="form-group">
                                    <div class="input-wrap">
                                        <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
                                        <input type="submit" class="btn btn-info" name="order" value="Đặt hàng">
                                    </div>
                                </div>
                            </form>

                            <script language="javascript">
                                $(document).ready(function(){
                                    $("select").change(function(){
                                        $(this).find("option:selected").each(function(){
                                            var optionValue = $(this).attr("value");
                                            if(optionValue){
                                                $(".box").not("." + optionValue).hide();
                                                $("." + optionValue).show();
                                            } else{
                                                $(".box").hide();
                                            }
                                        });
                                    }).change();
                                });	
                            </script> 

                        </div>
                        
                        <div class="col-sm-4">
                            <div class="price-details">
                                <h3>Hóa đơn thanh toán</h3>
                                <p>Tổng số sản phẩm <?php echo $total_items; ?></p>
                                <p>Đã có VAT</p>
                                <div class="clearfix"></div>
                            </div>
                            <ul class="total_price">
                                <li class="last_price"> <h4>Thành tiền</h4></li>
                                <li class="last_price"><span><?php echo number_format($total_amount); ?>đ</span></li>
                                <div class="clearfix"> </div>
                            </ul>
                            <div class="clearfix"></div>
                            <a class="order" href="<?php echo base_url("gio-hang"); ?>">Trở về giỏ hàng</a>
                        </div>
                    </div>
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