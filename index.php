<!DOCTYPE html>
<html>
<head>
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php 
	include 'connectDB.php';
	include 'layouts/header.php';

	$get_gato = " select * from product where (id_type=0 or id_type=1 or id_type=3)";
	$result_gato = mysqli_query($conn,$get_gato);

	$get_socola = " select * from product where (id_type=4) limit 4";
	$result_socola = mysqli_query($conn,$get_socola);

	$get_treEm = " select * from product where (id_type='2') limit 4";
	$result_treEm = mysqli_query($conn,$get_treEm);

	$get_ngot = " select * from product where (id_type='5') limit 4";
	$result_ngot = mysqli_query($conn,$get_ngot);
	?>

	<div class="container" style="padding-top: 20px;">
		<div class="row">
			<div class="col-md-8 col-12" style="">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						
						<div class="carousel-item active">
							<img src="img/donut1.jpg" class="d-block " alt="brand_img1">
							<div class="carousel-caption d-none d-md-block">
								<h5>Bánh donut có đường</h5>
								<p>10000 VND</p>
							</div>
						</div>

						<div class="carousel-item">
							<img src="img/donut2.jpg" class="d-block " alt="brand_img1">
							<div class="carousel-caption d-none d-md-block">
								<h5>Bánh donut không đường</h5>
								<p>10000 VND</p>
							</div>
						</div>

						<div class="carousel-item">
							<img src="img/2tang1.jpg" class="d-block " alt="brand_img1">
							<div class="carousel-caption d-none d-md-block">
								<h5>Bánh sinh nhật hai tầng </h5>
								<p>250000 VND</p>
							</div>
						</div>
						
					</div>

					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-12 img_right">
				<div class=""  style="padding-bottom: 10px;">
					<a href="#" style="display: block;">
						<img src="img/gato3.jpg" class="w-100">
					</a>
				</div>
				<div style="padding-bottom: 10px;">
					<a href="#" style="display: block;">
						<img src="img/gato4.jpg" class="w-100">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div id="new_good">
		<h3 align="center" style="color: #f1e749;margin-bottom: 20px;">Bánh sinh nhật</h3>

		<div class="container" align="center">
			<div class="owl-carousel owl-theme owl-loaded">
				<div class="owl-stage-outer">
					<div class="owl-stage">
						<?php foreach($result_gato as $row): ?>
							<div class="owl-item">
								<a href="">
									<div class="card">
										<div class="box-img">
											<a href="">
												<img src="img/<?php echo $row['image']; ?>" class="card-img-top" alt="xa_lach">
											</a>
											<?php if ($row['price_sale'] != 0): ?>
												<div class="btn-sale">Sale</div>
											<?php endif; ?>
										</div>

										<div class="card-body">
											<a class="card-title" href="">
												<h5 class="card-title"><?php echo $row['name']; ?></h5>
											</a>
											<?php if ($row['price_sale'] != 0): ?>
												<p class="card-text" style="text-decoration: line-through; display: inline-block;"> <?php echo $row['price']; ?>VNĐ</p>
												<p class="card-text" style="display: inline-block;"><?php echo $row['price_sale']; ?> VNĐ</p>
												<?php else: ?>
													<p class="card-text"><?php echo $row['price']; ?> VNĐ</p>
												<?php endif; ?>
												<a href="" class="card-link">Thêm vào giỏ hàng</a>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div align="right">
				<a href="type_product.php?id=1" class="see-more white">Xem thêm >> </a>
			</div>
		</div>
	</div>

	<div class="container two-deal">
		<div class="row">
			<div class="col-md-6 col-12">
				<a href="#">
					<img alt='imgdemo' src="img/ngot7.jpg" class="w-100 border-radius-2">
				</a>
			</div> 

			<div class="col-md-6 col-12">
				<a href="#">
					<img alt='imgdemo' src="img/ngot11.jpg" class="w-100 border-radius-2">
				</a>
			</div> 
		</div>
	</div>

	<div class="container category">
		<h2 style="text-align: center;margin-bottom: 20px;">Bánh ngọt</h2>
		<div class="row justify-content-center">
			<?php foreach($result_ngot as $row): ?>

				<div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
					<div class="card" style="margin-bottom: 20px;">
						<input type="text" hidden="true" name="id" value="{{$pr->id}}">
						<div class="box-img">
							<a href="">
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


							<div><a type="submit" href="javascript:" class="card-link">Thêm vào giỏ hàng</a></div>

						</div>
					</div>	
				</div>
			<?php endforeach ?>
		</div>
		<div align="right">
			<a href="type_product.php?id=5" class="see-more black">Xem thêm >> </a>
		</div>
	</div>

	<div class="container category">
		<h2 style="text-align: center;margin-bottom: 20px;">Bánh sinh nhật trẻ em</h2>
		<div class="row justify-content-center">
			<?php foreach($result_treEm as $row): ?>

				<div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
					<div class="card" style="margin-bottom: 20px;">
						<input type="text" hidden="true" name="id" value="{{$pr->id}}">
						<div class="box-img">
							<a href="">
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


							<div><a type="submit" href="" class="card-link">Thêm vào giỏ hàng</a></div>

						</div>
					</div>	
				</div>
			<?php endforeach ?>
		</div>
		<div align="right">
			<a href="type_product.php?id=2" class="see-more black">Xem thêm >> </a>
		</div>
	</div>

	<div class="container category">
		<h2 style="text-align: center;margin-bottom: 20px;">Socola</h2>
		<div class="row justify-content-center">
			<?php foreach($result_socola as $row): ?>

				<div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
					<div class="card" style="margin-bottom: 20px;">
						<input type="text" hidden="true" name="id" value="{{$pr->id}}">
						<div class="box-img">
							<a href="">
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


							<div><a type="submit" href="javascript:" class="card-link">Thêm vào giỏ hàng</a></div>

						</div>
					</div>	
				</div>
			<?php endforeach ?>
		</div>
		<div align="right">
			<a href="type_product.php?id=4" class="see-more black">Xem thêm >> </a>
		</div>
	</div>



		<?php include 'layouts/footer.php'; ?>

		<?php include 'layouts/scripts.php'; ?>

	</body>
	</html>