<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('usuario', Auth::id())
                            ->whereDate('dtfim', '>=', Carbon::now())->get();
        return view('listar-evento', ['eventos'=>$eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criar-evento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;

        $evento->usuario = Auth::id();
        $evento->nome = $request->nome;
        $evento->dtinicio = $request->dtinicio;
        $evento->dtfim = $request->dtfim;
        $evento->hrinicio = $request->hrinicio;
        $evento->hrfim = $request->hrfim;
        $evento->descricao = $request->descricao;

        if ($request->lembrete == 'true'){
            $evento->lembrete = 1;
        }

        $evento->save();


        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::findOrFail($id);

        if (Gate::allows('possui-evento', $evento, Auth::user())) {
            return view('detalhamento', ['evento'=>$evento]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);

        if (Gate::allows('possui-evento', $evento, Auth::user())) {
            return view('editar-evento', ['evento'=>$evento]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        if (Gate::allows('possui-evento', $evento, Auth::user())) {
            $evento->nome = $request->nome;
            $evento->dtinicio = $request->dtinicio;
            $evento->dtfim = $request->dtfim;
            $evento->hrinicio = $request->hrinicio;
            $evento->hrfim = $request->hrfim;
            $evento->descricao = $request->descricao;

            if ($request->lembrete == 'true'){
                $evento->lembrete = 1;
            } else {
                $evento->lembrete = 0;
            }

            $evento->save();

             return redirect()->route('eventos.show', ['evento'=>$evento->id]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        if (Gate::allows('possui-evento', $evento, Auth::user())) {
            $evento ->delete();
            return redirect()->route('eventos.index');
        } else {
            return redirect()->back();
        }
    }
}