@extends('layouts.base')

@section('titulo', 'Perfil do evento')


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
							<input type="text" class="form-control" name="nome" value="Aula de Iuri" readonly>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<label> Data de início do evento:</label>
								<input type="text" class="form-control" name="dtinicio" value="15/03/2021" readonly>
							</div>
							<div class="col-md-6">
								<label>Data de término do evento:</label>
								<input type="text" class="form-control" name="dtfim" value="15/03/2021" readonly>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col-md-6">
								<label>Horário de início do evento:</label>
								<input type="text" class="form-control" name="hrinicio" value="08:00" readonly>
							</div>
							<div class="col-md-6">
								<label>Horário de término do evento:</label>
								<input type="text" class="form-control" name="hrfim" value="10:30" readonly>
							</div>
						</div>
						<br>
						<div class="form-group form-user">
							<label>Descrição:</label>
							<input type="text" class="form-control" name="descricao" value="O evento ocorrerá pelo Meet e se trata de uma aula que a maioria não presta atenção."  readonly>
						</div>
						<div>
							<label>Deseja ser lembrado deste evento?</label> <br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineRadio1" value="true" readonly checked>
								<label class="form-check-label" for="inlineRadio1"> Sim </label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="inlineRadio2" value="false" readonly>
								<label class="form-check-label" for="inlineRadio2"> Não </label>
							</div>
						</div>
						<div style="text-align: right;">
							<button type="button" class="btn btn-primary"> Editar </button>
							<button type="button" class="btn btn-secondary"> Voltar </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection