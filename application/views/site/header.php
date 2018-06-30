
<div class="w3ls-header"><!--header-one--> 
    <div class="w3ls-header-left">
        <!-- <p><a href="#">UPTO $50 OFF ON LAPTOPS | USE COUPON CODE LAPPY </a></p> -->
    </div>
    <div class="w3ls-header-right">
        <ul>
            
            <li class="dropdown head-dpdn">
            <?php if(isset($user_info)) : ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_info->name; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url("thong-tin-tai-khoan"); ?>">Thông tin tài khoản</a></li> 
                    <li><a href="<?php echo base_url("thoat"); ?>">Thoát</a></li> 
                </ul> 
                <?php else: ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url("dang-nhap"); ?>">Đăng nhập</a></li> 
                    <li><a href="<?php echo base_url("dang-ky"); ?>">Đăng ký</a></li> 
                </ul> 
            <?php endif; ?>
            </li>
            
            <li class="dropdown head-dpdn">
                <a href="<?php echo base_url("thong-tin-shop"); ?>" class="dropdown-toggle"><i class="fa fa-info" aria-hidden="true"></i> About</a>
            </li> 
            <li class="dropdown head-dpdn">
                <a href="<?php echo base_url("lien-he"); ?>" class="dropdown-toggle"><i class="fa fa-map-marker" aria-hidden="true"></i> Contact</a>
            </li> 
            <li class="dropdown head-dpdn">
                <a href="<?php echo base_url("ho-tro"); ?>" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div> 
</div>
<div class="header-two"><!-- header-two -->
    <div class="container">
        <div class="header-logo">
            <h1><a href="<?php echo base_url(); ?>"><span>A</span>pple <i>Shop</i></a></h1>
            <h6>shopping online</h6> 
        </div>	
        <div class="header-search">
            <form action="<?php echo base_url('tim-kiem'); ?>" method="get">
                <input type="search" name="search" id="txtSearch" placeholder="Tìm sản phẩm..." required="" value="<?php if(isset($key)) echo $key; else echo '';?>">
                <button type="submit" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
            </form>
        </div>
        <div class="header-cart"> 
            <div class="cart"> 
                <p><?php echo $total_items; ?> sản phẩm  </p>
                <a class="w3view-cart" href="<?php echo base_url("gio-hang"); ?>"><i style="width: 50px; height: 50px; color: red;" class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
            <div class="clearfix"> </div> 
        </div> 
        <div class="clearfix"> </div>
    </div>		
</div><!-- //header-two -->
<div class="header-three"><!-- header-three -->
    <div class="container">
        <div class="menu">
            <div class="cd-dropdown-wrapper">
                <a class="cd-dropdown-trigger" href="#0">Danh Mục Sản Phẩm</a>
                <nav class="cd-dropdown"> 
                    <a href="#0" class="cd-close">Close</a>
                    <ul class="cd-dropdown-content"> 
                        <li class="has-children">
                            <a href="#">Apple</a> 
                            <ul class="cd-secondary-dropdown is-hidden">
                                <li class="go-back"><a href="#">Menu</a></li>
                                <?php foreach($categories_list as $row):
                                    $url = convert_vi_to_en($row->site_title);
                                    $url = strtolower($url); ?>
                                <li class="has-children">
                                    <a href="<?php echo base_url($url.'-c'.$row->id); ?>"><?php echo $row->name; ?></a> 
                                    <?php if(!empty($row->subs)): ?>
                                    <ul class="is-hidden"> 
                                        <li class="go-back"><a href="#"><?php echo $row->name; ?></a></li>
                                        <?php foreach($row->subs as $sub):
                                            $url = convert_vi_to_en($sub->site_title);
                                            $url = strtolower($url); ?>
                                        <li><a href="<?php echo base_url($url.'-c'.$sub->id); ?>"><?php echo $sub->name; ?></a></li> 
                                        <?php endforeach;?>
                                    </ul>
                                    <?php endif; ?>
                                </li> 
                                <?php endforeach; ?>
                            </ul> <!-- .cd-secondary-dropdown --> 
                        </li> <!-- .has-children -->
                    </ul> <!-- .cd-dropdown-content -->
                </nav> <!-- .cd-dropdown -->
            </div> <!-- .cd-dropdown-wrapper -->	 
        </div>
        <div class="move-text">
            <div class="marquee"><a href="offers.html"> New collections are available here...... <span>Get extra 10% off on everything | no extra taxes </span> <span> Try shipping pass free for 15 days with unlimited</span></a></div>
            <script type="text/javascript" src="<?php echo public_url();?>site/js/jquery.marquee.min.js"></script>
            <script>
                $('.marquee').marquee({ pauseOnHover: true });
                //@ sourceURL=pen.js
            </script>
        </div>
    </div>
</div>
