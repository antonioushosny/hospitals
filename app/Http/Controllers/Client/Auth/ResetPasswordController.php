<?php

namespace App\Http\Controllers\Client\Auth;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Validator;
use Modules\Admin\Models\Client;
use Modules\Admin\Models\PasswordReset;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /**
     * This will do all the heavy lifting
     * for resetting the password.
     */
    use ResetsPasswords;

     /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client');
    }

    /**
     * Show the reset password form.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null){
        // dd(gettype($token));
        return view('auth.passwords.reset',[
            'title' => __('lang.clientResetTitle'),
            'passwordUpdateRoute' => 'client.password.update',
            'token' => $token,
        ]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    protected function broker(){
        return Password::broker('clients');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(){
        return Auth::guard('client');
    }

    protected function resetPassword($user, $password)
    {
        $user->password = $password;

        $user->save();

        // Auth::guard($this->getGuard())->login($user);
    }

    protected function reset(Request $request)
    {
         

           
        Validator::make($request->all(), [       
            'token'              => 'required',
            'email'              => 'required',
            'password'          => 'required|min:6|confirmed',
        ])->validate();
        // return $request ;
        $user = Client::where('email',$request->email)->first();
        // return $user ;
        if($user){
          
            $resets = PasswordReset::where('email',$user->email)->where('token',$request->token)->first() ;
            if($resets){
                $date = Carbon::now();
                $user->update($request->all()); 
                $user->email_verified_at  = $date ;
                $user->save() ;        
                $resets = PasswordReset::where('email',$user->email)->delete() ;     
                return redirect()->route('getLogin','client')->with('success', __('lang.save_successfuly'));
            }else{
                return back()->with('status_danger', __('lang.invalidCode'));
            }
        }else{
            return back()->with('status_danger', __('lang.emailNotFound'));
        }
        // Auth::guard($this->getGuard())->login($user);
    }
}
