<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>

<body>
	<?php include "layouts/header_admin.php";
	if(isset($_POST['search_product'])) {
		$search = $_POST['search'];
	}
	 ?>
	
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>

			<div class="col-10 ad_conntent">
				<h2 align="center">Người dùng</h2>

				<h4 align="center">
					<div class="alert alert-secondary" role="alert" style="display: inline-block;">
						<form method="post" action="search_user.php" class="form_search">
							<input type="text" name="search" placeholder="Search" value="">
							<input type="submit" name="search_product" value="Tìm kiếm">
						</form>

						<!-- Button modal -->
						<button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#modal_add">
							Thêm người dùng mới
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_add_label" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal_add_label">Thêm người dùng mới</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="result_update_add_del.php" enctype="multipart/form-data">
											<table style="margin: auto;">
												<tr>
													<td><label>Tên người dùng(*):</label></td>
													<td><input class="input_info" type="text" name="username" id="user" value="" placeholder="trinhngoc00"></td>
												</tr>
												<tr>
													<td><label>Mật khẩu(*):</label></td>
													<td><input class="input_info" type="password" name="password" id="pass" value=""></td>
												</tr>
												<tr>
													<td><label>Họ tên(*):</label></td>
													<td><input class="input_info" type="text" name="name" id="" value="" placeholder="Trịnh Hồng Ngọc"></td>
												</tr>
												<tr>
													<td><label>Địa chỉ(*):</label></td>
													<td><input class="input_info" type="text" name="address" id="" value="" placeholder="162 Đường Phan Đình Phùng"></td>
												</tr>
												<tr>
													<td><label>Số điện thoại(*):</label></td>
													<td><input class="input_info" type="text" name="phone" id="" value="" placeholder="0123456789"></td>
												</tr>
												<tr>
													<td><input class="input_btn btn btn-secondary" type="reset" value="Nhập lại"></td>
													<td><input class="input_btn btn btn-success" type="submit" value="Thêm người dùng mới" id="btn_add_user" name="btn_add_user"></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</h4>

				<?php if (empty($search)): ?>
					<h4>Hãy nhập từ khoá tìm kiếm.</h4>
					<?php else: ?>
				<table style="margin: auto;">
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Họ tên</th>
						<th>Địa chỉ</th>
						<th>Điện thoại</th>
						<th>Sửa</th>
					</tr>
					<?php
					$get_cus = " select * from customer where name like '%$search%'";
					$result_cus = mysqli_query($conn, $get_cus);
					foreach ($result_cus as $row) : ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['address']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><a href="update.php?id=<?php echo $row['id']; ?>&flag=user">Sửa</a></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>

</html>