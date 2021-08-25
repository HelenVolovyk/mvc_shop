<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>
<div class="content">
	<section class="shop ">

		<div class="shop__content ">
			<div class="container">
				<div class="breadsearch col-md-12">

					<div class=" bread ">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a class="breadcrumb__link" href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop</li>
						</ol>
					</div>
					<div class="search-box">
						<form class="search d-flex pull-right" method="POST" action="">
							<input type="text" id='search' placeholder="search" required>
							<button type="submit" name="submit-search">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>

						</form>
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
								<div class="sort">
									<span>sort by price</span>

									<ul>
										<li><a href="/products/priceUp/page-1">up</a></li>
										<li><a href="/products/priceDown/page-1">downw</a></li>
									</ul>
								</div>
							</div>
						</aside>

					</div>

					<div class=" col-sm-12 col-md-10">
						<div class="shop-line">
							<?php
								foreach($products as $product){
							?>
							<div class="card" style="width: 18rem;">
								<a class="cart__link" href="/product/show/<?php echo $product['id']?>">
									<div class="scale cart-img ">
										<img src="<?php echo  IMG_PATH . $product['img'] ?>" class="abg " alt="...">
									</div>
								</a>

								<div class="card-body mt-3">
									<h5 class="card-title"><?php echo $product['name']; ?>
									</h5>
									<a href="#">category name</a>
									<p class="card-text"><?php echo $product['description']; ?></p>
									<div class="price">

										<div class="printPrice"><?php echo $product['price']; ?> грн</div>
									</div>
								</div>
							</div>

							<?php } ?>
						</div>


						<?php echo $pagination->get(); ?>


					</div>


				</div>
			</div>
		</div>


	</section>
</div>
<?php
AbsView::render('layouts/footer.php');
?>