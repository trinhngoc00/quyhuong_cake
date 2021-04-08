<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<?php 
	if(isset($_POST['search_product'])) {
		$search = $_POST['search'];
	}
	?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>

			<div class="col-10 ad_conntent" >
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
						<h2 align="center">Sản phẩm</h2>
						<h4 align="right">
							<div class="alert alert-secondary" role="alert" style="display: inline-block;">
								<form method="post" action="search_admin.php">
									<input type="text" name="search" placeholder="Search" value="">
									<input type="submit" name="search_product" value="Tìm kiếm"></i>
								</form>
								<a href="add_product.php" class="" style="font-size: 16px;color: chocolate;">Thêm sản phẩm mới</a>
							</div>
						</h4>
						<?php if (empty($search)): ?>
							<h4>Hãy nhập từ khoá tìm kiếm.</h4>
							<?php else: ?>
								<?php include "connectDB.php";
			$query = "select * from product where name like '%$search%' or price like '%$search%' ";
			$result_search = mysqli_query($conn,$query);

			$num = mysqli_num_rows($result_search); ?>
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
							<?php foreach ($result_search as $row): ?>
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
						<?php endif; ?>
					</div>
					<div class="tab-pane fade" id="type-product" role="tabpanel" aria-labelledby="type-product-tab">
						<?php include "layouts/admin_tab_type_product.php";?>
					</div>
					<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
						<?php include "layouts/admin_tab_user.php";?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>