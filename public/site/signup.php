<?php include("view/header.php"); ?>
<!-- sign up-page -->
<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Tạo tài khoản mới</h3>  
			<div class="login-body">
				<form action="#" method="post">
					<input type="text" class="user" name="name" placeholder="Nhập họ tên" required="">
					<input type="text" class="user" name="email" placeholder="Nhập email" required="">
                    <input type="password" name="password" class="lock" placeholder="Nhập mật khẩu" required="">
                    <input type="password" name="re-password" class="lock" placeholder="Nhập lại mật khẩu" required="">
                    <input type="text" name="phone" class="lock" placeholder="Nhập số điện thoại" required="">
                    <input type="text" name="address" class="lock" placeholder="Nhập địa chỉ" required="">
					<input type="submit" value="Đăng ký">
				</form>
			</div>  
			<h6>Nếu bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay »</a> </h6>  
		</div>
	</div>
    <!-- //sign up-page --> 
<?php include("view/footer.php"); ?>