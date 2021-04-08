<div class="container" style="padding-top: 20px;">
	<div class="row">
		<div class="col-8" style="border: 1px solid black;">
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
							<h5>Bánh donut đường</h5>
							<p>10.000đ</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/donut2.jpg" class="d-block " alt="brand_img2">
						<div class="carousel-caption d-none d-md-block">
							<h5>Bánh donut không đường</h5>
							<p>10.000đ</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="img/small4.jpg" class="d-block " alt="brand_img3">
						<div class="carousel-caption d-none d-md-block">
							<h5>Bánh donut </h5>
							<p>20.000đ</p>
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
		<div class="col-4">
			
		</div>
	</div>
</div>




<!-- <div class="container">
	<form method="post" >
		{{csrf_field()}}
		Username: <input type="text" name="username" value=""/> <br/>
		password: <input type="password" name="password" value=""/><br/>
		<input type="submit" name="form_click" value="Gửi Dữ Liệu"/><br/>

	</form>
</div>

<div class="container menu">
	<div class="row">
		@foreach($typePr as $type)
		<div class="col-md-4 col-12 box-menu" align="center">
			<div class="box-border">
				<div class="text-in">
					{{$type->name}}
				</div>
			</div>
			<img src="img/{{$type->image}}">
		</div>
		@endforeach
	</div>
</div>

<div id="new_good">
	<h3 align="center">thực phẩm mới nhất</h3>
	<div align="center" style="margin-bottom: 30px;"><img src="img/leaf.png"></div>
	
	<div class="container" align="center">
		<div class="owl-carousel owl-theme owl-loaded">
			<div class="owl-stage-outer">
				<div class="owl-stage">
					@foreach($newestProduct as $pr)
					<div class="owl-item">
						<a href="{{url('product', $pr->id)}}">
							<div class="card">
								<div class="box-img">
									<a href="{{url('product', $pr->id)}}">
										<img src="img/{{$pr->image}}" class="card-img-top" alt="xa_lach">
									</a>
								</div>

								<div class="card-body">
									<a class="card-title" href="{{url('product', $pr->id)}}">
										<h5 class="card-title">{{$pr->name}}</h5>
									</a>
									<a class="card-text" href="{{url('product', $pr->id)}}">
										<p class="card-text">{{number_format($pr->price)}} VNĐ</p>
									</a>
									<a href="javascript:" class="card-link">Thêm vào giỏ hàng</a>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div> -->
