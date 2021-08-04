<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>
<div class="content">
	<section class="shop ">

		<div class="shop__content ">
			<div class="container">
				<div class="top row" style="margin: 0">
					<div class="bread col-auto mr-auto">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a class="breadcrumb__link" href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop</li>
						</ol>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">

						<aside class="product-section container">
							<div class="sidebar">

								<div class="category_link ">
									<div class="mb-2">
										<a class="category__link" href="/products">all categories
										</a>
									</div>
									<div>

									</div>

									<ul>

										<?php
										foreach($categories as $category){
										?>
										<li>
											<div class="pb-2">
												<a class="categ__cart-linck" href="/category/show/<?php echo $category['id']; ?>">
													<?php echo $category['name']; ?></a>
											</div>
										</li>
										<?php } ?>
									</ul>

								</div>
							</div>
						</aside>
					</div>

					<div class=" col-sm-12 col-md-10">
						<h2>in <?php echo $category['name']; ?> category <?php echo count($products) ?> products</h2>
						<div class="shop-line mt-3">
							<?php
								foreach($products as $product){
							?>
							<div class="card" style="width: 18rem;">
								<a class="cart__link" href="/product/show/<?php echo $product['id']?>">
									<div class="scale cart-img ibg">

										<img src="../images/products/product1.jpg" class="card-img-top ibg" alt="...">
									</div>
								</a>

								<div class="cart-link">
									<a class="badge rounded-pill  flot-right" href=""><i class="fa fa-heart-o fa-2x"
											aria-hidden="true"></i>
									</a>
								</div>


								<div class="card-body">
									<h5 class="card-title"><?php echo $product['name']; ?>
									</h5>
									<a href="#">category name</a>
									<p class="card-text">Some quick example text to build on the card title
										and </p>
									<div class="price">
										<small style="color: red; text-decoration: line-through">1200грн
										</small>
										<div class="printPrice"><?php echo $product['price']; ?></div>
									</div>
									<a href="#" class="go btn btn-primary">Go somewhere</a>
								</div>
							</div>

							<?php } ?>
						</div>


					</div>


				</div>
			</div>
		</div>


	</section>
</div>
<?php
AbsView::render('layouts/footer.php');
?>