<?php
session_start();
if ( isset($_SESSION['login_status']) && $_SESSION['login_status']== 'No')
{
	echo '<h1>Combinazione di Username e Password non corrette, riprova</h1>';
	$_SESSION['login_status'] = 'Si';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Pagina di Login</title>
	<!-- Favicon  -->
	<link rel="icon" href="../img/core-img/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<a href="../index.php"><img src="../img/core-img/logo.png" alt="logo" width="400"></a>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" action="../indexpaginaprotetta.php" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
								<label class="mb-2 text-muted" for="Username">Username</label>
									<input id="Username" type="text" class="form-control" name="Username" value="" required autofocus>
									<div class="invalid-feedback">
										username non inserito
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password necessaria
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<script>
										function set_provenience() {
											document.querySelector(".button_login").onclick = function() {
												<?php
												$_SESSION['Provenience'] = 'login';
												 ?>
											}
										}
									</script>
									<button type="submit" id = "button_login" class="btn btn-primary ms-auto" onclick="set_provenience()">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Non hai un account? <a href="register.php" class="text-dark">Creane uno</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2025 &mdash; Luminare
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
