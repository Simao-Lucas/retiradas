<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Providers\AuthServiceProvider;
use App\Providers\AppServiceProvider;

class UserController extends Controller
{
    public function form(){
        if(is_null(Auth::user())){
            session()->flash('alert-danger','Você precisa estar logado.');
            return view('empty');
        }
        $codpes = Auth::user()->codpes;
        $autorizado = User::where('codpes',$codpes)->first();
        if($autorizado->is_admin == 1){
            return view('users.novoadmin');
        };
        session()->flash('alert-danger','Você não é um administrador.');
        return view('empty');
    }

    public function register(UserRequest $request){
        
        $validated = $request->validated();
        $user = User::where('codpes',$validated['codpes'])->first();
        
        
        if(!$user) {
            $user = new User;
            $user->codpes = $request->codpes;
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->email  = Pessoa::email($request->codpes);
            $user->name   = Pessoa::nomeCompleto($request->codpes);
        };

        if ($user->is_admin == TRUE){
            session()->flash('alert-info','Usuário já é Admin.');
            return redirect("/novoadmin");
        };

        $user->is_admin = TRUE;    
        $user->save();
        request()->session()->flash('alert-info','Admin cadastrado com sucesso');
        return redirect("/novoadmin");
    }
}
