<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = "/";

    public function username(){
        return 'codpes';
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function redirectToProvider(){
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();
        $user = User::where('codpes',$userSenhaUnica->codpes)->first();

        // if (is_null($user)) {
        //     request()->session()->flash('alert-danger','Usuário sem acesso ao sistema');
        //     return redirect('/');
        // }

        if (is_null($user)){
            $user = new User;
        }

        // bind do dados retornados
        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->nomepes = $userSenhaUnica->nompes;
        $user->save();
        auth()->login($user, true);
        return redirect('/identificaSecretario');
    }

}
