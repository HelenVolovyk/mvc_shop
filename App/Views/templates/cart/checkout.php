<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<section>
	<div class="content">
		<div class="container">
			<h1 class="text-center">Checkout</h1>
			<div class="row justify-content-space-between">

				<div class="col-md-6">
					<form action="/order/create/" method="POST" id="checkout-form">

						<div class="">
							<div class="form-group">
								<label for="user_name">Name</label>
								<input type="text" id="name" name="name" class="form-control"
									value="<?php echo $user['name'] ?> " autocomplete="name" autofocus>
							</div>
						</div>

						<div class="">
							<div class="form-group">
								<label for="user_email">Email</label>
								<input type="text" id="email" name="email" class="form-control"
									value="<?php echo $user['email'] ?>" autocomplete="email" autofocus>
							</div>
						</div>

						<div class="">
							<div class="form-group">
								<label for="user_phone">Phone</label>
								<input type="text" id="phone" name="phone" class="form-control" required>
							</div>
						</div>

						<div class="">
							<div class="form-group">
								<label for="addres">Address</label>
								<input type="text" id="address" name="address" class="form-control" required>
							</div>
						</div>

						<div class="mt-3">
							<button type="submit" class="btn btn-success">Buy now</button>
						</div>
					</form>
				</div>

				<div class="col"></div>

				<div class="col-md-5 mt-3">
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
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

							</tr>
							<?php
					 			 $total += $product['quantity'] * number_format($product['price'], 2) ;
							}				
							?>

						</tbody>
					</table>
					<div class=" row-rigth">
						<strong>Total</strong>

						<?php
						 print_r(number_format($total, 2)). ' грн';
						?>

					</div>
				</div>


			</div>
		</div>
	</div>

</section>

<?php
AbsView::render('layouts/footer.php');
?>