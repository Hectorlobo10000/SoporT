<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BossController extends Controller
{

    /** @return void  */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** @return \Illuminate\Http\Response */
    public function index() {
        return view('Boss');
    }
}
