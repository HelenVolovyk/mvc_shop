<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');

?>

<h1 class='text-center' mt-3>
	<?php echo $title ?>
</h1>


<div class="content">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="bread">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="breadcrumb__link" href="/">Home</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb__link" href="/shop">Shop</a></li>
					<li class="breadcrumb-item active" aria-current="page">All Categories</li>
				</ol>
			</div>

		</div>
	</div>

	<h1 class="text-center mt-2">All Categories</h1>

	<div class="categories">
		<div class="col-md-12 mt-5">

			<div class="categories__container text-center">
				<div class="categ__text pt-3 pb-3">

					<div class="row d-flex justify-content-around">

						<?php 
								foreach($categories as $item_=>$value){
								echo $value['name'] . ': ' . $value['quantity'], '</br>';
							}
						 ?>

					</div>


				</div>
			</div>
		</div>
	</div>
</div>

<?php
\Framework\Core\AbsView::render('layouts/footer.php'); 