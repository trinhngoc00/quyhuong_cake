<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = null;
$db = "quyhuong_cake2";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

//get input->name
$id_type = $_POST['id_type'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$price = $_POST['price'];
$price_sale = $_POST['price_sale'];
$description = $_POST['description'];
if (isset($_FILES['image_up'])) {
	$image_up = $_FILES['image_up']['name'];
	$target = "img/".basename($image_up);
}

//update_product

if (isset($_POST['update'])) {
	$id = $_POST['id'];

	if (!$name || !$amount || !$price || !$image_up) {
		echo "Vui lòng nhập đầy đủ thông tin về: tên sản phẩm, số lượng, giá tiền, hình ảnh. <a href='javascript: history.go(-1)'>Trở lại</a>";
		exit;
	}

	// $find_name=mysqli_query($conn, "SELECT name FROM product WHERE name = '$name'");
	// if (mysqli_num_rows($find_name) != 0) {
	// 	echo "Sản phẩm đã tồn tại";
	// 	exit;
	// }

	$post1 = "UPDATE product 
	SET id_type='{$id_type}', name='{$name}', amount='{$amount}', price = '{$price}', price_sale='{$price_sale}', image='{$image_up}', description='{$description}'
	WHERE id = $id";
	$update_pr = mysqli_query($conn, $post1);

	if ($update_pr){
		echo "Cập nhật sản phẩm thành công.";
		exit;
	}
	else
		echo "Có lỗi xảy ra. <a href='update_pr.php'>Thử lại</a>";
}

//add_product
if(isset($_POST['btn_add'])) {
	if (!$name || !$amount || !$price || !$image_up) {
		echo "Vui lòng nhập đầy đủ thông tin về: tên sản phẩm, số lượng, giá tiền, hình ảnh. <a href='javascript: history.go(-1)'>Trở lại</a>";
		exit;
	}

	$find_name=mysqli_query($conn, "SELECT name FROM product WHERE name = '$name'");
	if (mysqli_num_rows($find_name) != 0) {
		echo "Sản phẩm đã tồn tại";
		exit;
	}

	$sql = "INSERT INTO product (id,id_type,name,amount,price,price_sale,image,description)
	VALUES (null, '{$id_type}', '{$name}','{$amount}', '{$price}', '{$price_sale}', '{$image_up}', '{$description}')";
	$add_pr = mysqli_query($conn, $sql);

	if ($add_pr){
		echo "Thêm sản phẩm thành công.";
		exit;
	}
	else
		echo "Có lỗi xảy ra. <a href='update_pr.php'>Thử lại</a>";
}

?>