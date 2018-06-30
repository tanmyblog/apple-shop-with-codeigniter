<!-- footer-top -->
<div class="w3agile-ftr-top">
	<div class="container">
		<div class="ftr-toprow">
			<div class="col-md-4 ftr-top-grids">
				<div class="ftr-top-left">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div> 
				<div class="ftr-top-right">
					<h4>Giao Hàng Miễn Phí</h4>
					<p>Dịch vụ giao hàng miễn phí trên toàn quốc</p>
				</div> 
				<div class="clearfix"> </div>
			</div> 
			<div class="col-md-4 ftr-top-grids">
				<div class="ftr-top-left">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div> 
				<div class="ftr-top-right">
					<h4>Chăm Sóc Khách hàng</h4>
					<p>Phục vụ 24/24 thỏa mãn mọi nhu cầu của khách hàng</p>
				</div> 
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 ftr-top-grids">
				<div class="ftr-top-left">
					<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
				</div> 
				<div class="ftr-top-right">
					<h4>Chất Lượng Tốt</h4>
					<p>Chúng tôi cam kết sản phẩm tốt sứng đáng với giá tiền</p>
				</div>
				<div class="clearfix"> </div>
			</div> 
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //footer-top --> 
<!-- subscribe -->
<div class="subscribe"> 
	<div class="container">
		<div class="col-md-6 social-icons w3-agile-icons">
			<h4>Kết Nối Với Chúng Tôi</h4>  
			<ul>
				<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
				<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
				<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
				<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
				<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
			</ul> 
			<ul class="apps"> 
				<li><h4>Sẵn sàng chào đón quý khách</h4> </li>
				<!-- <li><a href="#" class="fa fa-apple"></a></li>
				<li><a href="#" class="fa fa-windows"></a></li>
				<li><a href="#" class="fa fa-android"></a></li> -->
			</ul> 
		</div> 
		<div class="col-md-6 subscribe-right">
			<h4>Đăng Ký Nhận Tin</h4>  
			<form action="#" method="post"> 
				<input type="text" name="email" placeholder="Nhập Email Của Bạn..." required="">
				<input type="submit" value="Đăng Ký">
			</form>
			<div class="clearfix"> </div> 
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //subscribe --> 
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="footer-info w3-agileits-info">
			<div class="col-md-4 address-left agileinfo">
				<div class="footer-logo header-logo">
					<h2><a href="index.html"><span>A</span>pple <i>Shop</i></a></h2>
					<h6>shopping online</h6>
				</div>
				<ul>
					<li><i class="fa fa-map-marker"></i> 71/50 TL 08 P.Thạnh Lộc Quận 12</li>
					<li><i class="fa fa-mobile"></i> 0964 082 598 </li>
					<li><i class="fa fa-phone"></i> +84 964 082 598 </li>
					<li><i class="fa fa-envelope-o"></i> <a href="mailto:kd.aigapa@mail.com"> kd.aigapa@mail.com</a></li>
				</ul> 
			</div>
			<div class="col-md-8 address-right">
				<div class="col-md-4 footer-grids">
					<h3>CÔNG TY</h3>
					<ul>
						<li><a href="about.html">Thông Tin</a></li> 
						<li><a href="privacy.html">Chính sách bảo mật</a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-grids">
					<h3>DỊCH VỤ</h3>
					<ul>
						<li><a href="contact.html">Liên hệ</a></li>
						<li><a href="login.html">Trở về</a></li> 
						<li><a href="faq.html">Câu hỏi</a></li>
						<li><a href="sitemap.html">Bản đồ</a></li>
						<li><a href="login.html">Tình trạng đơn hàng</a></li>
					</ul> 
				</div>
				<div class="col-md-4 footer-grids">
					<h3>PƯƠNG THỨC THANH TOÁN</h3>
					<ul>
						<li><i class="fa fa-laptop" aria-hidden="true"></i> Net Banking</li>
						<li><i class="fa fa-money" aria-hidden="true"></i> Tiền mặt khi nhận hàng</li>
						<li><i class="fa fa-pie-chart" aria-hidden="true"></i>Ngân lượng</li>
						<li><i class="fa fa-gift" aria-hidden="true"></i> Bảo kim</li>
						<li><i class="fa fa-credit-card" aria-hidden="true"></i> Thẻ tín dụng</li>
					</ul>  
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //footer -->		
<div class="copy-right"> 
	<div class="container">
		<p>© 2018 Apple Shop . All rights reserved | Design by <a href="https://hotanmy.blogspot.com">Hồ Tấn Mỹ</a></p>
	</div>
