<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>
			<div class="col-10 ad_conntent" >
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
						<h2>Sản phẩm</h2>
						<?php $id = $_GET['id'];
						$get_pr ="SELECT * from product WHERE id = $id";
						$run = mysqli_query($conn,$get_pr);

						foreach ($run as $row): ?>
							<form method="post" action="result_update_add.php" enctype="multipart/form-data">
								<input hidden="true" class="input_info" type="text" name="id" value="<?php echo $row['id'];?>">
								<table style="margin: auto;">
									<tr>
										<td><label>ID_loại:</label></td>
										<td><input class="input_info" type="text" name="id_type" value="<?php echo $row['id_type'];?>"></td>
									</tr>
									<tr>
										<td><label>Tên sản phẩm:</label></td>
										<td><input class="input_info" type="text" name="name" value="<?php echo $row['name'];?>"></td>
									</tr>
									<tr>
										<td><label>Số lượng:</label></td>
										<td><input class="input_info" type="text" name="amount" id="" value="<?php echo $row['amount'];?>"></td>
									</tr>
									<tr>
										<td><label>Đơn giá:</label></td>
										<td><input class="input_info" type="text" name="price" id="" value="<?php echo $row['price'];?>"></td>
									</tr>
									<tr>
										<td><label>Giá khuyến mại:</label></td>
										<td><input class="input_info" type="text" name="price_sale" id="" value="<?php echo $row['price_sale'];?>"></td>
									</tr>
									<tr>
										<td><label>Ảnh:</label></td>
										<td><input type="file" name="image_up" style="width: 100%;"><!-- <input class="input_info" type="text" name="image" id="" value="<?php echo $row['image'];?>"> --></td>
									</tr>
									<tr>
										<td><label>Mô tả:</label></td>
										<td><input class="input_info" type="text" name="description" id="" value="<?php echo $row['description'];?>"></td>
									</tr>
									<tr>
										<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
										<td><input class="input_btn btn btn-success" type="submit" value="Cập nhật sản phẩm" id="btn_update" name="update"></td>
									</tr>
								</table>
							</form>
						<?php endforeach; ?>
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