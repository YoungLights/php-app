<?php layout('login'); ?>

<section class="login">
	<div class="login-grid">
		<div class="login-logo">
			<img src="<?= ASSETS_ROOT ?>img/logo/yl-logo-font-white.png" alt="Young Lights • Login Logo">
		</div>
		<form class="login-form form">
			<h2>Sign in</h2>
			<div class="form-item">
				<label>E-Mail</label>
				<input type="text" name="email">
			</div>
			<div class="form-item">
				<label>Password</label>
				<input type="text" name="password">
			</div>
			<div class="form-item">
				<button>Login</button>
			</div>
		</form>
	</div>
	<img class="login-bg" src="<?= ASSETS_ROOT ?>img/background/login-bg.webp" alt="Login Background">
</section>