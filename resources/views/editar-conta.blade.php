@extends('layouts.base')

@section('titulo', 'Perfil do usuário')


@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-4">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Meu perfil</h3>
				</header>

				<div class="w3-container">
					<form>
						<div class="form-group">
							<label>Nome Completo: </label>
							<input type="text" class="form-control" name="nome" value="{{ $user->name }}">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="email" value="{{ $user->email }}">
						</div>
						<br>
						<div style="text-align: right;">
							<button type="submit" class="btn btn-primary">Salvar</button>

							<a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection