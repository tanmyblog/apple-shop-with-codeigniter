<section id="main-content">
<section class="wrapper">
		<!-- //market-->
		<?php if(isset($message)) { ?>
		<div class="alert alert-danger" style="font-weight: 700; color: red;">
			<?php echo $message; ?>
		</div>
		<?php } ?>
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-eye"> </i>
                    </div>
                    <div class="col-md-8 market-update-left">
                    <?php foreach ($view->result() as $v): ?>
                        <h4>Lượt xem</h4>
                        <h3><?php echo $v->viewCount; ?></h3>
                        <p>Other hand, we denounce</p>
                    <?php endforeach; ?>
                    </div>
				    <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php foreach($user->result() as $u): ?>
						<h4>Khách hàng</h4>
						<h3><?php echo $u->userCount; ?></h3>
						<p>Other hand, we denounce</p>
					<?php endforeach; ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php foreach($order->result() as $o): ?>
						<h4>Đơn hàng</h4>
						<h3><?php echo $o->orderCount; ?></h3>
						<p>Other hand, we denounce</p>
					<?php endforeach; ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php foreach ($tran->result() as $t): ?>
						<h4>Giao dịch</h4>
						<h3><?php echo $t->tranCount; ?></h3>
						<p>Other hand, we denounce</p>
					<?php endforeach; ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
	
</section>