<h2 align="center">Người dùng</h2>
<table style="margin: auto;">
	<tr>
		<th>ID</th>
		<th>Username</th>
		<th>Họ tên</th>
		<th>Địa chỉ</th>
		<th>Điện thoại</th>
		<th>Xoá</th>
		<th>Sửa</th>
	</tr>
	<?php 
	$get_cus = " select * from customer";
	$result_cus = mysqli_query($conn,$get_cus); 
	foreach ($result_cus as $row): ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['address'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Xoá</a></td>
			<td><a href="update_product.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
		</tr>
	<?php endforeach; ?>
</table>