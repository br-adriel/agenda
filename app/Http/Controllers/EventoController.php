<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = Evento::all();
        return view('listar-evento', ['evento'=>$evento]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('detalhamento', ['evento'=>$evento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        return view('editar-evento', ['evento'=>$evento]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento ->delete();

        return redirect()->route('eventos.index');
    }
}

    public function store(Request $request)
    {
        $evento = new Evento;

        $evento->nome = $request->nome;
        $evento->dtinicio = $request->dtinicio;
        $evento->dtfim = $request->dtfim;
        $evento->hrinicio = $request->hrinicio;
        $evento->hrfim = $request->hrfim;
        $evento->descricao = $request->descricao;
        $evento->lembrete = $request->lembrete;
        $evento->usuario = Auth::id();
        $evento->save();

        return redirect()->route('eventos.index');
    }

     public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        $evento->nome = $request->nome;
        $evento->dtinicio = $request->dtinicio;
        $evento->dtfim = $request->dtfim;
        $evento->hrinicio = $request->hrinicio;
        $evento->hrfim = $request->hrfim;
        $evento->descricao = $request->descricao;
        $evento->lembrete = $request->lembrete;
        $evento->save();

        return redirect()->route('eventos.show', ['evento'=>$evento->id]);
    }