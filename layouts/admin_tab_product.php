<h2 align="center">Sản phẩm</h2>
<h4 align="center">
	<div class="alert alert-secondary" role="alert" style="display: inline-block;">
		<form method="post" action="search_admin.php" class="form_search">
			<input type="text" name="search" placeholder="Search" value="">
			<input type="submit" name="search_product" value="Tìm kiếm">
		</form>
		<a href="add_product.php" class="" style="font-size: 16px;color: chocolate;">Thêm sản phẩm mới</a>
	</div>
</h4>
<table style="margin: auto;">
	<tr>
		<th>ID</th>
		<th>ID_loại</th>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Giá khuyến mại</th>
		<th>Ảnh</th>
		<th>Mô tả</th>
		<th>Xoá</th>
		<th>Sửa</th>
	</tr>
	<?php 
	$get_pr = " select * from product";
	$result_pr = mysqli_query($conn,$get_pr); 
	foreach ($result_pr as $row): ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['id_type'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['amount'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['price_sale'];?></td>
			<td><img src="img/<?php echo $row['image'];?>"><?php echo $row['image'];?></td>
			<td><?php echo $row['description'];?></td>
			<td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Xoá</a></td>
			<td><a href="update_product.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
		</tr>
	<?php endforeach; ?>
</table>