<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>


<div class="container" style="padding: 6rem;">
	<div class="row">
		<div class="col-sm">
		</div>
		<div class="col-sm">
			<form method="post" action="/user/edit/">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>">
					<?php if(!empty($name_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $name_error; ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>">
					<?php if(!empty($email_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $email_error; ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="old_pass">Old passwordl</label>
					<input type="password" class="form-control" id="old_pass" name="old_pass">
					<?php if(!empty($old_pass_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $old_pass_error; ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="new_pass">New password</label>
					<input type="password" class="form-control" id="new_pass" name="new_pass">
					<?php if(!empty($new_pass_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $new_pass_error; ?>
					</div>
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Change date</button>
			</form>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>

<?php
AbsView::render('layouts/footer.php');
?>