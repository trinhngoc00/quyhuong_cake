<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	
	<?php
	include 'connectDB.php';

	if (isset($_REQUEST['submit_pr'])) {
		$id_pr = addslashes($_POST['id_pr']);

	}
	$get = " select * from product where id=$id_pr";
	$result = mysqli_query($conn,$get);
	?>

	<div class="container" id="product" style="margin-top: 40px;">
		<div class="row">
			<div class="col-12 row_box">
				<div class="card mb-3">
					<div class="row no-gutters">
						<?php foreach ($result as $row): ?>
							<div class="col-sm-6">
								<img src="img/<?php echo $row['image']; ?>" class="card-img" alt="ca_hoi">
							</div>
							<div class="col-sm-6">
								<div class="card-body">
									<h4 class="card-title"><?php echo $row['name']; ?></h4>
									<p class="card-text" style="font-size: 14px;">Mã sản phẩm: <?php echo $row['id']; ?></p>
									<p class="card-text" style="font-size: 14px;">Số lượng: <?php echo $row['amount']; ?></p>
									
									<?php if ($row['price_sale'] != 0): ?>
										<p class="card-text" style="text-decoration: line-through; display: inline-block; font-size: 14px;"> <?php echo $row['price']; ?>VNĐ</p>
										<p class="card-text" style="display: inline-block; font-size: 14px;"><?php echo $row['price_sale']; ?> VNĐ</p>
										<?php else: ?>
											<p class="card-text" style="font-size: 14px;"><?php echo $row['price']; ?> VNĐ</p>
										<?php endif; ?>
										<br>
										<p class="card-text card-text-box" style="font-size: 14px;"><?php echo $row['description']; ?></p>
										<br>
										<button class="btn btn-success">THÊM VÀO GIỎ HÀNG</button>

									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'layouts/footer.php'; ?>
		<?php include 'layouts/scripts.php'; ?>
	</body>
	</html>