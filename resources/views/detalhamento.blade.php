@extends('layouts.base')

@section('titulo', 'Ver evento')


@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-4">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Ver evento</h3>
				</header>

				<div class="w3-container">
					<form>
						<div class="form-group">
							<label>Nome do evento: </label>
							<input type="text" class="form-control" value="{{ $evento->nome }}" readonly>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label>Data de início do evento:</label>
								<input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($evento->dtinicio)->format('d/m/Y')}}" readonly>
							</div>
							<div class="col-md-6">
								<label>Data de término do evento:</label>
								<input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($evento->dtfim)->format('d/m/Y')}}" readonly>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-6">
								<label>Horário de início do evento:</label>
								<input class="form-control" type="time" readonly value="{{ $evento->hrinicio }}">
							</div>
							<div class="col-md-6">
								<label>Horário de término do evento:</label>
								<input class="form-control" type="time" value="{{ $evento->hrfim }}" readonly>
							</div>
						</div>
						<br>
						<div class="form-group form-user">
							<label>Descrição:</label>
							<input class="form-control" type="textarea" value="{{ $evento->descricao }}" readonly>
						</div>
						<div>
							<label>Deseja ser lembrado deste evento?</label> <br>
							@if ($evento->lembrete == 1)
							<label>Sim</label>
							@else
							<label>Não</label>
							@endif
						</div>
						<div style="text-align: right;">
							<a href="{{ route('eventos.edit', ['evento'=>$evento->id]) }}" class="btn btn-primary">Editar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection