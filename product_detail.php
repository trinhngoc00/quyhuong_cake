<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>	
	<?php
	include 'connectDB.php';

	$id_pr = $_GET['id'];
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
									<p class="card-text">Mã sản phẩm: <?php echo $row['id']; ?></p>

									<p class="card-text">Số lượng: <?php echo $row['amount']; ?></p>
									<?php if ($row['amount'] == 0) { ?>
										<p class="card-text">Sản phẩm cần đặt trước.</p>
									<?php } ?>
									
									<?php if ($row['price_sale'] != 0): ?>
										<p class="card-text alert alert-success" style="display: inline-block; ">
											<span style="text-decoration: line-through;">
												<?php echo $row['price']; ?>VNĐ
											</span> 
											<?php echo $row['price_sale']; ?> VNĐ
										</p>
										<?php else: ?>
											<p class="card-text alert alert-success"><?php echo $row['price']; ?> VNĐ</p>
										<?php endif; ?>
										<br>
										<p class="card-text card-text-box">
											<span style="font-weight: bold;">Mô tả:</span> <br> 
											<?php echo $row['description']; ?></p>
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