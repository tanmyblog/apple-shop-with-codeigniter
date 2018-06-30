<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật bài viết mới
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="post" action="<?php echo admin_url('news/edit/'.$new->id); ?>" enctype="multipart/form-data">
                                    <!-- name -->
                                    <div class="form-group ">
                                        <label for="title" class="control-label col-lg-3">Tiêu đề bài viết</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="name" name="title" type="text" value="<?php echo $new->title; ?>" placeholder="Tiêu đề bài viết" maxlength="256"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="site_title" class="control-label col-lg-3">Tiêu đề seo</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="site_title" name="site_title" type="text" value="<?php echo $new->site_title; ?>" placeholder="tieu-de-seo" maxlength="256"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- meta_desc -->
                                    <div class="form-group ">
                                        <label for="short_desc" class="control-label col-lg-3">Mô tả ngắn</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control " name="short_desc" id="short_desc" rows="3" placeholder="Mô tả ngắn 256 ký tự" maxlength="256" ><?php echo $new->short_desc; ?></textarea>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- content -->
                                    <div class="form-group ">
                                        <label for="content" class="control-label col-lg-3">Nội dung</label>
                                        <div class="col-lg-9">
                                            <?php echo $this->ckeditor->editor("textarea name", $new->content); ?> 
                                        </div>
                                    </div>
                                    <!-- meta_key -->
                                    <div class="form-group ">
                                        <label for="meta_key" class="control-label col-lg-3">Từ khóa seo</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="meta_key" name="meta_key" type="text" value="<?php echo $new->meta_key; ?>" placeholder="Từ khóa seo" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- meta_desc -->
                                    <div class="form-group ">
                                        <label for="meta_desc" class="control-label col-lg-3">Mô tả seo</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control " name="meta_desc" id="meta_desc" rows="3" placeholder="Mô tả seo tối đa 256 ký tự" maxlength="256" ><?php echo $new->meta_desc; ?></textarea>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- image_link -->
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Ảnh đại diện</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image" name="image">
                                            <img src="<?php echo base_url('upload/news/'. $new->image_link); ?>" alt="" width="100" style="margin: 5px;">
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <button class="btn btn-success" type="submit">Cập nhật</button>
                                            <a href="<?php echo admin_url('news'); ?>" class="btn btn-danger">Hủy</a>
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