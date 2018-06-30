<!doctype html>
<html lang="en">
  <head>
    <?php $this->load->view('site/head.php'); ?>
  </head>
  <body>
    <!-- header -->
    <div class="header">  
        <?php $this->load->view('site/header.php', $this->data);?>
    </div>
    <!-- //header -->
    <!-- banner -->
    <div class="banner">
        <?php $this->load->view('site/slide.php', $this->data);?>
    </div>
	<!-- //banner -->

    <!-- content -->
    <div class="products">  

        <div class="container">

            <!-- main content -->
            <div class="col-md-9 product-w3ls-right">
                <?php $this->load->view($temp, $this->data); ?>
            </div>
            <!-- end main content -->
            
            <!-- sidebar -->
            <div class="col-md-3 rsidebar">
                <?php $this->load->view('site/sidebar.php', $this->data); ?>
            </div>
            <!-- end sidebar -->

            <div class="clearfix"> </div>
            
        </div>
    </div>
    <!--//products-->  

    <!-- footer -->
    <?php $this->load->view('site/footer.php', $this->data); ?>

  </body>
</html>