
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<?php
	function message(){
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = null;
		$db = "quyhuong_cake2";
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

	//get input->value
		if(isset($_POST['id_type']) && isset($_POST['name']) && isset($_POST['amount']) && isset($_POST['price']) && isset($_POST['price_sale']) && isset($_POST['description']) ){
			$id_type = $_POST['id_type'];
			$name = $_POST['name'];
			$amount = $_POST['amount'];
			$price = $_POST['price'];
			$price_sale = $_POST['price_sale'];
			$description = $_POST['description'];
		}

		if (isset($_FILES['image_up'])) {
			$image_up = $_FILES['image_up']['name'];
			$target = "img/".basename($image_up);
		}

//update_product
		if (isset($_POST['update'])) {
			$id = $_POST['id'];

			if (!$name || !$amount || !$price) {
				return "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p>";
			}
			$post1 = "UPDATE products 
			SET id_type='{$id_type}', name='{$name}', amount='{$amount}', price = '{$price}', price_sale='{$price_sale}', image='{$image_up}', description='{$description}'
			WHERE id = $id";
			$update_pr = mysqli_query($conn, $post1);

			if ($update_pr){
				return "<p id='message'>Cập nhật sản phẩm thành công.</p>";
			}
			else
				return "<p id='message'>Có lỗi xảy ra.</p>";
		}

//add_product
		if(isset($_POST['btn_add'])) {
			if (!$name || !$amount || !$price) {
				return "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p>";
			}

			$find_name=mysqli_query($conn, "SELECT name FROM products WHERE name = '$name'");
			if (mysqli_num_rows($find_name) != 0) {
				return "<p id='message'>Sản phẩm đã tồn tại</p>";
			}

			$sql = "INSERT INTO products (id,id_type,name,amount,price,price_sale,image,description)
			VALUES (null, '{$id_type}', '{$name}','{$amount}', '{$price}', '{$price_sale}', '{$image_up}', '{$description}')";
			$add_pr = mysqli_query($conn, $sql);

			if ($add_pr){
				return "<p id='message'>Đã thêm sản phẩm thành công.</p>";
			}
			else
				return "<p id='message'>Có lỗi xảy ra.</p>";
		}
//add type
		if (isset($_POST['add_type'])) {
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
				if (!$name) {
					echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
				}
				$find_name=mysqli_query($conn, "SELECT name FROM type WHERE name = '$name'");
				if (mysqli_num_rows($find_name) != 0) {
					echo "<p id='message'>Loại sản phẩm đã tồn tại</p>";
				}
				$sql = "INSERT INTO type (id,name) VALUES (null, '{$name}')";
				$add_pr = mysqli_query($conn, $sql);
				if ($add_pr){
					echo "<p id='message'>Thêm loại sản phẩm thành công.</p>";
				}
				else
					echo "<p id='message'>Có lỗi xảy ra.</p>";
			}
		}

		//add_user
		if(isset($_POST['btn_add_user'])) {
			if (!$_POST['username'] || !$_POST['password'] || !$_POST['name'] || !$_POST['address'] || !$_POST['phone']) {
				return "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p>";
			}

			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);
			$name = addslashes($_POST['name']);
			$address = addslashes($_POST['address']);
			$phone = addslashes($_POST['phone']);

			$query = mysqli_query($conn, "SELECT username FROM customer WHERE username='$username'");
			$query1 = mysqli_query($conn, "SELECT phone FROM customer WHERE phone='$phone'");

			if (mysqli_num_rows($query) != 0) {
				return "<p id='message'>Tài khoản đã tồn tại</p>";
			}
			if (mysqli_num_rows($query1) != 0) {
				return "<p id='message'>Số điện thoại đã tồn tại</p>";
			}

			$check_pass = preg_match('/^$|^([a-zA-Z0-9_]){4,255}$/', $password);
			if ($check_pass == false) {
				echo "<p id='message'>Mật khẩu không hợp lệ.</p>";
				exit;
			}

			$check_name = preg_match('/^([a-zA-Z0-9]|\s){3,255}$/', $name);
			if ($check_name == false) {
				echo "<p id='message'>Họ tên không hợp lệ.</p>";
				exit;
			}

			$check_address = preg_match('/^(.){3,255}$/', $address);
			if ($check_address == false) {
				echo "<p id='message'>Địa chỉ không hợp lệ.</p>";
				exit;
			}

			$check_phone = preg_match('/^(\d+)$/', $phone);
			if ($check_phone == false) {
				echo "<p id='message'>Số điện thoại không hợp lệ.</p>";
				exit;
			}

			$post1 = "insert into customer (id, username, password, name, address, phone, created_at, updated_at) VALUE (NULL, '{$username}', '{$password}', '{$name}', '{$address}', '{$phone}', current_timestamp(), current_timestamp())";
			$addmember = mysqli_query($conn, $post1);

			if ($addmember){
				return "<p id='message'>Đã thêm người dùng thành công.</p>";
			}
			else
				return "<p id='message'>Có lỗi xảy ra.</p>";
		}
