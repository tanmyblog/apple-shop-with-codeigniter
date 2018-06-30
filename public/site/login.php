<?php include("view/header.php"); ?>    
<!-- login-page -->
<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Đăng nhập với tài khoản của bạn</h3>  
			<div class="login-body">
				<form action="#" method="post">
					<input type="text" class="user" name="email" placeholder="Nhập email" required="">
					<input type="password" name="password" class="lock" placeholder="Mật khẩu" required="">
					<input type="submit" value="Đăng nhập">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nhớ</label>
						<div class="forgot">
							<a href="#">Quên mật khẩu?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6> Chưa có tài khoản? <a href="signup.php">Đăng ký ngay »</a> </h6> 
			<div class="login-page-bottom social-icons">
				<h5>Đăng nhập bằng mạng xã hội</h5>
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
				</ul> 
			</div>
		</div>
	</div>
    <!-- //login-page --> 
<?php include("view/footer.php"); ?>    