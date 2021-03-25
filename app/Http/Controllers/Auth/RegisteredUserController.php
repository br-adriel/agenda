<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('autenticacao.cadastro');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|confirmed|min:8',
		]);

		Auth::login($user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]));

		event(new Registered($user));

		return redirect(RouteServiceProvider::HOME);
	}

	public function edit($id) {
		$usuario = User::findOrFail($id);

		if (Gate::allows('identidade', $usuario, Auth::user())) {
			return view('editar-conta', ['user'=>$usuario]);
		} else {
			return redirect()->back();
		}
	}

	public function update($id, Request $request) {
		$usuario = User::findOrFail($id);

		if (Gate::allows('identidade', $usuario, Auth::user())) {
			$usuario->name  = $request->name;
			$usuario->email = $request->email;
			$usuario->save();

			return redirect()->route('users.edit', ['user'=>Auth::id()])->with('msg', 'Alterações realizadas com sucesso');
		} else {
			return redirect()->back();
		}
	}

	public function destroy($id){
		$usuario = User::findOrFail($id);

		if (Gate::allows('identidade', $usuario, Auth::user())) {
			Auth::logout();

			$usuario->delete();
			return redirect()->route('home');
		} else {
			return redirect()->back();
		}
	}

	public function editPassword($id) {
		$user = User::findOrFail($id);

		if (Gate::allows('identidade', $user, Auth::user())) {
			return view('alterar-senha', ['user'=>$user]);
		} else {
			return redirect()->back();
		}
	}

	public function updatePassword($id, Request $request) {
		$user = User::findOrFail($id);

		if (Gate::allows('identidade', $user, Auth::user())) {
			if ($request->password == $request->password_confirmation) {
				$user->password = Hash::make($request->password);
				$user->save();

				return redirect()->route('users.edit', ['user'=>Auth::id()])->with('msg', 'Senha alterada com sucesso');
			} else {
				return redirect()->route('users.edit-password', ['user'=>Auth::id()])->with('msg', 'As senhas que você digitou eram diferentes');
			}
		} else {
			return redirect()->back();
		}
	}
}
