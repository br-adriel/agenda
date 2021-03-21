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
									<th scope="col" colspan="3">Ações</th>
								</tr>
							</thead>
							<tbody>
								@if ($eventos->count() > 0)
									@foreach ($eventos as $evento)
									<tr>
										<td>{{ $evento->nome }}</td>
										<td>{{ \Carbon\Carbon::parse($evento->dtinicio)->format('d/m/Y')}}</td>
										<td>{{ Carbon\Carbon::parse($evento->hrinicio)->format('H:i') }}</td>
										<td>Duração</td>
										<td>
											<a href="{{ route('eventos.show', ['evento'=>$evento->id]) }}" title="Ver">
												<i class="far fa-eye"></i>
											</a>
										</td>
										<td>
											<a href="{{ route('eventos.edit', ['evento'=>$evento->id]) }}" title="Editar">
												<i class="fas fa-edit"></i>
											</a>
										</td>
										<td>
											<a href="{{ route('eventos.destroy', ['evento'=>$evento->id]) }}" title="Excluir" onclick="document.getElementById('form-excluir-{{ $evento->id }}').submit(); return false">
												<i class="fas fa-trash"></i>
											</a>

											<form action="{{ route('eventos.destroy', ['evento'=>$evento->id]) }}" method="post" id="form-excluir-{{ $evento->id }}">@method('DELETE') @csrf</form>
										</td>
									</tr>
									@endforeach
								@else
									<tr>
										<td colspan="7">
											<p class="text-center">Você ainda não criou eventos</p>
										</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection