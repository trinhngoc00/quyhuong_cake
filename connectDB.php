<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = null;
$db = "quyhuong_cake2";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Không thể kết nối database");
?>