
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Register Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<a href="../index.html"><img src="../img/core-img/logo.png" alt="logo" width="400"></a>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Registrati</h1>
							<form  action="../indexpaginaprotetta.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Nome</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										Il nome è richiesto
									</div>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="cognome">Cognome</label>
									<input id="name" type="text" class="form-control" name="cognome" value="" required autofocus>
									<div class="invalid-feedback">
										Il cognome è richiesto
									</div>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="dataDiNascita">Data di nascita</label>
									<input id="dataDiNascita" type="date" class="form-control" name="dataDiNascita" value="" required autofocus>



									<div class="invalid-feedback">
										La data di nascita è richiesta
									</div>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="Username">Username</label>
									<input id="Username" type="text" class="form-control" name="Username" value="" required>
									<div class="invalid-feedback">
										Username è richiesto
									</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Indirizzo Email</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Email non valida
									</div>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	La password è obbligatoria
							    	</div>
								</div>
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password_confirm">Conferma password</label>
									<input id="password" type="password" class="form-control" name="password_confirm" required>

								</div>

								<p class="form-text text-muted mb-3">
									Registrandoti accetti i nostri termini e condizioni
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Registrati
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Hai già un account? <a href="login.html" class="text-dark">Login</a>
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