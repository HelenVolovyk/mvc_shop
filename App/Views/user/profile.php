<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>


<div class="content">
	<a href="">
		<h3>my Profile</h3>
	</a>
	<a href="">
		<h3>my WishList</h3>
	</a>
	<a href="">
		<h3>my Orders</h3>
	</a>
</div>

<?php
AbsView::render('layouts/footer.php');
?>