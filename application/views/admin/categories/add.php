<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tên danh mục</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" placeholder="Nhập tên danh mục" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("name"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tiêu đề seo</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="site_title" name="site_title" type="text" value="<?php echo set_value('site_title'); ?>" placeholder="Tiêu đề seo sẽ động get từ tên danh mục"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("site_title"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Mô tả seo</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="meta_desc" name="meta_desc" type="text" value="<?php echo set_value('meta_desc'); ?>" placeholder="Nhập mô tả seo" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("meta_desc"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Từ khóa seo</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="meta_key" name="meta_key" type="text" value="<?php echo set_value(' meta_key'); ?>" placeholder="Nhập từ khóa seo"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("    meta_key"); ?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="parent_id" class="control-label col-lg-3">Danh mục cha</label>
                                        <div class="col-lg-6">
                                            <select class="form-control m-bot15"  _autocheck="true" name="parent_id" id="parent_id">
                                                <option value="0">Danh mục cha</option>
                                                <?php foreach($list as $row): ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("parent_id"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="sort_order" class="control-label col-lg-3">Thứ tự hiển   thị</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="sort_order" name="sort_order" type="number" value="<?php echo set_value('sort_order'); ?>" placeholder="chọn thứ tự hiển thị"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("sort_order"); ?></span>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-success" type="submit">Thêm</button>
                                            <a href="<?php echo admin_url('categories'); ?>" class="btn btn-danger">Hủy</a>
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