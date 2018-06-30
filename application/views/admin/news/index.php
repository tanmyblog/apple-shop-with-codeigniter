<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý danh sách bài viết
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <form method="get" action="<?php echo admin_url('news');?>">
                            <input type="text" name="id" class="input-filter" placeholder="Tìm theo mã" value="<?php echo $this->input->get('id'); ?>" />
                            <input type="text" name="title" class="input-filter" placeholder="Tìm theo tiêu đề" value="<?php echo $this->input->get('title'); ?>" />
                            <button type="submit" class="btn btn-sm btn-default">Lọc</button>              
                            <a href="<?php echo admin_url('news/add'); ?>" class="btn btn-sm btn-primary">Thêm</a>
                            <a href="<?php echo admin_url('news'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                            <a url="<?php echo admin_url('news/deletemulti'); ?>" id="deleteMulti" class="btn btn-sm btn-danger">Xóa nhiều</a>
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
                                <th>ID</th>
                                <th>Tin tức</th>
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
                                <td>
                                    <div style="float:left">
                                        <img  width="70" src="<?php echo base_url('upload/news/'.$row->image_link); ?>" alt="<?php echo $row->title; ?>">
                                    </div>
                                    <div style="float:left; margin-left: 3px">
                                        <a href="#"><span class="text-ellipsis"><b><?php echo $row->title; ?></b></span></a><br />
                                        <span class="text-ellipsis">Lượt xem: <?php echo $row->view_count; ?></span>
                                    </div>
                                    
                                </td>
                                <td><span class="text-ellipsis"><?php echo date("d-m-Y", strtotime($row->created)); ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url('news/edit/'.$row->id); ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" onClick="return confirm('Bạn có chắc xóa <?php echo $row->title; ?> không ?');" href="<?php echo admin_url('news/delete/'.$row->id); ?>" ><i class="fa fa-trash"></i></a>
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
                        <div class="col-sm-10 text-right text-center-xs" id="pagination-ct">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</div>

