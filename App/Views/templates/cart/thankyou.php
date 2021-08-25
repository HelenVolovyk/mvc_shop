<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<<<<<<< HEAD
<div class="content">
=======
<div class="content cent">
>>>>>>> feature/auth
	<div class="conteiner">

		<div class="col-md-12">
			<h2>Thank you,
				<?php echo $user['name']?>! </br>
<<<<<<< HEAD
				your order is completed
=======
				your order for <?php echo "$" . $total?> </br> is completed
				</br>
>>>>>>> feature/auth
			</h2>
		</div>

	</div>
</div>


<?php
AbsView::render('layouts/footer.php');
?>