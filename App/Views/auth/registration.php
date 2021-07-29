<?php
use Framework\Core\AbsView;
AbsView::render('layouts/header.php');
?>

<div class="container">
	<div class="row">
		<div class="col-sm">
		</div>
		<div class="col-sm">
			<form method="POST" action="/user/store/">
				<div class="form-group">
					<label for="name">Имя</label>
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
					<label for="pass">Пароль</label>
					<input type="password" class="form-control" id="pass" name="pass"
						value="<?php echo !empty($data['pass']) ? $data['pass'] : ''; ?>">
					<?php if(!empty($pass_error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $pass_error; ?>
					</div>
					<?php endif; ?>
				</div>

				<button type="submit" class="btn btn-primary">Зарегистрировать</button>
			</form>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>
<?php
AbsView::render('layouts/footer.php');
?>