<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<<<<<<< HEAD
<div class="content auth">
=======
<div class="content cent">
>>>>>>> feature/auth
	<div class="row">
		<div class="col-md-12">
		</div>
		<div class="col-md-12">
			<form method="POST" action="/user/store/">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name"
						value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
					<?php if(!empty($name_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $name_error; ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email"
						value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>">
					<?php if(!empty($email_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $email_error; ?>
					</div>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" id="pass" name="pass"
						value="<?php echo !empty($data['pass']) ? $data['pass'] : ''; ?>">
					<?php if(!empty($pass_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $pass_error; ?>
					</div>
					<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary mt-3">Register</button>
			</form>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>
<?php
AbsView::render('layouts/footer.php');
?>