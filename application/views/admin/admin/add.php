
<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm quản trị viên
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
                                        <label for="name" class="control-label col-lg-3">Họ & Tên</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("name"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Tài khoản</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>" />
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("username"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Mật khẩu</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="password" name="password" type="password">
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("password"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="re_password" class="control-label col-lg-3">Nhập lại mật khẩu</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="re_password" name="re_password" type="password">
                                            
                                            <span style="color: red; font-weight: 400; font-size: 14px;"><?php echo form_error("re_password"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="re_password" class="control-label col-lg-3">Quyền</label>
                                        <div class="col-lg-6">
                                            Check All
                                            <input type="checkbox" name="" id="select_all">
                                            <br />
                                            <?php foreach($config_permissions as $controller => $actions): ?>
                                                <b><?= $controller ?>:</b>
                                                <?php foreach ($actions as $action):?>
                                                    <input type="checkbox" class="check_permissions" name="permissions[<?php echo $controller; ?>][]" value="<?= $action; ?>"/> <?= $action; ?>
                                                <?php endforeach; ?>
                                                <br/>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-success" type="submit">Thêm</button>
                                            <a href="<?php echo admin_url('admin/index'); ?>" class="btn btn-danger">Hủy</a>
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