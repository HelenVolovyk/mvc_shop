<?php
use Framework\Core\AbsView;
use Framework\Session\Session;

AbsView::render('layouts/header.php');
?>

<div class="content">
	<section class="product-show">
		<div class="container">

			<?php 
			  if(!empty($_SESSION['error']['login']['common'] )):?>
			<div class="alert alert-success text-center" role="alert">
				<?php echo $_SESSION['error']['login']['common'];?>
			</div>
			<?php endif; 
			Session::delete('error','login','common');
			?>

			<div class="top row" style="margin: 0">
				<div class="bread col-auto mr-auto">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="breadcrumb__link" href="/">home</a></li>
						<li class="breadcrumb-item"><a class="breadcrumb__link" href="/products">shop</a></li>
						<li class="breadcrumb-item active" aria-current="page"> <?php echo $product['name'] ?></li>
					</ol>
				</div>
			</div>
		</div>

		<div class="col-md-12 mb-3">
			<h3 class="product-name text-center">
				<?php echo $product['name'] ?>
			</h3>
		</div>

		<div class="row justify-content-center">

			<div class="col-md-4 pr-3">
				<div class="card pr md-6 ">
					<img src="<?php echo  IMG_PATH . $product['img'] ?>" class="  iibg" alt="">
				</div>
			</div>

			<div class="col-md-4 ">
				<div class="product__text">

					<p>PRICE: <strong>$ <?php echo $product['price'] ?> </strong></p>
					<p>SKU: <strong><?php echo $product['SKU'] ?> </strong></p>
					<p>IN STOCK:
						<strong> <?php echo $product['quantity'] ?></strong>
					</p>
					<hr>

					<div class="product_category">
						<p>CATEGORY</p>
						<a href="/category/show/<?php echo $category['id'] ?>"><?php echo $category['name'] ?> </a>
					</div>
					<hr>

					<div class="">
						<p>Quantity</p>

						<form action="/cart/add/<?php echo $product["id"]; ?>/" method="POST" class="form-inline">

							<div class="form-froup  mb-2">
								<input type="hidden" name="product_id" class="form-content" id="product_id"
									value="<?php echo  $product['id']?>">
								<label for="product_count" class="sr-only">Count</label>
								<input type="number" name="product_count" class="form-content" id="product_count" min="1" max=""
									value="1" style="width: 55px; height: 35px; margin-right:10px; color: rgb(122, 122, 122)">

							</div>
							<button type="submit" class="btn btn-primary mb-2 ml-5">Add to Cart</button>
						</form>

					</div>

					<hr>

					<div class=" ac-block-one">
						<div class="ac-block__item">
							<div class="ac-block__title">
								ordering options
							</div>
							<div class="ac-block__text">

								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis natus provident
									qui
									dicta
									nostrum, debitis ratione sunt optio tenetur labore, dolorem error ex iste officia
									aperiam?
									Maiores
									officia ad ratione! moon officia aute, non cupidatat skateboard dolor brunch. Food
									truck
									quinoa
									nesciunt laborum eiusmod.
									Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
									nulla
								</p>
							</div>
						</div>
						<div class="ac-block__item">
							<div class="ac-block__title">
								payment options
							</div>
							<div class="ac-block__text">

								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis natus provident
									qui
									dicta
									nostrum, debitis ratione sunt optio tenetur labore, dolorem error ex iste officia
									aperiam?
									Maiores
									officia ad ratione! moon officia aute, non cupidatat skateboard dolor brunch. Food
									truck
									quinoa
									nesciunt laborum eiusmod.
									Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
									nulla
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="container">
				<div class="about__product-wrapper mt-5">
					<div class="tabs-wrapper">
						<input class="tab-input" type="radio" name="tabs" id="tab-1" checked>
						<input class="tab-input" type="radio" name="tabs" id="tab-2">
						<label class="tab tab-1" for="tab-1">
							DESCRIPTION:
						</label>
						<label class="tab tab-2" for="tab-2">
							COMMENTS:
						</label>
						<div class="tabs__content content-1">

							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos delectus exercitationem
								reiciendis, debitis, eius et, error culpa neque iure quaerat explicabo doloremque tenetur
								cum
								rem. Deserunt quas repellat officia totam?</p>

						</div>
						<div class="tabs__content content-2">
							<div class="col-md-12">
								<p>This product has no comments yet </p>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<p style="margin-top: 2%; text-align:center; margin-bottom: 2%">YOU MAY ALSO LIKE: </p>
				<div class="container-fluid">

					<div class="sentence"> </div>
				</div>
			</div>


		</div>
	</section>
</div>
</div>

<?php
 AbsView::render('layouts/footer.php');
?>