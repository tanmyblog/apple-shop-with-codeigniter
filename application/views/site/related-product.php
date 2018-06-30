<div class="owl-carousel owl-demo">
    <?php foreach($products_list as $row): ?>
        <div class="item">
            <div class="glry-w3agile-grids agileits">
                <div class="new-tag"><h6>20% <br> Off</h6></div>
                <a href="<?php echo base_url('product/detail/'.$row->id); ?>"><img src="<?php echo base_url('upload/product/'.$row->image_link);?>" alt="<?php echo $row->name; ?>"></a>
                <div class="view-caption agileits-w3layouts">           
                    <h4><a href="#"><?php echo $row->name; ?></a></h4>
                    <h5>
                        <?php if($row->discount > 0): ?>
                            <?php $price_new = $row->price - $row->discount; ?>
                            $<?php echo number_format($price_new); ?> &nbsp; <del>$<?php echo number_format($row->price); ?></del>
                        <?php else: ?>
                            $<?php echo $row->price; ?>
                        <?php endif; ?>
                    </h5>
                    <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="add" value="<?php echo $row->id; ?>" /> 
                        <input type="hidden" name="w3ls_item" value="<?php echo $row->name; ?>" /> 
                        <?php if($row->discount > 0): ?>
                            <?php $price_new = $row->price - $row->discount; ?>
                            <input type="hidden" name="amount" value="<?php echo number_format($price_new); ?>" />
                        <?php else: ?>
                            <input type="hidden" name="amount" value="<?php echo number_format($row->price); ?>" />
                        <?php endif; ?>
                        <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i>Add to cart</button>
                    </form>
                </div>        
            </div> 
        </div>
    <?php endforeach; ?>
</div>  