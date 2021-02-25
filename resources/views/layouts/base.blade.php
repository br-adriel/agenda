<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="author" content="Equipe Agenda" />

		<title>@yield('titulo')</title>

		<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

		@yield('head')
	</head>

	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Agenda</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
			</button>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">
							@yield('navbar')

							<div class="sb-sidenav-menu-heading"></div>
							<a class="nav-link" href="#">
								<i class="fas fa-sign-out-alt"></i>
								Sair
							</a>
						</div>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">Logado como:</div>
						Ninguém
					</div>
				</nav>
			</div>

			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid">
						@yield('conteudo')
					</div>
				</main>
				<footer class="py-4 bg-light mt-auto">
					<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; Agenda 2021</div>
							<div>
								<a href="#">Política de privacidade</a>
								&middot;
								<a href="#">Termos &amp; Condições</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/scripts.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	</body>
</html>