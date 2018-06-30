<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
    <!-- Wrapper-for-Slides -->
    <div class="carousel-inner" role="listbox">  
        <?php $i=1; ?>
        <?php foreach($slide_list as $row): ?>
        <div class="item <?php echo ($i == $total_slide) ? 'active' : $i++ ?>">
            <img src="<?php echo base_url('upload/slide/'.$row->image_link); ?>" alt="<?php echo $row->name; ?>" class="img-responsive" width="100%" />
            <div class="carousel-caption kb_caption kb_caption_right">
                <a href="<?php echo $row->link;?>"><h3 data-animation="animated fadeInDown"><?php echo $row->name; ?></h3></a>
                <h4 data-animation="animated fadeInUp"><?php echo $row->description; ?></h4>
            </div>
        </div> 
        <?php endforeach;?> 
    </div> 
    <!-- Left-Button -->
    <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
        <span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a> 
    <!-- Right-Button -->
    <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
        <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> 
</div>
<script src="<?php echo public_url(); ?>site/js/custom.js"></script>