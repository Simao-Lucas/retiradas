<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRetiradaRequest;
use App\Http\Requests\UpdateRetiradaRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Retirada;
use App\Models\User;

class RetiradaController extends Controller
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
        return view('retiradas.create',[
            'retirada'=> new Retirada
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRetiradaRequest $request)
    {

        $retirada = new Retirada;
        $retirada->codpes = Auth::user()->codpes;
        $retirada->nome_prop = Auth::user()->name;

        $documentos = $request->docs[0];
        for ($i = 1; $i < count($request->docs) ; $i++){
            if(is_null($request->docs[$i])){}
            else{
            $documentos = $documentos."/".$request->docs[$i];
            }
        }

        $retirada->documento = $documentos;
        $retirada->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Retirada $retirada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retirada $retirada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRetiradaRequest $request, Retirada $retirada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Retirada $retirada)
    {
        //
    }
}
