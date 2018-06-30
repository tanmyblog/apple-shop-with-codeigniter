<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm hỗ trợ
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
                                        <label for="name" class="control-label col-lg-3">Tên người hỗ trợ</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" placeholder="Nhập tên người hỗ trợ" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("name"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Gmail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="gmail" name="gmail" type="email" value="<?php echo set_value('gmail'); ?>" placeholder="Nhập gmail"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("gmail"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Facebook</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="facebook" name="facebook" type="text" value="<?php echo set_value('facebook'); ?>" placeholder="Nhập facebook" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("facebook"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-3">Số điện thoại</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="phone" name="phone" type="number" value="<?php echo set_value('phone'); ?>" placeholder="Nhập số điện thoại"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("phone"); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="sort_order" class="control-label col-lg-3">Thứ tự hiển thị</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="sort_order" name="sort_order" type="number" value="<?php echo set_value('sort_order'); ?>" placeholder="chọn thứ tự hiển thị"/>
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("sort_order"); ?></span>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-success" type="submit">Thêm</button>
                                            <a href="<?php echo admin_url('support'); ?>" class="btn btn-danger">Hủy</a>
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