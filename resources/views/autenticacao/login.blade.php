<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Entrar | Agenda</title>
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
	</head>
	<body class="bg-primary">
		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				<main class="mb-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-5">
								<div class="card shadow-lg border-0 rounded-lg mt-5">
									<div class="card-header"><h3 class="text-center font-weight-light my-4">Entrar</h3></div>
									<div class="card-body">
										@if($errors->count() > 0)
										<div class="alert alert-danger">
											@foreach ($errors->all() as $error)
					                <span>{{ $error }}</span>
					            @endforeach
										</div>
										@endif
										<form method="POST" action="{{ route('login') }}">
											@csrf
											<div class="form-group">
												<label class="small mb-1" for="email">Email</label>
												<input class="form-control py-4" id="email" type="email" placeholder="Insira seu endereço de email" name="email" :value="old('email')" required autofocus/>
											</div>
											<div class="form-group">
												<label class="small mb-1" for="password">Senha</label>
												<input class="form-control py-4" id="password" type="password" placeholder="Insira sua senha" name="password" required />
											</div>
											<div class="form-group">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" id="remember_me" type="checkbox" name="remember" type="checkbox" />
													<label class="custom-control-label" for="remember_me">Lembre-se de mim</label>
												</div>
											</div>
											<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
												<a class="small" href="#">Esqueceu a senha?</a>
												<button type="submit" class="btn btn-primary">Entrar</button>
											</div>
										</form>
									</div>
									<div class="card-footer text-center">
										<div class="small"><a href="{{ route('register') }}">Ainda não possui uma conta?</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
			<div id="layoutAuthentication_footer">
				<footer class="py-4 bg-light mt-auto">
					<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; Agenda 2021</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/scripts.js') }}"></script>
	</body>
</html>
