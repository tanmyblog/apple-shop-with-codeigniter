<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm mới
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="post" action="<?php echo admin_url('products/add'); ?>" enctype="multipart/form-data">
                                    <!-- name -->
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="name" name="name" type="text" value="" placeholder="Nhập tên sản phẩm" maxlength="256"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="site_title" class="control-label col-lg-3">Tiêu đề seo</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="site_title" name="site_title" type="text" value="" placeholder="Tiêu đề seo sẽ tự động get từ tên sản phẩm" maxlength="256"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- content -->
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Nội dung</label>
                                        <div class="col-lg-9">
                                            <?php echo $this->ckeditor->editor("content",""); ?> 
                                        </div>
                                    </div>
                                    <!-- meta_key -->
                                    <div class="form-group ">
                                        <label for="meta_key" class="control-label col-lg-3">Từ khóa seo</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="meta_key" name="meta_key" type="text" value="" placeholder="Nhập từ khóa seo" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- meta_desc -->
                                    <div class="form-group ">
                                        <label for="meta_desc" class="control-label col-lg-3">Mô tả seo</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control " name="meta_desc" id="meta_desc" rows="3" placeholder="Nhập mô tả seo tối đa 256 ký tự" maxlength="256" ></textarea>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- image_link -->
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Ảnh đại diện</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <!-- image_list -->
                                    <div class="form-group ">
                                        <label for="image_list" class="control-label col-lg-3">Ảnh khác</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image_list" name="image_list[]" multiple>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- categories_id -->
                                    <div class="form-group ">
                                        <label for="categories" class="control-label col-lg-3">Danh mục sản phẩm</label>
                                        <div class="col-lg-9">
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
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- price -->
                                    <div class="form-group ">
                                        <label for="price" class="control-label col-lg-3">Giá (đ)</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="price" name="price" type="number" value="" placeholder="Nhập giá bán" min="0"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- discount -->
                                    <div class="form-group ">
                                        <label for="discount" class="control-label col-lg-3">Giá giảm</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="discount" name="discount" type="number" value="" placeholder="Nhập giá giảm" min="0" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- warranty -->
                                    <div class="form-group ">
                                        <label for="warranty" class="control-label col-lg-3">Bảo hành </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="warranty" name="warranty" type="text" value="" placeholder="Nhập thời gian bảo hành" min="0" max="100" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- quantity -->
                                    <div class="form-group ">
                                        <label for="quantity" class="control-label col-lg-3">Số lượng </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="quantity" name="quantity" type="number" value="" placeholder="Nhập số lượng" min="1" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- gifts -->
                                    <div class="form-group ">
                                        <label for="gifts" class="control-label col-lg-3">Quà tặng</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="gifts" name="gifts" type="text" value="" placeholder="Nhập quà tặng (nếu có)" min="0" max="100" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <button class="btn btn-success" type="submit">Thêm</button>
                                            <a href="<?php echo admin_url('products'); ?>" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
</div>