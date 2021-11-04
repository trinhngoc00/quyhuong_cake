<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = null;
$db = "quyhuong_cake2";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");

$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$name = addslashes($_POST['name']);
$address = addslashes($_POST['address']);
$phone = addslashes($_POST['phone']);

if (!$username || !$password || !$name || !$address || !$phone) {
	echo "<p id='message'>Vui lòng nhập đầy đủ thông tin.</p> <a href='javascript: history.go(-1)'>Trở lại</a>";
	exit;
}
//kiem tra co trung username va sodienthoai khong
include('connectDB.php');
$query = mysqli_query($conn, "SELECT username FROM customer WHERE username='$username'");
$query1 = mysqli_query($conn, "SELECT phone FROM customer WHERE phone='$phone'");
if (mysqli_num_rows($query) != 0) {
	echo "<p id='message'>Tên đăng nhập đã tồn tại.</p>";
	exit;
}
if (mysqli_num_rows($query1) != 0) {
	echo "<p id='message'>Số điện thoại đã tồn tại</p>";
	exit;
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
	echo "<p id='message'>Đăng ký thành công.</p> <a href='login.php'>Đăng nhập</a>";
	exit;
}
else
	echo "<p id='message'>Có lỗi xảy ra trong quá trình đăng ký. </p><a href='resgister.php'>Thử lại</a>";
?>