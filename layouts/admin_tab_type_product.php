<h2 align="center">Loại sản phẩm</h2>
<h4 align="center">
	<div class="alert alert-secondary" role="alert" style="display: inline-block;">
		<a href="add_product.php" class="" style="font-size: 16px;color: chocolate;">Thêm loại sản phẩm mới</a>
	</div>
</h4>
<table style="margin: auto;">
	<tr>
		<th>ID</th>
		<th>Tên loại sản phẩm</th>
		<th>Xoá</th>
		<th>Sửa</th>
	</tr>
	<?php 
	$get_type = " select * from type";
	$result_type = mysqli_query($conn,$get_type); 
	foreach ($result_type as $row): ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Xoá</a></td>
			<td><a href="update_product.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
		</tr>
	<?php endforeach; ?>
</table>