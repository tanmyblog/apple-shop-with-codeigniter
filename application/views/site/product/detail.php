<html>
<head>
    <title><?php echo $product->name ?></title>
    <?php
$e = array(
    'general' => true, //description
    'og' => true,
    'twitter' => true,
    'robot' => true,
);
meta_tags($e, $title = ''.$product->name, $desc = ''.$product->meta_desc, $imgurl = '', $url = '');
?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
	<meta name='keywords' content='<?php echo $product->meta_key; ?>' />
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
					<li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
					<li><?php echo $product->name; ?></li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->

				<div class="single-page">
					<div class="single-page-row" id="detail-21">
						<div class="col-md-6 single-top-left">	
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="<?php echo base_url('upload/product/'.$product->image_link);?>">
										<div class="thumb-image detail_images">
											<img src="<?php echo base_url('upload/product/'.$product->image_link);?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $product->name; ?>">
										</div>
									</li>
									<?php $image_list = json_decode($product->image_list); ?>
									<?php if(is_array($image_list)): ?>
										<?php foreach($image_list as $list):?>
											<li data-thumb="<?php echo base_url('upload/product/'.$list);?>">
												<div class="thumb-image">
													<img src="<?php echo base_url('upload/product/'.$list);?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $product->name; ?>">
												</div>
											</li>   
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
						<div class="col-md-6 single-top-right">
							<h3 class="item_name"><?php echo $product->name; ?></h3>
							<p>Thời gian vận chuyển: sản phẩm sẽ được chuyển 2-3 ngày trong khu nội thành HCM </p>
							<div class="single-rating">
								<ul>
									<li><span style="color: #999">Lượt xem: </span> <?php echo $product->view; ?></li>
									<li><span class='raty_detailt' style = 'margin:5px' id='<?php echo $product->id; ?>' data-score='<?php echo $product->raty?>'></span></li>
									<li><b class='rate_count'><?php echo $product->rate_count; ?> đánh giá</b></li>
									<br/>
									<li><span style="color: #999">Còn: </span> <?php echo $product->quantity; ?> sản phẩm</li>
									<li><span style="color: #999">Bảo hành: </span> <?php echo $product->warranty; ?></li>
									
								</ul> 
							</div>
							<div class="single-price">
								<ul>
									<?php if($product->discount > 0): ?>
									<?php $price_new = $product->price - $product->discount; ?>
										<li>$<?php echo number_format($price_new); ?></li>
										<li><del>$<?php echo number_format($product->price); ?></del></li>
									<?php else: ?>
										<li>$<?php echo number_format($product->price); ?></li>
									<?php endif; ?>
									<li><span class="w3off"><?php $percent = ($product->discount / $product->price) * 100; ?>
									<?php echo round($percent,2); ?>% OFF</span></li> 
								</ul>
							</div>
							<p class="single-price-text"><?php echo $product->meta_desc; ?></p>
							<a href="<?php echo base_url('them-vao-gio-'.$product->id);?>" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
							
						</div>
					<div class="clearfix"> </div>  
					</div>
					<div class="single-page-icons social-icons"> 
						<ul>
							<?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
							<li><h4>Chia sẽ</h4></li>
							<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?php echo $actual_link; ?>" class="fa fa-facebook icon facebook"> </a></li>
							<li><a target="_blank" href="http://twitter.com/home?status=Currentlyreading<?php echo $actual_link; ?>" class="fa fa-twitter icon twitter" > </a></li>
							<li><a target="_blank" href="#" class="fa fa-google-plus icon googleplus"> </a></li>
							<li><a target="_blank" href="#" class="fa fa-dribbble icon dribbble"> </a></li>
							<li><a target="_blank" href="#" class="fa fa-rss icon rss"> </a></li> 

						</ul>
						<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
					</div>
				</div> 
				
				<!-- collapse-tabs -->
				<div class="collpse tabs">
					<h3 class="w3ls-title">Thông tin sản phẩm</h3> 
					<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Mô Tả <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<?php echo $product->content; ?>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingFour">
								<h4 class="panel-title">
									<a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<i class="fa fa-question-circle fa-icon" aria-hidden="true"></i> Bình luận <span class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
									</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="panel-body">
									<!-- comment facebook -->
									<div id="fb-root"></div>
									<div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="5"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //collapse -->

				<!-- recommendations -->
				<div class="recommend">
					<h3 class="w3ls-title">Đề xuất của chúng tôi</h3> 
					<script>
						$(document).ready(function() { 
							$("#owl-demo5").owlCarousel({
						
							autoPlay: 3000, //Set AutoPlay to 3 seconds
						
							items :4,
							itemsDesktop : [640,5],
							itemsDesktopSmall : [414,4],
							navigation : true
						
							});
							
						}); 
					</script>
					<div id="owl-demo5" class="owl-carousel">
						<?php foreach ($related_product as $row):
							$url = convert_vi_to_en($row->site_title);
							$url = strtolower($url); ?>
						<div class="item">
							
							<div class="agile-products">
								<div class="new-tag"><h6><?php $percent = ($row->discount / $row->price) * 100; ?>
										<?php echo round($percent,2); ?>%<br>Off</h6></div>
								<a href="<?php echo base_url($url.'-p'.$row->id); ?>"><img src="<?php echo base_url('upload/product/'.$row->image_link)?>" class="img-responsive" alt="<?php echo $row->name; ?>"></a>
								<div class="agile-product-text">              
									<h5><a href="<?php echo base_url($url.'-p'.$row->id); ?>"><?php echo $row->name; ?></a></h5> 
									<h6>
										<?php if($row->discount > 0): ?>
												<?php $price_new = $row->price - $row->discount; ?>
												$<?php echo number_format($price_new); ?> &nbsp; <del>$<?php echo number_format($row->price); ?></del>
											<?php else: ?>
												$<?php echo $row->price; ?>
											<?php endif; ?>
									</h6> 
									<a href="<?php echo base_url('them-vao-gio-'.$row->id); ?>" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>                        
								</div>
							</div>
						
						</div>
						<?php endforeach; ?>
					</div>    
				</div>
				<!-- //recommendations --> 
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
	<!-- Raty -->
	<script type="text/javascript">
	$(document).ready(function() {
		//raty
		$('.raty_detailt').raty({
			score: function() {
				return $(this).attr('data-score');
			},
			half    : true,
			click: function(score, evt) {
				var rate_count = $('.rate_count');
				var rate_count_total = rate_count.text();
				$.ajax({
						url: '<?php echo site_url('product/raty'); ?>',
						type: 'POST',
						data: {'id':'<?php echo $product->id; ?>','score':score},
						dataType: 'json',
						success: function(data)
						{
							if(data.complete)
							{
								var total = parseInt(rate_count_total)+1;
								rate_count.html(parseInt(total));
							}
							alert(data.msg);	
						} 
				});
			}
		});
	});
	</script>
	<!--End Raty -->
</body>
</html>