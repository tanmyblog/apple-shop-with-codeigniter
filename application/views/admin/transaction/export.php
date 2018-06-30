<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=transaction.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th style="width:100px;">Mã giao dịch</th>
			<th style="width:100px;">Số tiền</th>
			<th style="width:100px;">Cổng thanh toán</th>
			<th style="width:100px;">Trạng thái</th>
			<th style="width:100px;">Ngày tạo</th>
		</tr>
	</thead>
	<tbody class="list_item">
		<?php foreach ($list as $k => $row): ?>
			<tr class='row_<?php echo $row->id ?>'>
				<td class="textC"><?php echo $k + 1 ?></td>
				<td class="textC"><?php echo $row->id ?></td>
				<td><?php echo number_format($row->amount) ?> đ</td>
				<td><?php echo $row->payment ?></td>
				<td>
					<?php
						if ($row->status == 0) {
							echo 'Chưa thanh toán';
						} elseif ($row->status == 1) {
							echo 'Đã thanh toán';
						} else {
							echo 'Đã hủy';
						}
					?>
				</td>
				<td class="textC"><?php echo $row->created ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
