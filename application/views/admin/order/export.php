<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=product_order.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<table class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th style="width:100px;">Mã đơn hàng</th>
				<th style="width:200px;">Tên sản phẩm</th>
				<th style="width:100px;">Giá</th>
				<th style="width:100px;">Số lượng</th>
				<th style="width:100px;">Tổng tiền</th>
				<th style="width:150px;">Trạng thái đơn hàng</th>
				<th style="width:150px;">Trạng thái thanh toán</th>
				<th style="width:100px;">Ngày tạo</th>
			
			</tr>
		</thead>
		
		<tbody class="list_item">
		        
		        <?php foreach ($query->result() as $k => $row):?>
			      <tr class='row_<?php echo $row->orderId?>'>
					<td class="textC"><?php echo $k + 1?></td>
					
					<td class="textC"><?php echo $row->orderId?></td>
					
					<td><?php echo $row->name; ?></td>
					
					<td class="textR">
						<?php if($row->discount > 0): ?>
							<?php $price_new = $row->price - $row->discount;?>
							<span class="text-ellipsis"><?php echo number_format($price_new) ?> đ</span>
						<?php else: ?>
							<span class="text-ellipsis"><?php echo number_format($row->price) ?> đ</span>
						<?php endif;?>
					</td>
					
					<td class="textC"><?php echo $row->quantity?></td>
					
					<td class="textC"><?php echo number_format($row->amount)?></td>
					
					
					<td class="status textC">
						<?php if($row->orderStatus == 1) echo '<span class="label label-success">Đã giao</span>'; 
								else if($row->orderStatus == 2) echo '<span class="label label-danger">Đã hủy</span>';
							else if($row->orderStatus == 0) echo '<span class="label label-warning">Chờ duyệt</span>';
						?>
					</td>

					<td class="status textC">
						<?php if($row->tranStatus == 1) echo '<span class="label label-success">Đã thanh toán</span>'; 
								else if($row->tranStatus == 2) echo '<span class="label label-danger">Hủy giao dịch</span>';
							else if($row->tranStatus == 0) echo '<span class="label label-info">chưa thanh toán</span>';
						?>
					</td>
					
					<td class="textC"><?php echo $row->created ?></td>
					
				</tr>
			<?php endforeach;?>	
		</tbody>
</table>
		