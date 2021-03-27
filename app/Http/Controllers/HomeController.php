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
    	//eventos do dia
    	$hoje = Evento::where('usuario', Auth::id())
    					->whereDate('dtinicio', '<=', Carbon::today())
    					->whereDate('dtfim', '>=', Carbon::today())
    					->orderBy('dtfim')->orderBy('hrfim')->get();


    	//eventos da semana
    	$hj = Carbon::today()->toDateString();
    	$proxSem = Carbon::today()->addWeek()->toDateString();

    	$semana = Evento::where('usuario', Auth::id())
    					->whereBetween('dtinicio', [$hj, $proxSem])
    					->orWhereBetween('dtfim', [$hj, $proxSem])
    					->orderBy('dtinicio')->orderBy('hrinicio')->get();


    	//eventos em conflito
    	$conflitos = array();

    	$eventos1 = Evento::where('usuario', Auth::id())
    					->where('dtfim', '>=', $hj)
    					->get();
    	$eventos2 = $eventos1;

    	foreach ($eventos1 as $evento1) {
    		$inicio1 = Carbon::createFromFormat('Y-m-d H:i:s' , $evento1->dtinicio . " " . $evento1->hrinicio, 'America/Fortaleza')->timestamp;
    		$fim1 = Carbon::createFromFormat('Y-m-d H:i:s' , $evento1->dtfim . " " . $evento1->hrfim, 'America/Fortaleza')->timestamp;


    		foreach ($eventos2 as $evento2) {
    			$inicio2 = Carbon::createFromFormat('Y-m-d H:i:s' , $evento2->dtinicio . " " . $evento2->hrinicio, 'America/Fortaleza')->timestamp;
    			$fim2 = Carbon::createFromFormat('Y-m-d H:i:s' , $evento2->dtfim . " " . $evento2->hrfim, 'America/Fortaleza')->timestamp;

    			if ($evento1->id != $evento2->id) {
    				if (
    					($inicio1 >= $inicio2 && $inicio2 <= $fim1) && ($inicio1 <= $fim2 && $fim2 <= $fim1)) {
    					array_push($conflitos, array($evento1, $evento2));
    					$eventos2->shift();

    				} elseif (($inicio1 <= $inicio2 && $inicio2 <= $fim1) && ($inicio1 <= $fim2)) {
    					array_push($conflitos, array($evento1, $evento2));
    					$eventos2->shift();

    				} elseif (($inicio1 >= $inicio2) && ($inicio1 <= $fim2 && $fim2 <= $fim1)) {
    					array_push($conflitos, array($evento1, $evento2));
    					$eventos2->shift();

					}
    			}
    		}
    	}

    	return view('home', ['hoje'=>$hoje, 'semana'=>$semana, 'conflitos'=>$conflitos]);
    }
}
