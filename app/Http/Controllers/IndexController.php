<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function fim(){
        auth()->logout();
        return view("fim");
    }

    public function escolheId(){
        return view("users.escolheId");
    }

}
