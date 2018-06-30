<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý danh sách đơn hàng
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <form name="form1" method="get" action="<?php echo admin_url('order');?>">
                            <select name="orderStatus" class="input-sm form-control w-sm inline v-middle" onchange="form1.submit()">
                                <option value="">-- Chọn tác vụ --</option>
                                <option value="0" <?php if(isset($_GET['orderStatus']) && $_GET['orderStatus']=='0'){echo 'selected';}?>>Đơn hàng chờ duyệt</option>
                                <option value="1" <?php if(isset($_GET['orderStatus']) && $_GET['orderStatus']=='1'){echo 'selected';}?>>Đơn hàng thành công</option>
                                <option value="2" <?php if(isset($_GET['orderStatus']) && $_GET['orderStatus']=='2'){echo 'selected';}?>>Đơn hàng đã hủy</option>
                            </select>
                            <input type="text" name="id" class="input-filter" placeholder="Tìm theo mã" value="<?php echo $this->input->get('id'); ?>" />
                            <input type="text" name="name" class="input-filter" placeholder="Tìm theo tên" value="<?php echo $this->input->get('name'); ?>" />
                            <button type="submit" class="btn btn-sm btn-default">Lọc</button>              
                            <a href="<?php echo admin_url('order'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                            <a href="<?php echo admin_url('order/export'); ?>" class="btn btn-sm btn-success">Xuất Excel</a>
                            
                        </form>  
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>Mã số</th>
                                <th style="width: 30%">Sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Số tiền</th>
                                <th>Đơn hàng</th>
                                <th>Giao dịch</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($query->result() as $row): ?>
                            <tr>
                                <td><span class="text-ellipsis"><?php echo $row->orderId; ?></span></td>
                                <td>
                                    <div style="float:left; margin-right: 5px; height: 100%;">
                                        <img  width="70" src="<?php echo base_url('upload/product/'.$row->image); ?>" alt="<?php echo $row->name; ?>">
                                    </div>
                                    <div>
                                        <a href="#"><span class="text-ellipsis"><b><?php echo $row->name; ?></b></span></a><br />
                                    </div>
                                    
                                </td>
                                <td>
                                    <?php if($row->discount > 0): ?>
                                        <?php $price_new = $row->price - $row->discount; ?>
                                        <span style="color: red;" class="text-ellipsis"><b><?php echo number_format($price_new) ?></b></span> <br />
                                        <span style="text-decoration: line-through" class="text-ellipsis"><?php echo number_format($row->price) ?></span>
                                    <?php else: ?>
                                        <span class="text-ellipsis"><?php echo number_format($row->price) ?></span>
                                    <?php endif;?>
                                </td>
                                <td><span class="text-ellipsis"><?php echo $row->quantity; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo number_format($row->amount); ?></span></td>
                                <td><span class="text-ellipsis">
                                    <?php if($row->orderStatus == 1) echo '<span class="label label-success">Đã giao</span>'; 
                                            else if($row->orderStatus == 2) echo '<span class="label label-danger">Đã hủy</span>';
                                        else if($row->orderStatus == 0) echo '<span class="label label-warning">Chờ duyệt</span>';
                                    ?>
                                </span></td>
                                <td><span class="text-ellipsis">
                                    <?php if($row->tranStatus == 1) echo '<span class="label label-success">Đã thanh toán</span>'; 
                                            else if($row->tranStatus == 2) echo '<span class="label label-danger">Hủy giao dịch</span>';
                                        else if($row->tranStatus == 0) echo '<span class="label label-info">chưa thanh toán</span>';
                                    ?>
                                </span></td>
                                <td><span class="text-ellipsis"><?php echo date("d-m-Y", strtotime($row->created)); ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-default" href="<?php echo admin_url('order/edit/'.$row->tranID); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-2">
                            <small class="text-muted inline m-t-sm m-b-sm">Tổng số: <?php echo $total_rows; ?></small>
                        </div>
                        <div class="col-sm-10 text-right text-center-xs pagination">                
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</div>

