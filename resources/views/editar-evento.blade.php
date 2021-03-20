@extends('layouts.base')

@section('titulo', 'Editar evento')

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
					<h3>Editar evento</h3>
				</header>

				<div class="w3-container">
					<form method="POST" action="{{ route('eventos.update')}}">
						@method('PUT')
						@csrf

						<div class="form-group">
							<label>Nome do evento: </label>
							<input type="text" class="form-control" name="nome" value="Aula de Iuri" required>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label> Data de início do evento:</label>
								<input type="date" class="form-control" name="dtinicio" value="2021-03-15" required>
							</div>
							<div class="col-md-6">
								<label>Data de término do evento:</label>
								<input type="date" class="form-control" name="dtfim" value="2021-03-15" required>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-6">
								<label>Horário de início do evento:</label>
								<input type="time" class="form-control" name="hrinicio" value="08:00" required>
							</div>
							<div class="col-md-6">
								<label>Horário de término do evento:</label>
								<input type="time" class="form-control" name="hrfim" value="10:30" required>
							</div>
						</div>
						<br>
						<div class="form-group form-user">
							<label>Descrição:</label>
							<input type="text" class="form-control" name="descricao" value="O evento ocorrerá pelo Meet e se trata de uma aula que a maioria não presta atenção.">
						</div>
						<div>
							<label>Deseja ser lembrado deste evento?</label> <br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="lembrete" type="radio" id="inlineRadio1" value="true" checked>
								<label class="form-check-label" for="inlineRadio1"> Sim </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="lembrete" type="radio" id="inlineRadio2" value="false">
								<label class="form-check-label" for="inlineRadio2"> Não </label>
							</div>
						</div>
						<div style="text-align: right;">
							<input type="submit" class="btn btn-primary" value="Salvar">

							<button type="button" class="btn btn-secondary"> Cancelar </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection