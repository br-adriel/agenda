@extends('layouts.base')

@section('titulo', 'Página inicial')

@section('conteudo')
<div class="row">
	<div class="col-md-6 py-3">
		<div class="card shadow-sm">
			<div class="card-header">Eventos de hoje</div>
			<div class="card-body">
				<div class="row">
					@if ($hoje->count() > 0)
						@foreach($hoje as $evento)
						<div class="col-12 mb-2">
							<div class="card h-100">
								<div class="card-body">
									<h5 class="card-title">
										<a href="{{ route('eventos.show', ['evento'=>$evento->id]) }}">
											{{ $evento->nome }}
										</a>
									</h5>
									<p class="card-text text-dark text-justify">
										{{ $evento->descricao }}
									</p>
								</div>
								<div class="card-footer">
									<small class="text-muted">Termina em 
										{{ \Carbon\Carbon::parse($evento->dtfim)->format('d/m/Y')}}
										 às 
										{{ \Carbon\Carbon::parse($evento->hrfim)->format('h:i') }}</small>
								</div>
							</div>
						</div>
						@endforeach
					@else
						<h3>Não eventos para hoje</h3>
					@endif
				</div>
			</div>
		</div>
	</div>

	@if ($conflito->count() > 0)
	<div class="col-md-6 py-3">
		<div class="card shadow-sm">
			<div class="card-header">Eventos conflitantes</div>
			<div class="card-body px-0 py-1">
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Festa de aniversário</li>
					<li class="list-group-item">Festa de aniversário</li>
				</ul>
			</div>
		</div>
	</div>
	@endif
	<div class="col-md-6 py-3">
		<div class="card shadow-sm">
			<div class="card-header">Eventos da semana</div>
			<div class="card-body px-0 py-1">
				<ul class="list-group list-group-flush">
					@if ($semana->count() > 0)
						@foreach($semana as $evento)
							<li class="list-group-item">
								<a href="{{ route('eventos.show', ['evento'=>$evento->id]) }}">
									{{ $evento->nome }}
								</a>
							</li>
						@endforeach
					@else
						<li class="list-group-item">Não há eventos para essa semana</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection