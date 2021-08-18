<?php

use App\Models\Category;
use App\Models\Product;
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>
<div class="content">
	<section class="shop ">

		<div class="shop__content ">

			<?php if(!empty($_SESSION['errors']['login']['common'])): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_SESSION['errors']['login']['common'];?>
			</div>
			<?php endif; ?>


			<div class="container">
				<div class="breadsearch col-md-12">

					<div class="bread">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a class="breadcrumb__link" href="/">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shop</li>
						</ol>
					</div>
					<div class="search-box">
						<form class="search d-flex pull-right" method="GET" class="search-form" action="/products/search/">
							<input type="text" id='query' name="query" placeholder="search" value="">
							<button type="submit" name="submit-search">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>

				<div class="row mt-3">
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
										<li><a href="/products/priceUp/">up</a></li>
										<li><a href="/products/priceDown/">downw</a></li>
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

										<img src="http://shop.com/images/<?php echo  $product['img'] ?>" class="abg " alt="...">
									</div>
								</a>

								<div class="cart-link">
									<a class="badge rounded-pill  flot-right" href=""><i class="fa fa-heart-o fa-2x"
											aria-hidden="true"></i>
									</a>
								</div>

								<div class="new">
									<?php 
									if($product['is_new']){?>
									<img src="" class=" new" slt="">
									<?php }?>

								</div>
								<div class="card-body">
									<h5 class="card-title"><?php echo $product['name']; ?>
									</h5>
									<a href="#">category name</a>
									<p class="card-text">Some quick example text to build on the card title
										and </p>
									<div class="price">
										<small style="color: red; text-decoration: line-through">1200 грн
										</small>
										<div class="printPrice"><?php echo $product['price']; ?> грн</div>
									</div>
									<a href="/cart/to/<?php echo $product['id']; ?>" data-id="<?php echo $product['id']; ?>"
										class="go btn btn-primary add-to-ciart">Go
										somewhere</a>
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