//update type
		if (isset($_POST['update_type'])) {
			if (isset($_POST['id']) && isset($_POST['name'])){
				$id = $_POST['id'];
				$name = $_POST['name'];
				if (!$name) {
					return "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p>";
				}
				$find_name=mysqli_query($conn, "SELECT name FROM type WHERE name = '$name'");
				if (mysqli_num_rows($find_name) != 0) {
					return "<p id='message'>Loại sản phẩm đã tồn tại.</p>";
				}

				$post1 = "UPDATE type SET name='{$name}' WHERE id = $id";
				$update = mysqli_query($conn, $post1);

				if ($update){
					return "<p id='message'>Cập nhật loại sản phẩm thành công.</p>";
				}
				else
					return "<p id='message'>Có lỗi xảy ra.</p>";
			}
		}
	//delete type., product
		if (isset($_GET['id']) && isset($_GET['flag'])) {
			$id = $_GET['id'];
			$flag = $_GET['flag'];

			if ($flag === 'product') {
				$sql = "DELETE FROM products WHERE id = $id";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					return "<p id='message'>Đã xoá sản phẩm thành công.</p>";
				}
				else{
					return "<p id='message'>Có lỗi xảy ra.</p>";
				}
			}
			if ($flag === 'type') {
				$sql = "DELETE FROM type WHERE id = $id";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					return "<p id='message'>Đã xoá loại sản phẩm thành công.</p>";
				}
				else{
					return "<p id='message'>Có lỗi xảy ra.</p>";
				}
			}
		}
	//update user 
		if (isset($_POST['update_user'])) {
			if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$address = $_POST['address'];
				$phone = $_POST['phone'];
				if (!$name || !$address || !$phone) {
					return "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p>";
				}
				// $find_phone=mysqli_query($conn, "SELECT phone FROM customer WHERE phone = '$phone'");
				// if (mysqli_num_rows($find_phone) != 0) {
				// 	return "Số điện thoại đã tồn tại";
				// }
				$post1 = "UPDATE customer SET name='{$name}', address='{$address}', phone='{$phone}'  WHERE id = $id";
				$update = mysqli_query($conn, $post1);

				if ($update){
					return "<p id='message'>Cập nhật tài khoản người dùng thành công.</p>";
				}
				else
					return "<p id='message'>Có lỗi xảy ra.</p>";
			}
		}
	}
	?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>
			<div class="col-10 ad_conntent" >
				<h3 style="margin-top: 20px;">Kết quả</h3>
				<div class="alert alert-success message_alert" role="alert">
					<?php echo message(); ?>
				</div>
				<a href='admin.php' style="font-size: 14px; font-weight: bold; margin-right: 30px;">Về trang chủ</a>
			</div>
		</div>
	</div>
<?php include 'layouts/scripts.php'; ?>

</body>
</html>