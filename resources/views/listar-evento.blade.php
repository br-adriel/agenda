@extends('layouts.base')

@section('titulo', 'Eventos')

@section('navbar')
<div class="sb-sidenav-menu-heading">Eventos</div>
<a class="nav-link" href="#">
	<div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
	Criar
</a>
<a class="nav-link" href="#">
	<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
	Listar
</a>
@endsection

@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-4">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Seus Eventos</h3>
				</header>

				<div class="w3-container">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Nome do evento</th>
									<th scope="col">Data de ínicio</th>
									<th scope="col">Horário de início</th>
									<th scope="col">Duração</th>
									<th scope="col">Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">Aula de Iuri</th>
									<td>15/03/2021</td>
									<td>08:00</td>
									<td>2h30min</td>
									<td><a href="{{ route('detalhamento') }}"><i class="far fa-eye"></i></a> | <a href="{{ route('editar-evento') }}"><i class="fas fa-edit"></i></a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
