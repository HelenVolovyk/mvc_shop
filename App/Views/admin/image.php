<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<div class="content">
	<div class="container">
		<div class="row justify-content-center">
			<h3>Upload image</h3>
			<div class="col-md-6">
				<form method="POST" enctype="multipart/form-data" action="/image/store/">

					<table class="table table-border">

						<tr>
							<th>Image</th>
							<td><input type="file" name="file" value="file"></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-success " name="submit">

							</td>
						</tr>
					</table>
				</form>
			</div>

		</div>

	</div>
</div><?php

AbsView::render('layouts/footer.php');
?>