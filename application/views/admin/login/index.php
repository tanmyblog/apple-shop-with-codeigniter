<!doctype html>
<html lang="en">
  <head>
    <?php $this->load->view('admin/head');?>
  </head>
  <body>
    
    <section id="container">
        <div class="log-w3">
            <div class="w3layouts-main">
                <h2>Admin - cPanel</h2>
                    <form action="#" method="post">
                        <input type="text" class="ggg" name="username" placeholder="username" required="">
                        <input type="password" class="ggg" name="password" placeholder="password" required="">
                        
                        <div class="clearfix"></div>
                        <input type="submit" value="Login" name="login">
                    </form>
                    <?php echo form_error('login'); ?>
            </div>
        </div>
    </section>

  </body>
</html>