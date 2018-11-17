<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    // protected function redirectTo()
    // {
    //     if(Auth::User()->role_id==1){
    //         return route('usuarios.index');
    //     }else if(Auth::User()->role_id==2){
    //         return route('pending');
    //     }else if(Auth::User()->role_id==3){
    //         return route('tasks.index');
    //     }else if(Auth::User()->role_id==4){
    //         return route('boss index');
    //     }
    // }
}
