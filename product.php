<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include 'layouts/header.php'; ?>
	<?php
	include 'connectDB.php';

	$get1 = " select * from product";
	$result = mysqli_query($conn,$get1);

	$num = mysqli_num_rows($result);
	?>

	<div class="container category">
		<h2 style="text-align: center;">Tất cả sản phẩm</h2>
		<p style="text-align: center;">Hiển thị <?php echo $num; ?>; sản phẩm</p>
		<div class="row justify-content-center" id="card_box">

			<?php foreach($result as $row): ?>
				<form method="post" action="product_detail.php" class="col-lg-3 col-md-4 col-sm-6 col-12 ">
					<div class="card">
						<input type="text" name="id_pr" hidden="true" value="<?php echo $row['id']; ?>">
						<div class="box-img">
							<a href="product_detail.php" name="submit_pr">
								<img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="xa_lach">
							</a>
							<?php if ($row['price_sale'] != 0): ?>
								<div class="btn-sale">Sale</div>
							<?php endif; ?>
							
						</div>

						<div class="card-body">
							<a href="" class="card-name">
								<h5 class="card-title"><?php echo $row['name']; ?></h5>
							</a>
							<?php if ($row['price_sale'] != 0): ?>
								<p class="card-text" style="text-decoration: line-through; display: inline-block;"> <?php echo $row['price']; ?>VNĐ</p>
								<p class="card-text" style="display: inline-block;"><?php echo $row['price_sale']; ?> VNĐ</p>
								<?php else: ?>
									<p class="card-text"><?php echo $row['price']; ?> VNĐ</p>
								<?php endif; ?>
								<div>
									<input type="submit" class="card-link" name="submit_pr" value="Thêm vào giỏ hàng"> 
								</div>

							</div>
						</div>			
					</form>
				<?php endforeach; ?>	

			</div>
			<!-- <div align="right">
				<a href="#" class="see-more black">Xem thêm >> </a>
			</div> -->
			<br>
		</div>

		<?php include 'layouts/footer.php'; ?>
		<?php include 'layouts/scripts.php'; ?>
	</body>
	</html>