</div> 
<!-- cart-js -->
<script src="<?php echo public_url(); ?>site/js/minicart.js"></script>
<script>
w3ls.render();
w3ls.cart.on('w3sb_checkout', function (evt) {
	var items, len, i;

	if (this.subtotal() > 0) {
		items = this.items();

		for (i = 0, len = items.length; i < len; i++) {
			items[i].set('shipping', 0);
			items[i].set('shipping2', 0);
		}
	}
});
</script>  
<!-- //cart-js -->	
<!-- countdown.js -->	
<script src="<?php echo public_url(); ?>site/js/jquery.knob.js"></script>
<script src="<?php echo public_url(); ?>site/js/jquery.throttle.js"></script>
<script src="<?php echo public_url(); ?>site/js/jquery.classycountdown.js"></script>
<script>
	$(document).ready(function() {
		$('#countdown1').ClassyCountdown({
			end: '1388268325',
			now: '1387999995',
			labels: true,
			style: {
				element: "",
				textResponsive: .5,
				days: {
					gauge: {
						thickness: .10,
						bgColor: "rgba(0,0,0,0)",
						fgColor: "#1abc9c",
						lineCap: 'round'
					},
					textCSS: 'font-weight:300; color:#fff;'
				},
				hours: {
					gauge: {
						thickness: .10,
						bgColor: "rgba(0,0,0,0)",
						fgColor: "#05BEF6",
						lineCap: 'round'
					},
					textCSS: ' font-weight:300; color:#fff;'
				},
				minutes: {
					gauge: {
						thickness: .10,
						bgColor: "rgba(0,0,0,0)",
						fgColor: "#8e44ad",
						lineCap: 'round'
					},
					textCSS: ' font-weight:300; color:#fff;'
				},
				seconds: {
					gauge: {
						thickness: .10,
						bgColor: "rgba(0,0,0,0)",
						fgColor: "#f39c12",
						lineCap: 'round'
					},
					textCSS: ' font-weight:300; color:#fff;'
				}

			},
			onEndCallback: function() {
				console.log("Time out!");
			}
		});
	});
</script>
<script>
	$(document).ready(function() { 
		$(".owl-demo").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items :4,
		itemsDesktop : [640,5],
		itemsDesktopSmall : [414,4],
		navigation : true
		});
	}); 
</script>
<!-- //countdown.js -->
<!-- menu js aim -->
<script src="<?php echo public_url(); ?>site/js/jquery.menu-aim.js"> </script>
<script src="<?php echo public_url(); ?>site/js/main.js"></script> 
<script src="<?php echo public_url(); ?>site/js/addtocart.js"></script> 
<script src="<?php echo public_url(); ?>js/jquery-ui/jquery-ui.min.js"></script> 
<script src="<?php echo public_url(); ?>js/raty/jquery.raty.min.js"></script> 
<script>
	$(function() {
		$( "#txtSearch" ).autocomplete({
			source: "<?php echo site_url('product/search/1'); ?>",
		});
	});

// cmt fb
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=1084099951729998&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

// login fb
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1084099951729998',
			cookie     : true,
			xfbml      : true,
			version    : 'v3.0'
		});

		FB.AppEvents.logPageView();   

	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=2511969772360672&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

</script>