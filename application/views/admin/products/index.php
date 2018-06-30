<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý danh sách sản phẩm
                </div>
                <div class="row w3-res-tb">
                <?php $this->load->view('admin/message', $this->data); ?>
                    <div class="col-sm-12 m-b-xs">
                        <form method="get" action="<?php echo admin_url('products');?>">
                            <select name="categories" class="input-sm form-control w-sm inline v-middle">
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($categories as $row ): ?>
                                    <?php if(count($row->subs) > 1): ?>
                                        <optgroup label="<?php echo $row->name ?>">
                                            <?php foreach($row->subs as $sub): ?>
                                            <option value="<?php echo $sub->id?>" <?php echo ($this->input->get('categories') == $sub->id ? 'selected' : '' ); ?> ><?php echo $sub->name ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                        <?php else: ?>
                                        <option value="<?php echo $row->id ?>" <?php echo ($this->input->get('categories') == $row->id ? 'selected' : '' ); ?>><?php echo $row->name?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="id" class="input-filter" placeholder="Tìm theo mã" value="<?php echo $this->input->get('id'); ?>" />
                            <input type="text" name="name" class="input-filter" placeholder="Tìm theo tên" value="<?php echo $this->input->get('name'); ?>" />
                            <button type="submit" class="btn btn-sm btn-default">Lọc</button>              
                            <a href="<?php echo admin_url('products/add'); ?>" class="btn btn-sm btn-primary">Thêm</a>
                            <a href="<?php echo admin_url('products'); ?>" class="btn btn-sm btn-primary">Danh sách</a>
                            <a url="<?php echo admin_url('products/deletemulti'); ?>" id="deleteMulti" class="btn btn-sm btn-danger">Xóa nhiều</a>
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
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Ngày tạo</th>
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
                                        <img  width="70" src="<?php echo base_url('upload/product/'.$row->image_link); ?>" alt="<?php echo $row->name; ?>">
                                    </div>
                                    <div style="float:left; margin-left: 3px">
                                        <a href="#"><span class="text-ellipsis"><b><?php echo $row->name; ?></b></span></a><br />
                                        <span class="text-ellipsis">Đã bán: <?php echo $row->buyed; ?></span>
                                        <span class="text-ellipsis">Lượt xem: <?php echo $row->view; ?></span>
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
                                <td><span class="text-ellipsis"><?php echo date("d-m-Y", strtotime($row->created)); ?></span></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?php echo admin_url('products/edit/'.$row->id); ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" onClick="return confirm('Bạn có chắc xóa <?php echo $row->name; ?> không ?');" href="<?php echo admin_url('products/delete/'.$row->id); ?>" ><i class="fa fa-trash"></i></a>
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

