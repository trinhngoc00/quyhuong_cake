<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; 
	if (isset($_REQUEST['submit_search'])) {
		$search = addslashes($_POST['search']);
		echo $search;
	}
	?>
	<?php include 'layouts/footer.php'; ?>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>