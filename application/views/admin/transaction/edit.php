<section id="main-content">
<section class="wrapper">
		<div class="agileits-w3layouts-stats">
            <div class="col-md-5 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Thông tin khách hàng</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">

                            <li><b>Họ tên:</b> <?php echo $transaction->user_name; ?></li>
                            <li><b>Email:</b> <?php echo $transaction->user_email; ?></li>
                            <li><b>SĐT:</b> <?php echo $transaction->user_phone; ?></li>
                            <li><b>Địa chỉ:</b> <?php echo $transaction->user_address; ?></li>
                            <li><b>Ghi chú:</b> <?php echo $transaction->message; ?></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Thông tin giao dịch</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                  
                            <li><b>Mã giao dịch: </b><?php echo $transaction->id; ?></li>
                            <li><b>Hình thức: </b><?php echo $transaction->payment; ?></li>
                            <li><b>Số tiền: </b><?php echo number_format($transaction->amount); ?> đ</li>
                            <li><b>Ngày tạo: </b><?php echo date("d-m-Y", strtotime($transaction->created)); ?></li>
                            <li><b>Trạng thái: </b>
                                <?php if($transaction->status == 0)
                                    echo '<span class="label label-warning">Chưa thanh toán</span>';
                                    else if($transaction->status==1)
                                    echo '<span class="label label-success">Đã thanh toán</span>';
                                    else
                                    echo '<span class="label label-danger">Đã hủy</span>';
                                ?>
                            </li>
                      
                        </ul>
                    </div>
                    <form method="post" action="<?php echo admin_url('transaction/edit/'.$transaction->id); ?>">
                        <input type="radio" name="status" value="1"> Xác nhận
                        <input type="radio" name="status" value="2"> Hủy giao dịch
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                        <a href="<?php echo admin_url('transaction');?>" class="btn btn-default">Trở về</a>
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
		</div>
        
</section>