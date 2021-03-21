@extends('layouts.base')

@section('titulo', 'Novo evento')


@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-4">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Criar evento</h3>
				</header>

				<div class="w3-container">
					<form method="POST" action="{{ route('eventos.store')}}">
						@csrf

						<div class="form-group">
							<label>Nome do evento: </label>
							<input type="text" class="form-control" name="nome" placeholder="Ex.: Festa de aniversário." required>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label> Data de início do evento:</label>
								<input type="date" class="form-control" name="dtinicio" required>
							</div>
							<div class="col-md-6">
								<label>Data de término do evento:</label>
								<input type="date" class="form-control" name="dtfim" required>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-6">
								<label>Horário de início do evento:</label>
								<input type="time" class="form-control" name="hrinicio" required>
							</div>
							<div class="col-md-6">
								<label>Horário de término do evento:</label>
								<input type="time" class="form-control" name="hrfim" required>
							</div>
						</div>
						<br>
						<div class="form-group form-user">
							<label>Descrição:</label>
							<input type="text" class="form-control" name="descricao" placeholder="Ex.: O evento ocorrerá na casa da Maria e se trata de um encontro de amigos." required>
						</div>
						<div>
							<label>Deseja ser lembrado deste evento?</label> <br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="lembrete" type="radio" id="inlineRadio1" value="true">
								<label class="form-check-label" for="inlineRadio1"> Sim </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="lembrete" type="radio" id="inlineRadio2" value="false" checked>
								<label class="form-check-label" for="inlineRadio2"> Não </label>
							</div>
						</div>
						<div style="text-align: right;">
							<input type="submit" class="btn btn-primary" value="Salvar">

							<a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection