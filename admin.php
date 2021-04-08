<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'layouts/head.php'; ?>
</head>
<body>
	<?php include "layouts/header_admin.php" ?>
	<div class="container-fluid ad_content">
		<div class="row">
			<?php include "layouts/admin_menu.php" ?>

			<div class="col-10 ad_conntent" >
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
						<?php include "layouts/admin_tab_product.php"; ?>
					</div>
					<div class="tab-pane fade" id="type-product" role="tabpanel" aria-labelledby="type-product-tab">
						<?php include "layouts/admin_tab_type_product.php";?>
					</div>
					<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
						<?php include "layouts/admin_tab_user.php";?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'layouts/scripts.php'; ?>

</body>
</html>