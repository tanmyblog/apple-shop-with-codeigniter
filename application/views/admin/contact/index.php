<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách liên hệ từ khách hàng
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <a href="<?php echo admin_url('contact'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                        <a url="<?php echo admin_url('contact/deletemulti'); ?>" id="deleteMulti" class="btn btn-sm btn-danger">Xóa nhiều</a>
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
                                <th>ID</th>
                                <th style="width: 15%">Họ Tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Nội Dung</th>
                                <th style="width: 15%">Ngày Tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($contacts as $row): ?>
                            <tr class="row_<?php echo $row->id; ?>">
                                <td>
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox" class="id_checkbox" name="id[]" value="<?php echo $row->id; ?>"><i></i>
                                    </label>
                                </td>
                                <td><span class="text-ellipsis"><?php echo $row->id; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->name; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->email; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->phone; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->content; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo date("d-m-Y", strtotime($row->created)); ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-danger" onClick="return confirm('Bạn có chắc xóa liên hệ của khách hàng <?php echo $row->name; ?> không ?');" href="<?php echo admin_url('contact/delete/'.$row->id); ?>" ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-2">
                            <small class="text-muted inline m-t-sm m-b-sm">Tổng số: <?php echo $total_rows;; ?></small>
                        </div>
                        <div class="col-sm-10 text-right text-center-xs">                
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</div>

