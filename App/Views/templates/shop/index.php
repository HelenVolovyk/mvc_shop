<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>
<div class="content">

	<section class="shop ">

		<div class="shop__content ">

			<?php if (!empty($_SESSION['errors']['login']['common'])): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_SESSION['errors']['login']['common']; ?>
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
                                        foreach ($categories as $category) {
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
									<li><a id="up" href="#">up</a></li>
									<li><a id="down" href="#">down</a>
									</li>
								</div>
							</div>
						</aside>
					</div>

					<div class=" col-sm-12 col-md-10">
						<div id="fon"></div>
						<div id="loader">Loading...</div>
						<div id="shLine" class="shop-line"></div>

						<!-- <a data-page="1" data-max="<?php echo $amt; ?>" id="showmore-button" href="#">Show more</a> -->

						<!-- <?php echo $pagination->get(); ?> -->

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
		$('#fon').css({
			'opacity': '1'
		});
		$('#loader').fadeIn(1000, function() {

			$.ajax({

				data: data,
				dataType: 'json',
				headers: {
					Accept: "application/json; charset=utf-8",
				},
				type: 'GET',
				url: `ajax`,

				success: function(response) {
					shopLine.empty();
					response.forEach((product) => {
						const shopCart = $(document.createElement('div')).addClass('card');
						const shop = $(document.createElement('a')).addClass('cart__link');
						const shopImg = $(document.createElement('div')).addClass(
							'scale cart-img');
						const shopAbg = $(document.createElement('img')).addClass('abg').attr(
							'alt', '...');
						const shopBody = $(document.createElement('div')).addClass(
							'card-body mt-2');
						const shopTitle = $(document.createElement('H5')).addClass('card-title');
						const shopCategory = $(document.createElement('a'));
						const shopText = $(document.createElement('p')).addClass('card-text');
						const shopPrice = $(document.createElement('div')).addClass('price');

						const img = shopAbg.attr("src",
							`${window.location.origin}/images/${product.img}`);
						const a = shop.attr("href", `/product/show/${product.id}`);
						const aFill = a.html(shopImg.html(img));

						const title = shopTitle.text(`${product.name}`);
						const category = shopCategory.attr("src",
							`${window.location.origin}/category/show/${product.category_id}`);

						const categoryText = category.text(`${product.category_name}`);
						const shText = shopText.text(`${product.description}`);
						const shPrice = shopPrice.text(`$ ${product.price}`);
						const divFill = shopBody
							.html(title)
							.append(categoryText)
							.append(shText)
							.append(shPrice);
						shopLine.append(shopCart.html(aFill).append(divFill)).hide().fadeIn(2000);
						$('#fon').css({
							'opacity': '0'
						});
						$('#loader').fadeOut(1000);
					})

					search = '';
				}
			});
		});

	};
});
</script>