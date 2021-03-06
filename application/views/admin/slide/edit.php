<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Slide
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="post" action="<?php echo admin_url('slide/edit/'.$slide->id); ?>" enctype="multipart/form-data">
                                    <!-- name -->
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Tiêu đề Slide</label>
                                        <div class="col-lg-9">
                                            <input class="form-control " id="name" name="name" type="text" value="<?php echo $slide->name; ?>" placeholder="Tiêu đề Slide" maxlength="256"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- description -->
                                    <div class="form-group ">
                                        <label for="description" class="control-label col-lg-3">Mô tả ngắn</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control " name="description" id="description" rows="3" placeholder="Mô tả ngắn 256 ký tự" maxlength="256" ><?php echo $slide->description; ?></textarea>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- image_link -->
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Ảnh đại diện</label>
                                        <div class="col-lg-9">
                                            <input type="file" id="image" name="image">
                                            <img src="<?php echo base_url('upload/slide/'. $slide->image_link); ?>" alt="" width="100" style="margin: 5px;">
                                        </div>
                                    </div>
                                    <!-- link -->
                                    <div class="form-group ">
                                        <label for="link" class="control-label col-lg-3">Liên kết </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="link" name="link" type="text" value="<?php echo $slide->link; ?>" placeholder="Liên kết" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- sort_order -->
                                    <div class="form-group ">
                                        <label for="sort_order" class="control-label col-lg-3">Thứ tự hiển thị </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="sort_order" name="sort_order" type="number" value="<?php echo $slide->sort_order; ?>" placeholder="Thứ tự hiển thị" min="0" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"></span>
                                        </div>
                                    </div>
                                    <!-- status -->
                                    <div class="form-group ">
                                        <?php if($slide->status == 1) $on = 1;
                                                else if($slide->status == 0) $off = 0; ?>
                                        <label for="sort_order" class="control-label col-lg-3">Trạng thái </label>
                                        <div class="col-lg-9">
                                            <input type="radio" name="status" value="1" <?php echo isset($on) ? 'checked' : ''; ?> /> Bật
                                            <input type="radio" name="status" value="0" <?php echo isset($off) ? 'checked' : ''; ?>> Tắt <br />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-9">
                                            <button class="btn btn-success" type="submit">Cập nhật</button>
                                            <a href="<?php echo admin_url('slide'); ?>" class="btn btn-danger">Hủy</a>
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