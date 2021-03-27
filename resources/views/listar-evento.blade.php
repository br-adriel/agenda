@extends('layouts.base')

@section('titulo', 'Eventos')

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
									<th scope="col" colspan="2">Ações</th>
								</tr>
							</thead>
							<tbody>
								@if ($eventos->count() > 0)
								@foreach ($eventos as $evento)
								<tr>
									<td>{{ $evento->nome }}</td>
									<td>{{ \Carbon\Carbon::parse($evento->dtinicio)->format('d/m/Y') }}</td>
									<td>{{ Carbon\Carbon::parse($evento->hrinicio)->format('H:i') }}</td>
									<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento->dtfim . " " . $evento->hrfim)->diffInHours(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $evento->dtinicio . " " . $evento->hrinicio)) . " horas" }}</td>
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