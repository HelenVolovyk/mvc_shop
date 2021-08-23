<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<div class="content">
	<div class="conteiner">

		<div class="col-md-12">
			<h2>Thank you,
				<?php echo $user['name']?>! </br>
				your order is completed
			</h2>
		</div>

	</div>
</div>


<?php
AbsView::render('layouts/footer.php');
?>