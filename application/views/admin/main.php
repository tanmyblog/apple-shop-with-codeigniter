<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/head.php'); ?>
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <?php $this->load->view('admin/header.php'); ?>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <?php $this->load->view('admin/sidebar.php'); ?>
        </aside>
        <!--sidebar end-->

        <!-- main content -->
        <?php $this->load->view($temp,$this->data); ?>
        <!-- end main content -->
        
    </section>
    <!--main content end-->

    <!-- add compoment script -->
    <script src="<?php echo public_url(); ?>admin/js/jquery.min.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/bootstrap.js"></script>
    <!-- script navagation left -->
    <script src="<?php echo public_url(); ?>admin/js/jquery.slimscroll.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/jquery.nicescroll.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/scripts.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/admin_script.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/checkall_permissions.js"></script>

    <script src="<?php echo public_url(); ?>admin/js/speakingurl.js"></script>
    <script src="<?php echo public_url(); ?>admin/js/slugify.js"></script>

    <script src="<?php echo public_url(); ?>js/toastr-master/build/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>asset/ckfinder/ckfinder.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script>
    jQuery(function($) {
        $.slugify("Ätschi Bätschi"); // "aetschi-baetschi"
        $('#site_title').slugify('#name'); // Type as you slug

        $("#site_title").slugify("#name", {
            separator: '-' // If you want to change separator from hyphen (-) to underscore (_).
        });
    });
    </script>
</body>
</html>
