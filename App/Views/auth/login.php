<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<div class="content">

	<div class="row">
		<div class="col-sm">
		</div>
		<div class="col-sm">
			<?php if(!empty($_SESSION['errors']['login']['common'])): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_SESSION['errors']['login']['common'];?>
			</div>
			<?php endif; ?>

			<h3>Welcome to our shop</h3>

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
					<label for="pass">Пароль</label>
					<input type="password" class="form-control" id="pass" name="pass"
						value="<?php echo !empty($data['pass']) ? $data['pass'] : ''; ?>">
					<?php if(!empty($pass_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $pass_error; ?>
					</div>
					<?php endif; ?>
					<a href="/registration">Форма регистрации</a>
				</div>
				<button type="submit" class="btn btn-primary">Вход</button>
			</form>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>

<?php
AbsView::render('layouts/footer.php');
?>