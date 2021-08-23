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
						<form class="search d-flex pull-right" method="GET" class="search-form"
							action="/products/search/page-1">
							<input type="text" id='query' name="query" placeholder="search" value="">
							<button type="submit" name="submit-search" id="search">
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
										<a class="category__link" href="/products/page-1/">all categories
										</a>
									</div>
									<div>

									</div>

									<ul class="categories">
										<?php
										foreach($categories as $category){
										?>
										<li class="li-category">
											<div class="category pb-2">
												<a class="a-category categ__cart-linck"
													href="/category/show/<?php echo $category['id']; ?>">
													<?php echo $category['name']; ?></a>
											</div>
										</li>
										<?php } ?>
									</ul>

								</div>
								<div class="sort">
									sort by price
									<!-- <li><a href="/products/priceUp/page-1/">up</a></li>
									<li><a href="/products/priceUp/page-1/">up</a></li> -->
									<li><a id="up" href="#">up</a></li>
									<li>
										<a id="down" href="#">down</a>
									</li>

								</div>
							</div>
						</aside>

					</div>

					<div class=" col-sm-12 col-md-10">

						<div id="fon"></div>
						<div id="loader">Loading...</div>
						<div id="shLine" class="shop-line">

							<?php
								foreach($products as $product){
							?>
							<div id="shop-cart" class="card" style="width: 18rem;">
								<a id="shop_a" class="cart__link" href="/product/show/<?php echo $product['id']?>">
									<div id="shop-img" class="scale cart-img ">
										<img src="http://shop.com/images/<?php echo $product['img']?>" id="shop-abg" class="abg"
											alt="...">
									</div>
								</a>

								<div id="shop-body" class=" card-body mt-2">
									<h5 id="shop-title" class=" card-title"><?php echo $product['name']; ?></h5>
									<p id="shop-text" class=" card-text"><?php echo $product['description']; ?></p>
									<div id="shop-price" class=" price">
										<?php echo $product['price']; ?> грн
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

<script>
$(document).ready(function() {

	const limit = 6;
	let page = 1;
	let search = "";
	let sort = 'price';
	let direction = 'ASC';
	let shopLine = $('#shLine');
	const shopCart = $('#shop-cart');
	const shop = $('#shop_a');
	const shopImg = $('#shop-img');
	const shopAbg = $('#shop-abg');
	const shopBody = $('#shop-body');
	const shopTitle = $('#shop-title');
	const shopText = $('#shop-text');
	const shopPrice = $('#shop-price');



	getProduct(page, limit, search, sort, direction);


	$(document).on('click', '#search', function(event) {
		event.preventDefault()

		search = $('#query').val();
		getProduct(page, limit, search, sort, direction);

		return false;
	});


	$(document).on('click', '#up', function(event) {
		event.preventDefault()
		direction = 'ASC';
		getProduct(page, limit, search, sort, direction);
		return false
	})


	$(document).on('click', '#down', function(event) {
		event.preventDefault()
		direction = 'DESC';
		getProduct(page, limit, search, sort, direction);
		return false
	})


	function getProduct(page, limit, search, sort, direction) {
		const data = {
			"page": page,
			"limit": limit,
			"search": search,
			"sort": sort,
			"direction": direction
		}
		$.ajax({

			data: data,
			dataType: 'json',
			headers: {
				Accept: "application/json; charset=utf-8",
			},
			type: 'GET',
			url: `ajax`,

			success: function(response) {

				shopLine.html("");


				response.forEach(product => {

					const img = shopAbg.attr("src",
						`http://shop.com/images/${product.img}`);
					const a = shop.attr("href", `/product/show/${product.id}`);
					const aFill = a.html(shopImg.html(img));

					const title = shopTitle.text(`${product.name}`);
					const shText = shopText.text(`${product.description}`);
					const shPrice = shopPrice.text(`$ ${product.price}`);
					const divFill = shopBody
						.html(title)
						.append(shText)
						.append(shPrice);
					const divShopcart = shopCart.html(aFill).append(divFill);
					shopLine.html(divShopcart);

				})


				search = '';

			}

		});
	}


});
</script>






<!-- 
<script>
$(document).ready(function() {
			$(".sort span").click(function() {
						var id = $(this).attr('id');

						$('#fon').css({
							'display': 'block'
						});
						$('#loader').fadeIn(1000, function() {
									$.ajax({
												url: `ajax`,
												data: 'sort_id=' + id,
												type: 'get',
												// dataType: 'json',
												success: function(html) {
														alert(html); 

// $('.cart').html('');
// for (vaue in html) {
// $('.cart').append()
// }

// $('.cart').html(html).hide().fadeIn(2000);
// $('#fon').css({
// 'display': 'none'
// });
// $('#loader').fadeOut(1000);
// }

// });
// });

// });
// });
//
//
//</script>