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
						<h4>Thêm sản phẩm mới</h4>
						<form method="post" action="result_update_add.php" enctype="multipart/form-data">
							<table style="margin: auto;">
								<tr>
									<td><label>ID_loại:</label></td>
									<td><input class="input_info" type="text" name="id_type" value=""></td>
								</tr>
								<tr>
									<td><label>Tên sản phẩm:</label></td>
									<td><input class="input_info" type="text" name="name" value=""></td>
								</tr>
								<tr>
									<td><label>Số lượng:</label></td>
									<td><input class="input_info" type="text" name="amount" id="" value=""></td>
								</tr>
								<tr>
									<td><label>Đơn giá:</label></td>
									<td><input class="input_info" type="text" name="price" id="" value=""></td>
								</tr>
								<tr>
									<td><label>Giá khuyến mại:</label></td>
									<td><input class="input_info" type="text" name="price_sale" id="" value=""></td>
								</tr>
								<tr>
									<td><label>Ảnh:</label></td>
									<td><input type="file" name="image_up" style="width: 100%;"></td>
								</tr>
								<tr>
									<td><label>Mô tả:</label></td>
									<td><input class="input_info" type="text" name="description" id="" value=""></td>
								</tr>
								<tr>
									<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
									<td><input class="input_btn btn btn-success" type="submit" value="Thêm sản phẩm mới" id="btn_add" name="btn_add"></td>
								</tr>
							</table>
						</form>
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