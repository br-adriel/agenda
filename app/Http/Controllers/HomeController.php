<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
    	$hoje = Evento::where('usuario', Auth::id())
    					->whereDate('dtinicio', '<=', Carbon::today())
    					->whereDate('dtfim', '>=', Carbon::today())->get();

    	$semana = Evento::where('usuario', Auth::id())->get();

    	$conflito = Evento::where('dtinicio', 'ola')->get();
    	return view('home', ['hoje'=>$hoje, 'semana'=>$semana, 'conflito'=>$conflito]);
    }
}
