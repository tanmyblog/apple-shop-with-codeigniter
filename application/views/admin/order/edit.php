<section id="main-content">
<section class="wrapper">
		<div class="agileits-w3layouts-stats">
            <div class="col-md-4 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Thông tin khách hàng</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                        <?php foreach($user->result() as $us ): ?>
                            <li><?php echo $us->user_name;?></li>
                            <li><?php echo $us->user_email;?></li>
                            <li><?php echo $us->user_phone;?></li>
                            <li>71/50 Thạnh Lộc 08 Quận 12 HCM</li>
                            <li><?php echo $us->message;?></li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 stats-info stats-last widget-shadow">
                <div class="stats-last-agile">
                    <div class="stats-title">
                        <h4 style="text-align:center; text-transform: uppercase; font-weight: blod">Thông tin giao dịch</h4>
                        <table class="table stats-table " style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>Mã GD</th>
                                    <th style="width: 40%">Hình Thức</th>
                                    <th>Số Tiền</th>
                                    <th>Ngày Tạo</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php foreach($tran->result() as $trans ): ?>
                                    <td><?php echo $trans->id; ?></td>
                                    <td><?php echo $trans->payment; ?></td>
                                    <td><?php echo number_format($trans->amount); ?>đ</td>
                                    <td><?php echo $trans->created; ?></td>
                                    <td>
                                    <?php if ($trans->status == 0) { ?>
                                        <span class="label label-warning">Chưa thanh toán</span>
                                    <?php }else if($trans->status == 1){  ?>
                                        <span class="label label-success">Đã thanh toán</span>
                                    <?php }else if($trans->status==2) {?>
                                        <span class="label label-danger">Đã hủy</span>
                                    <?php } ?>
                                    </td>
                                <?php endforeach;?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="stats-title" style="margin-top: 15px;">
                    <h4 style="text-align:center; text-transform: uppercase; font-weight: blod">Thông tin đơn hàng</h4>
                    
                        <table class="table stats-table " style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th>Mã ĐH</th>
                                    <th style="width: 40%">Sản Phẩm</th>
                                    <th>Số Tiền</th>
                                    <th>Số Lượng</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0;?>
                            <?php foreach($query->result() as $row) :?>
                                <tr>
                                    <th scope="row"><?php echo $row->id; ?></th>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo number_format($row->amount); ?>đ</td>
                                    <td><?php echo $row->qty; ?></td>
                                    <td>
                                    <?php if ($row->status == 0) { ?>
                                        <span class="label label-warning">Chờ duyệt</span>
                                    <?php }else if($row->status == 1){  ?>
                                        <span class="label label-success">Hoàn tất</span>
                                    <?php }else if($row->status==2) {?>
                                        <span class="label label-danger">Đã hủy</span>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php $total += $row->qty*$row->amount; ?>
                            <?php endforeach; ?>
                                <tr>
                                    <td>Tổng</td>
                                    <td><?php echo number_format($total); ?>đ</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 10px;">
                        <form method="post" action="<?php echo admin_url('order/edit/'.$trans->id); ?>">
                            <?php if($trans->status == 1): ?>
                                <input type="radio" name="status" value="1"> Xác nhận
                                <input type="radio" name="status" value="2"> Hủy đơn hàng
                                <button type="submit" class="btn btn-default">Cập nhật</button>
                            <?php elseif ($trans->status == 2): ?>
                                <input type="radio" name="status" value="2"> Hủy đơn hàng                
                                <button type="submit" class="btn btn-default">Cập nhật</button>
                            <?php elseif ($trans->status == 0): ?>
                                <div class="alert alert-info">Đơn hàng đang chờ xử lý giao dịch</div>
                            <?php endif; ?>
                            <a href="<?php echo admin_url('order');?>" class="btn btn-primary">Trở về</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
		</div>
        
</section>