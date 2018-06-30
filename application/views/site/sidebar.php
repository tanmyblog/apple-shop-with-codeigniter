<div class="rsidebar-top">

    <div class="sidebar-row">
        <h4> Danh mục</h4>
        <ul class="faq">
        <?php foreach($categories_list as $row): ?>
        <?php $url = convert_vi_to_en($row->site_title);
              $url = strtolower($url); ?>
            <li class="item<?php echo $row->id; ?>"><a href="<?php echo base_url($url.'-c'.$row->id); ?>"><?php echo $row->name; ?><span class="glyphicon glyphicon-menu-down"></span></a>
            <?php if($row->subs): ?>
                <ul>
                    <?php foreach($row->subs as $sub):?>
                    <?php $url = convert_vi_to_en($sub->site_title);
                          $url = strtolower($url); ?>
                    <li class="subitem<?php echo $sub->id; ?>"><a href="<?php echo base_url($url.'-c'.$sub->id); ?>"><?php echo $sub->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
        <!-- script for tabs -->
        <script type="text/javascript">
            $(function() {
                var menu_ul = $('.faq > li > ul'),
                        menu_a  = $('.faq > li > a');
                menu_ul.hide();
                menu_a.click(function(e) {
                    e.preventDefault();
                    if(!$(this).hasClass('active')) {
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true,true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true,true).slideUp('normal');
                    }
                });
            });
        </script>
        <!-- script for tabs -->
    </div>         
</div>
<div class="news-row">
    <h4>Hỗ trợ trực tuyến</h4>
    <div style="padding: 0 3px; ">
        <?php foreach ($support as $sp): ?>
        <ul>
            <li><span class="glyphicon glyphicon-user"></span> <?= $sp->name; ?></li>
            <li><span class="glyphicon glyphicon-thumbs-up"></span> fb/<?= $sp->facebook; ?></li>
            <li><span class="glyphicon glyphicon-envelope"></span> <?= $sp->gmail; ?></li>
            <li><span class="glyphicon glyphicon-phone"></span> <?= $sp->phone; ?></li>
        </ul>
        <?php endforeach; ?>
    </div>
</div>
<div class="news-row">
    <h4>News</h4>
    <ul>
        <?php foreach($news_list as $row): ?>
            <li>
                <div class="item-thumbnail-only">
                    <div class="item-thumbnail">
                        <a href="#" target="_blank">
                            <img alt="<?php echo $row->title; ?>" src="<?php echo base_url('upload/news/'.$row->image_link);?>" title="<?php echo $row->title; ?>" width="100%" height="auto">
                        </a>
                    </div>
                    <div class="item-title">
                        <a href="#" title="<?php echo $row->title; ?>"><?php echo $row->title; ?></a>
                    </div>
                </div>
                <div class="clear"></div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>