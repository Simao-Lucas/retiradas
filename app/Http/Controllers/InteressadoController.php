<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInteressadoRequest;
use App\Http\Requests\UpdateInteressadoRequest;
use App\Models\Interessado;
use App\Models\Retirada;
use Uspdev\Replicado\Pessoa;

class InteressadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('retiradas.identifica_interessado',[
            'interessado'=> new Interessado
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteressadoRequest $request)
    {
        $interessado = new Interessado;
        $interessado->codpes = $request->codpes;
        $interessado->nomepes = Pessoa::nomeCompleto($request->codpes);
        $interessado->save();
        
        $retirada = Retirada::latest()->first();
        $retirada->interessado = $interessado->id;

        return redirect("/escolheDoc/terceiro");
    }

    /**
     * Display the specified resource.
     */
    public function show(Interessado $interessado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interessado $interessado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInteressadoRequest $request, Interessado $interessado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interessado $interessado)
    {
        //
    }
}
