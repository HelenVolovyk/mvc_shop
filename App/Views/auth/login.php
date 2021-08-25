<?php
use Framework\Core\AbsView;
use Framework\Session\Session;

AbsView::render('layouts/header.php');
?>

<div class="content cent">

	<div class="row">
		<div class="col-md-12">
		</div>
		<div class="col-md-12">

			<?php 
			 if(!empty($_SESSION['error']['login']['common'])):
			 ?>

			<div class="alert alert-secondary text-center" role="alert">
				<?php echo $_SESSION['error']['login']['common'];?>
			</div>
			<?php endif;
				Session::delete('error','login','common');
		   ?>

			<h2 class="mb-3">Welcome to our shop</h2>

			<form method="POST" action="/auth/">
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
					<div class="mt-3 mb-3">
						<a href=" /registration">Registration</a>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Entrance</button>
			</form>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>

<?php
AbsView::render('layouts/footer.php');
?>