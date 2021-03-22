@extends('layouts.base')

@section('titulo', 'Editar perfil')


@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mt-4">
			<div class="card-body">
				<header class="w3-container w3-grey">
					<h3>Editar perfil</h3>
				</header>

				<div class="w3-container">
					@if (session('msg'))
						<div class="alert alert-success text-center">
							{{ session('msg') }}
						</div>
					@endif
					<form method="post" action="{{ route('users.update', ['user'=>$user->id]) }}">
						@method('PUT')
						@csrf
						<div class="form-group">
							<label>Nome: </label>
							<input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
						</div>
						<a href="{{ route('users.edit-password', ['user'=>$user->id]) }}">Alterar senha</a><br>
						<a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">Excluir conta</a>
						<br>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Salvar</button>
							<a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Excluir conta</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Tem certeza que você quer excluir sua conta? Essa ação não é reversível.</p>
		      </div>
		      <div class="modal-footer">
		        <a type="button" class="btn btn-danger" onclick="document.getElementById('form-apagar-conta').submit();return false">Excluir conta</a>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		      </div>

		      <form method="post" action="{{ route('users.destroy', ['user'=>$user->id]) }}" id="form-apagar-conta">
		      	@csrf
		      	@method('DELETE')
		      </form>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection