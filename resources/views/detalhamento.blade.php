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
						<br>
						<div class="form-group row">
							<div class="col-md-6 text-left">
								<a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger">Excluir evento</a>
							</div>
							<div class="col-md-6" style="text-align: right;">
								<a href="{{ route('eventos.edit', ['evento'=>$evento->id]) }}" class="btn btn-primary">Editar</a>
								<a href="{{ route('eventos.index') }}" class="btn btn-secondary">Voltar</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Excluir evento</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Tem certeza que você quer excluir esse evento? Essa ação não é reversível.</p>
		      </div>
		      <div class="modal-footer">
		        <a type="button" class="btn btn-danger" onclick="document.getElementById('form-excluir-{{ $evento->id }}').submit();return false">Excluir evento</a>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		      </div>

		      <form method="post" action="{{ route('eventos.destroy', ['evento'=>$evento->id]) }}" id="form-excluir-{{ $evento->id }}">
		      	@csrf
		      	@method('DELETE')
		      </form>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection