<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>


<div class="content cent">
	<div class="col-md-10">
		<a href="">
			<h3>my Profile</h3>
		</a>
		<a href="">
			<h3>my Orders</h3>
		</a>
		<a href="/logout">
			<h3>quite</h3>
		</a>
	</div>
</div>

<?php
AbsView::render('layouts/footer.php');
?>