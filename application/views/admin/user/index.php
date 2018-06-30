<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý khách hàng
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-5 m-b-xs">
                        <!-- <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Bulk action</option>
                            <option value="1">Delete selected</option>
                            <option value="2">Bulk edit</option>
                            <option value="3">Export</option>
                        </select> -->
                        <!-- <button class="btn btn-sm btn-default">Apply</button>                 -->
                        <a href="<?php echo admin_url('user/add'); ?>" class="btn btn-sm btn-primary">Thêm</a>
                        <a href="<?php echo admin_url('user'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-3">
                        <form action="<?php echo admin_url('user'); ?>" method="get">
                        <div class="input-group">
                            
                            <input type="text" name="id" class="input-sm form-control" placeholder="Search" />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-primary" type="button">Tìm</button>
                            </span>
                            
                        </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ & Tên</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($list as $row): ?>
                            <tr>
                                <td><span class="text-ellipsis"><?php echo $row->id; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->name; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->address; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->email; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->phone; ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url('user/edit/'.$row->id); ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" onClick="return confirm('Bạn có chắc xóa <?php echo $row->name; ?> không ?');" href="<?php echo admin_url('user/delete/'.$row->id); ?>" ><i class="fa fa-trash"></i></a>
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
                        <div class="col-sm-10 text-right text-center-xs">                
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</div>

