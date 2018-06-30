<div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
    <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="<?php echo admin_url(); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Tổng quan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Quản lý admin</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo admin_url('admin'); ?>">Danh sách quản trị</a></li>
                    <li><a href="<?php echo admin_url('user'); ?>">Khách hàng</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Quản lý bán hàng</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo admin_url('transaction'); ?>">Quản lý giao dịch</a></li>
                    <li><a href="<?php echo admin_url('order'); ?>">Đơn hàng</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-th"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo admin_url('categories'); ?>">Danh mục sản phẩm</a></li>
                    <li><a href="<?php echo admin_url('products'); ?>">Sản phẩm</a></li>
                    <li><a href="#">Phản hồi</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Hỗ trợ & Liên hệ</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo admin_url('support'); ?>">Hỗ trợ</a></li>
                    <li><a href="<?php echo admin_url('contact'); ?>">Liên hệ</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-envelope"></i>
                    <span>Nội dung</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo admin_url('slide'); ?>">Slide</a></li>
                    <li><a href="<?php echo admin_url('news'); ?>">Tin tức</a></li>
                    <li><a href="<?php echo admin_url('about'); ?>">Trang thông tin</a></li>
                </ul>
            </li>
        </ul>            
    </div>
    <!-- sidebar menu end-->
</div>