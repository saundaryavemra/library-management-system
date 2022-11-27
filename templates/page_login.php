<div class="container">
	<div class="d-flex justify-content-center align-items-center">
			<form class="p-5 m-5 rounded shadow"
				style="max-width: 30rem; width: 100%"
				method="post"
				action="<?= DIR_MODULES?>login.php">

			<h1 class="text-center display-4 pb-5">LOGIN</h1>
			<?php if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?=htmlspecialchars($_GET['error']); ?>
			</div>
			<?php } ?>

			<div class="mb-3">
				<label for="exampleInputEmail1" 
					class="form-label">Email address</label>
				<input type="email" 
					class="form-control" 
					name="email"
					value="<?php isset($_POST['email']) ? $_POST['email'] : '';?>" 
					id="exampleInputEmail1" 
					aria-describedby="emailHelp">
			</div>

			<div class="mb-3">
				<label for="exampleInputPassword1" 
					class="form-label">Password</label>
				<input type="password" 
					class="form-control" 
					name="password" 
					id="exampleInputPassword1">
			</div>
			<button type="submit" 
				class="btn btn-custom">
				Login
			</button>
			<a class="a-login-form" href="?page=register">Nemate nalog?</a>
			</form>
	</div>
</div>