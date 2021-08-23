<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<div class="content">
	<section class="">
		<div class="container">

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a class="breadcrumb__link" href="/products">Shop</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cart</li>
			</ol>


			<h1 class="text-center pb-3">Cart</h1>

			<div class="row col-12">
				<div class="col-10">
					<?php  if (isset($_SESSION['products'])){?>

					<table class="table table-light">
						<thead>
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Subtotal</th>
								<th>Ection</th>
						</thead>
						<tbody>
							<tr>
								<?php
								$total = 0;
								foreach ($_SESSION['products'] as $product) {												
						 		?>
								<td><?php echo $product['name']?></td>
								<td><?php echo $product['quantity'] ?></td>
								<td><?php echo  number_format($product['price'], 2) ?></td>
								<td><?php echo number_format($product['quantity'] * ($product['price']), 2)  ?></td>
								<td>

									<div class="col-2">
										<form action="/cart/delete/<?php echo $product['id']; ?> " method="post">

											<input type="submit" class="cart_delete" name=" delete" value="Delete" />
										</form>
									</div>

								</td>
							</tr>
							<?php
					 			 $total += $product['quantity'] * number_format($product['price'], 2) ;
							}				
							?>

						</tbody>
					</table>
				</div>
			</div>


			<div class="row mt-5">
				<div class="col-10">
				</div>
				<div class="col-2">
					<strong>Total</strong>

					<?php
						 print_r(number_format($total, 2)). ' грн';
					?>

					<div class=" mt-3">
						<a href="/cart/checkout" type="button" class="btn btn-success">Checkout</a>
					</div>
				</div>
			</div>
			<?php
            }  else {?>
			<h2>
				the CART is empty
			</h2>
			<?php
			}
			?>

		</div>
	</section>
</div>


<?php
AbsView::render('layouts/footer.php');
?>