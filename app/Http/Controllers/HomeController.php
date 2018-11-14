<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->role_id==1){
            return redirect()->route('usuarios.index');
        }else if(Auth::User()->role_id==2){
            return redirect()->route('pending');
        }else if(Auth::User()->role_id==3){
            return redirect()->route('tasks.index');
        }else if(Auth::User()->role_id==4){
            return redirect()->route('boss index');
        }
    }
}
