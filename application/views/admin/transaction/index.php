<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý danh sách các giao dịch
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <form name="form1" method="get" action="<?php echo current_url(); ?>">
                            <select name="payment" class="input-sm form-control w-sm inline v-middle" onchange="form1.submit()">
                                <option value="">Lọc theo cổng thanh toán</option>
                                <option value="offline" <?php if(isset($filter['payment']) && $filter['payment']=='offline'){echo 'selected';}?>>Thanh toán khi nhận hàng</option>
                                <option value="baokim" <?php if(isset($filter['payment']) && $filter['payment']=='baokim'){echo 'selected';}?>>Thanh toán bảo kim</option>
                                <option value="NL" <?php if(isset($filter['payment']) && $filter['payment']=='NL'){echo 'selected';}?> >Thanh toán ngân lượng</option>
                                <option value="ATM_ONLINE" <?php if(isset($filter['payment']) && $filter['payment']=='ATM_ONLINE'){echo 'selected';}?> >ATM Online</option>
                                <option value="IB_ONLINE" <?php if(isset($filter['payment']) && $filter['payment']=='IB_ONLINE'){echo 'selected';}?> >Internet Banking Online</option>
                                <option value="ATM_OFFLINE" <?php if(isset($filter['payment']) && $filter['payment']=='ATM_OFFLINE'){echo 'selected';}?> >ATM Offline</option>
                                <option value="NH_OFFLINE" <?php if(isset($filter['payment']) && $filter['payment']=='NH_OFFLINE'){echo 'selected';}?> >Ngân Hàng Offline</option>
                                <option value="VISA" <?php if(isset($filter['payment']) && $filter['payment']=='VISA'){echo 'selected';}?> >Thẻ VISA</option>
                                <option value="CREDIT_CARD_PREPAID" <?php if(isset($filter['payment']) && $filter['payment']=='CREDIT_CARD_PREPAID'){echo 'selected';}?>>CREDIT CARD</option>
                            </select>

                            <select name="status" class="input-sm form-control w-sm inline v-middle" onchange="form1.submit()">
                                <option> Lọc theo tình trạng </option>
                                <option value='0' <?php if(isset($filter['status']) && $filter['status']=='0'){echo 'selected';}?>>Đợi xử lý</option>
                                <option value='1' <?php if(isset($filter['status']) && $filter['status']=='1'){echo 'selected';}?>>Thành công</option>
                                <option value='2' <?php if(isset($filter['status']) && $filter['status']=='2'){echo 'selected';}?>>Hủy bỏ</option>
                            </select>

                            <input class="input-filter" type="text" <?php if(isset($filter['id'])){echo $filter['id'];}?> id="filter_id" placeholder="Tìm theo mã giao dịch" />

                            <button type="submit" class="btn btn-sm btn-default">Lọc</button>              
                            <a href="<?php echo admin_url('transaction'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                            <a href="<?php echo admin_url('transaction/export'); ?>" class="btn btn-sm btn-success">Xuất Excel</a>
                        </form>  
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox" id="checkAll"/><i></i>
                                    </label>
                                </th>
                                <th>Mã số</th>
                                <th>Số tiền thanh toán</th>
                                <th>Cổng thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list as $row): ?>
                            <tr class="row_<?php echo $row->id; ?>">
                                <td>
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox" class="id_checkbox" name="id[]" value="<?php echo $row->id; ?>"><i></i>
                                    </label>
                                </td>
                                <td><span class="text-ellipsis"><?php echo $row->id; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo number_format($row->amount); ?>đ</span></td>
                                <td><span class="text-ellipsis"><?php echo $row->payment; ?></span></td>
                                <td>
                                    <span class="text-ellipsis">
                                    <?php if($row->status == 0) {
                                            echo '<span class="label label-warning">Chưa thanh toán</span>';
                                        }else if($row->status==1){
                                            echo '<span class="label label-success">Đã thanh toán</span>';
                                        }else {
                                            echo '<span class="label label-danger">Đã hủy</span>';
                                        }
                                    ?>
                                    </span>
                                </td>
                                <td><?php echo date("d-m-Y", strtotime($row->created)); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="<?php echo admin_url('transaction/edit/'.$row->id); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
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
                        <div class="col-sm-10 text-right text-center-xs" id="pagination-ct">                
                      
                                <?php echo $this->pagination->create_links(); ?>
                      
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</div>

