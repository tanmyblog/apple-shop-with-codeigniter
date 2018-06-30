<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách slide
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <a href="<?php echo admin_url('slide/add'); ?>" class="btn btn-sm btn-primary">Thêm</a>
                        <a href="<?php echo admin_url('slide'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                        <a url="<?php echo admin_url('slide/deletemulti'); ?>" id="deleteMulti" class="btn btn-sm btn-danger">Xóa nhiều</a>
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
                                <th>Slide</th>
                                <th>Mô tả</th>
                                <th>Liên kết</th>
                                <th></th>
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
                                        <img  width="200" src="<?php echo base_url('upload/slide/'.$row->image_link); ?>" alt="<?php echo $row->name; ?>">
                                    </div>
                                    <div style="float:left; margin-left: 3px">
                                        <a href="#"><span class="text-ellipsis"><b><?php echo $row->name; ?></b></span></a><br />
                                        <span class="text-ellipsis">Thứ tự: <?php echo $row->sort_order; ?></span>
                                    </div>
                                    
                                </td>
                                <td><span class="text-ellipsis"><?php echo $row->description; ?></span></td>
                                <td><span class="text-ellipsis"><?php echo $row->link; ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url('slide/edit/'.$row->id); ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" onClick="return confirm('Bạn có chắc xóa slide <?php echo $row->name; ?> không ?');" href="<?php echo admin_url('slide/delete/'.$row->id); ?>" ><i class="fa fa-trash"></i></a>
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

