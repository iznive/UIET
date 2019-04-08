<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Login extends Controller
{
    //
    public function pfLogin()
    {
        return view('uilogin');
    }


    public function pfLogout()
    {
        //Cookie::queue(Cookie::forget('PK_Usuario'));
        return redirect('/');
    }


    public function pfLoginEntrar()
    {
        return view('uiPrincipal');
    }

}
