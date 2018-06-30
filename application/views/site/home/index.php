<div class="product-top">
    <h4>Sản phẩm mới nhất</h4>
    <div class="clearfix"> </div>
</div>

<div class="products-row">
        <?php foreach($products as $item):
            $url = convert_vi_to_en($item->site_title);
            $url = strtolower($url); ?>
        <div class="col-md-3 product-grids">
            <div class="agile-products">
                <div class="new-tag"><h6><?php $percent = ($item->discount / $item->price) * 100; ?>
                        <?php echo round($percent,2); ?>%<br>Off</h6></div>
                <a href="<?php echo base_url($url.'-p'.$item->id); ?>"><img src="<?php echo base_url('upload/product/'.$item->image_link)?>" class="img-responsive" alt="<?php echo $item->name; ?>"></a>
                <div class="agile-product-text">              
                    <h5><a href="<?php echo base_url($url.'-p'.$item->id); ?>"><?php echo $item->name; ?></a></h5> 
                    <h6>
                        <?php if($item->discount > 0): ?>
                                <?php $price_new = $item->price - $item->discount; ?>
                                $<?php echo number_format($price_new); ?> &nbsp; <del>$<?php echo number_format($item->price); ?></del>
                            <?php else: ?>
                                $<?php echo $item->price; ?>
                            <?php endif; ?>
                    </h6> 
                    <a href="<?php echo base_url('them-vao-gio-'.$item->id); ?>" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>                        
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    
    <div class="clearfix"> </div>
</div>

<div class="product-top" style="margin-top: 10px;">
    <h4>Sản phẩm mua nhiều</h4>
    <div class="clearfix"> </div>
</div>

<div class="products-row">
        <?php foreach($product_buyed as $row):
            $url = convert_vi_to_en($item->site_title);
            $url = strtolower($url); ?>
        <div class="col-md-3 product-grids">
            <div class="agile-products">
                <div class="new-tag"><h6><?php $percent = ($row->discount / $row->price) * 100; ?>
                        <?php echo round($percent,2); ?>%<br>Off</h6></div>
                <a href="<?php echo base_url($url.'-p'.$row->id); ?>"><img src="<?php echo base_url('upload/product/'.$row->image_link)?>" class="img-responsive" alt="<?php echo $row->name; ?>"></a>
                <div class="agile-product-text">              
                    <h5><a href="<?php echo base_url($url.'-p'.$row->id); ?>"><?php echo $row->name; ?></a></h5> 
                    <h6>
                        <?php if($row->discount > 0): ?>
                                <?php $price_new = $row->price - $row->discount; ?>
                                $<?php echo number_format($price_new); ?> &nbsp; <del>$<?php echo number_format($row->price); ?></del>
                            <?php else: ?>
                                $<?php echo $row->price; ?>
                            <?php endif; ?>
                    </h6> 
                    <a href="<?php echo base_url('them-vao-gio-'.$item->id); ?>" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a>                        
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    
    <div class="clearfix"> </div>
</div>