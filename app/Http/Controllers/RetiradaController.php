<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRetiradaRequest;
use App\Http\Requests\UpdateRetiradaRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Retirada;
use App\Models\User;
use App\Models\Interessado;
use App\Models\Receptor;
use Uspdev\Replicado\Pessoa;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRetiradaRequest $request)
    {
        //
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

   
    /**
     * Cria, no banco de dados, o protocolo. Aqui, é tratado o caso em que o receptor é o interessado.
     */
    public function cria_proprio()
    {
        return view('retiradas.create',[
            'retirada'=> new Retirada
        ]);
    }

   
    /**
     * Salva os documentos a serem retirados.
     */
    public function cadastra_proprio(StoreRetiradaRequest $request)
    {

        $retirada = new Retirada;

        $documentos = $request->docs[0];
        for ($i = 1; $i < count($request->docs); $i++){
            if(is_null($request->docs[$i])){}
            else{
            $documentos = $documentos."/".$request->docs[$i];
            }
        }

        $retirada->documento = $documentos;
        $retirada->save();
        return redirect("/escolheId");
    }

   
    /**
     * No caso do receptor não possuir mais acesso à senha única, pede à ele o seu número usp.
     */
    public function pede_nusp()
    {
        $retirada = Retirada::latest()->first();
        return view('users.pedeNusp',[
            'retirada'=> $retirada
        ]);
    }


    /**
     * Salva, no banco de dados o interessado e o atribui a retirada atual.
     */
    public function cadastra_interessado(UpdateRetiradaRequest $request)
    {
        $retirada = Retirada::latest()->first();
        $codpes = $request->codpes;
        $interessado = new Interessado;
        $interessado->codpes = $codpes;
        $interessado->nomepes = Pessoa::nomeCompleto($codpes);
        $interessado->save();

        $retirada->interessado = $interessado->id;
        $retirada->update();
        return redirect('/login/semsenha');
    }


    /**
     * É feita a autenticação do receptor, uma vez que esse não possuí senha única.
     */
    public function sem_senha()
    {
        $retirada = Retirada::latest()->first();
        return view('retiradas.semsenha',[
            'retirada'=> $retirada
        ]);
    }


    /**
     * Salva, no banco de dados a autenticação do receptor.
     */
    public function cadastra_assinatura(UpdateRetiradaRequest $request)
    {
        $retirada = Retirada::latest()->first();
        $retirada->aut_receptor = $request->autenticacao;
        $retirada->update();
        return redirect('/identificaSecretario');
    }

    
    /**
     * É feita a autenticação do atendente.
     */
    public function identifica_secretario(){
        $retirada = Retirada::latest()->first();
        return view('retiradas.identifica_sec',[
            'retirada'=> $retirada
        ]);
    }


    /**
     * Atrubui o atendente identificado a retirada atual e, como há um recptor logado, o atribui como interessado e a sua atenticação como sendo feita pela senha única.
     */
    public function cadastra_secretario(UpdateRetiradaRequest $request){
        $retirada = Retirada::latest()->first();

        if(is_null($retirada->interessado)){
            $interessado = new Interessado;
            $interessado->codpes = auth()->user()->codpes;
            $interessado->nomepes = auth()->user()->nomepes;
            $interessado->save();
            $retirada->interessado = $interessado->id;
        }
        
        $retirada->atendente = $request->atendente;

        if(is_null($retirada->aut_receptor)){
        $retirada->aut_receptor = 'Senha Única';
        }

        $retirada->update();
        dd($retirada); 
        return redirect('/fim');
    }

    public function cria_terceiro()
    {
        return view('retiradas.create_terceiro',[
            'retirada'=> new Retirada
        ]);
    }

   
    /**
     * Salva os documentos a serem retirados.
     */
    public function cadastra_terceiro(StoreRetiradaRequest $request)
    {

        $retirada = new Retirada;

        $documentos = $request->docs[0];
        for ($i = 1; $i < count($request->docs); $i++){
            if(is_null($request->docs[$i])){}
            else{
            $documentos = $documentos."/".$request->docs[$i];
            }
        }

        $retirada->documento = $documentos;
        $retirada->save();
        return redirect("/idTerceiro");
    }

    public function id_terceiro(){
        $retirada = Retirada::latest()->first();
        return view('users.escolheId_terceiro',[
            'retirada'=> $retirada
        ]);
    }

    public function cadastra_id(StoreRetiradaRequest $request)
    {
        $receptor = new Receptor;
        $receptor->nomepes = $request->nomepes;
        $receptor->tipodocidf = $request->tipodocidf ;
        $receptor->numdocidf = $request->numdocidf;
        $receptor->save();
        
        $retirada = Retirada::latest()->first();
        $retirada->receptor = $receptor->id;
        $retirada->aut_receptor = 'Documento e assinatura';
        $retirada->save();
        return redirect("/login/semsenha");
    }
}
