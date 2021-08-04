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
					<table class="table table-light">
						<thead>
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Subtota</th>


						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<div class="col-2">
					<button type="button" class="btn btn-outline-danger">Delete</button>
				</div>

			</div>


			<div class="row mt-5">
				<div class="col-10">
				</div>
				<div class="col-2">
					<strong>Total</strong>

					<div class=" mt-3">
						<a href="" type="button" class="btn btn-success">Checkout</a>
					</div>
				</div>
			</div>

		</div>

	</section>
</div>




<?php
AbsView::render('layouts/footer.php');
?>