<?php

namespace App\Http\Controllers\Client\Auth;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Only guests for "client" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client');
    }

    /**
     * Show the reset email form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm(){
        if(request()->type && request()->type == 'pharmacist'){
            $title = __('lang.pharmacistResetTitle') ;
        }else if(request()->type && request()->type == 'employee'){
            $title = __('lang.employeeResetTitle') ;
        }else{
            $title = __('lang.clientResetTitle') ;
        }
        return view('auth.passwords.email',[
            'title' => $title,
            'passwordEmailRoute' => 'client.password.email',
            'type' => request()->type
        ]);
    }

    /**
     * password broker for admin guard.
     * 
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker(){
        return Password::broker('clients');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(){
        return Auth::guard('client');
    }
}
