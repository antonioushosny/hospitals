<?php

namespace App\Http\Controllers;
use App\Models\StorageHandle;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use Modules\Admin\Models\Client ;
use Modules\Admin\Models\Doctor ;

use App\Rules\MatchOldPassword;
use Modules\Admin\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Modules\Admin\Models\Language;
 
class AuthController extends Controller
{
    use StorageHandle;

    /**
     * Display login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin(Request $request, $type="client")
    {
        // dd($type);
        // dd(Auth::guard('client')->check()) ;
        if (Auth::guard('client')->check() ) {
            // if logged, then go to home
            return redirect()->route('home');
        }
        session(['type' => $type]);
        $request->pageType ? session(['pageType' => $request->pageType]): session(['pageType' => 'login']) ;
        $request->products_id ? session(['products_id' => $request->products_id]): session(['products_id' => '']) ;
 
         return view('auth.login');
        // return redirect()->route('login') ;

    }

    /**
     * Show the Register Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        // dd($request);
        $date = Carbon::now();
        $date = $date->sub('1 hours') ;
        $resets = PasswordReset::where('created_at','<=',$date)->delete() ;
        $type = $request->type;
        // $type = 'client' ;
        // return $type ;
        // First, check if parameter is 'client'

        // if ($type !== 'client' ) {
        //     return redirect()->route('login');
        // }

        // Check if client logged or Not
        if (Auth::guard($type)->check()) {
            return redirect()->route('home');
        } else {

            // else, then do login process

            $email = $type == 'client' ? 'email' : 'doctors_email';
            $phone = $type == 'client' ? 'clients_phone' : 'doctors_phone';
            session(['type' => $type]);
            // Validate Request
            $request->validate([
                'clients_phone' => 'required|numeric|digits:9|regex:/^[1-9]{1}[0-9]{8}$/',
                'password' => 'required|min:6',
            ]);

            // check Remember Me
            $remember = $request->remember == 'on' ? true : false;
            if($type == 'client'){
                $credentials['clients_phone'] = $request->clients_phone ;
                $status = 'clients_status'  ;
                $credentials[$status] = '1';
            }
            if($type == 'doctor'){
                $credentials['doctors_phone'] = $request->clients_phone ;
                $status = 'doctors_status'  ;
                $credentials[$status] = 'active';
            }
            $credentials['password'] = $request->password ;

            // Attemp Login
            // return $credentials;
            if (Auth::guard($type)->attempt($credentials, $remember)) {
                // Login Success
                $user = Auth::guard($type)->user() ;
                
                $previous_url = url()->previous();
                if(strpos($previous_url, 'mob') !== false){
                    return redirect()->route('blank')->with('success', __('lang.loged_success'));
                }

                return redirect()->route('home')->with('success', __('lang.login_success'));

            } else {

                request()->flash();
                $userStatus = '' ;
                if($type == 'client'){
                    $userStatus = Auth::guard($type)->validate([ 'clients_phone' => request('clients_phone'), 'password' => request('password'), $status => '0']);
                }
                if($type == 'doctor'){
                    $userStatus = Auth::guard($type)->validate([ 'doctors_phone' => request('clients_phone'), 'password' => request('password'), $status => 'stop']);
                    }
                // if true, this acount has been stopped by Admin
                if ($userStatus) {
                    return back()->with('status_danger', __('admin::lang.inactiveAccount'))->with('type', $type);
                }

                // finally, the data that entered ar wrong
                return back()->with('status_danger', __('admin::lang.wrongCredentials'))->with('type', $type);
            }

        }

    }


    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister(Request $request, $type)
    {
         
        if (Auth::guard('client')->check() ) {
            // if logged, then go to home
            return redirect()->route('home');
        }

        if ($type == 'client') {
            return view('auth.register');

        } else {
            return redirect()->route('home');
        }
    }


    /**
     * verify email .
     *
     * @return \Illuminate\Http\Response
    */
    public function clientVerify(Request $request){
        $date = Carbon::now();
        $date = $date->sub('1 hours') ;
        $resets = PasswordReset::where('created_at','<=',$date)->delete() ;
        // dd($request->token) ;
        $passwordReset =  PasswordReset::where('token',$request->token)->first() ;
        if($passwordReset){
            $client = Client::where('email',$passwordReset->email)->first() ;
            $client->email_verified_at = Carbon::now() ;
            $client->save() ;
            Auth::guard('client')->login($client, true);
            PasswordReset::where('token',$request->token)->delete();
            //  return redirect()->route('login');
        }
        return redirect()->route('login');

    }



    /**
     * verify email .
     *
     * @return \Illuminate\Http\Response
    */
    public function verifyResend(Request $request,$id){

        // dd($request->token) ;
        $client = Client::where('clients_id',$id)->first() ;
        if($client){
            $token = bcrypt($client->clients_id.Carbon::now());
            $passwordReset = new PasswordReset ;
            $passwordReset->email = $client->email ;
            $passwordReset->token = $token ;
            $passwordReset->save() ;
            $client->sendEmailVerification($token);
           return   view('auth.verify',[
             'resendRoute' => 'client.verify.resend',
             'id' => $client->clients_id,
           ]);
        }
        return redirect()->route('home');

    }

     /**
     * verify email .
     *
     * @return \Illuminate\Http\Response
    */
    public function shopVerifyResend(Request $request,$id){

        // dd($request->id) ;
        $shop = Shop::where('shops_id',$id)->first() ;
        if($shop){
            $token = bcrypt($shop->shops_id.Carbon::now());
            $passwordReset = new PasswordReset ;
            $passwordReset->email = $shop->email ;
            $passwordReset->token = $token ;
            $passwordReset->save() ;
          $shop->sendEmailVerification($token);
           return   view('auth.verify',[
             'resendRoute' => 'shop.verify.resend',
             'id' => $shop->shops_id,
           ]);
        }
        return redirect()->route('home');

    }


    /**
     * Show the Register Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $date = Carbon::now();
        $date = $date->sub('1 hours') ;
        $resets = PasswordReset::where('created_at','<=',$date)->delete() ;
        // $type = $request->type;
        $type = 'client';

        // return $type ;
        // First, check if parameter is 'client'
        if ($type != 'client' ) {
            return redirect()->route('login');
        }
        // Check if client logged or Not
        if (Auth::guard($type)->check()) {
            // if logged, then go to home
            if($type == 'client'){
                return redirect()->route('login');
            }
        } else {

            // else, then do Register process
            if ($type == 'client') {
                $date = Carbon::now();

                $this->validateClient($request);

                $client = Client::create($request->all());
                $client->save();
                PasswordReset::where('email',$client->clients_phone)->delete() ;
      
                // return redirect()->route('client.verify.resend',$client->clients_id);

                return redirect()->route('login');

            } else {
                return redirect()->route('login');
            }

        }

        return redirect()->route('login');

    }

   /**
     * Show the getProfile Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($type){
 
        if(auth::guard('client')->check()){
            $client = Client::findOrFail(auth('client')->user()->clients_id) ;
            $mainPageTitle = 'myProfile' ;
            return view('includes.clientProfile',compact('client','mainPageTitle')) ;
        }
        else{
                return redirect()->route('home');
            }
    }

    public function getObject($type,$id){
        if($type == 'client'){
            $client = Client::findOrFail($id) ;
            $data = [] ;
            $data['name'] = $client->clients_name ;
            return response()->json($data);
        }
    }


    /**
     *   postProfile.
     *
     * @return \Illuminate\Http\Response
     */
    public function postProfile(Request $request)
    {

        if (Auth::guard('client')->check()) {
            // if logged,

            $client = Client::findOrFail(auth::guard('client')->user()->clients_id) ;

            $this->validateProfileClient($request,$client);
            // return $request ;
            $client =  $client->update($request->all());
             return back()->with('success', __('lang.save_successfuly'));



        }
      else {
            // if not logged, then go to home
            return redirect()->route('login');
        }

       return back()->with('status_danger', __('lang.error_occured'));

    }

    /**
     *   resetPasswordForm.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPasswordForm(Request $request)
    {
        Validator::make($request->all(), [
            'clients_phone'     => 'required|numeric|digits:9|regex:/^[1-9]{1}[0-9]{8}$/',
        ])->validate();
        $user = Client::where('clients_phone',$request->clients_phone)->first();
        if($user){
            // if($user->phone_verified_at == null){
            //     return back()->with('status_danger', __('lang.mustVerifyPhone'));
            // }

            $code = rand(100000,999999) ;
            $passwordResetmobile =  PasswordReset::where('email',$user->clients_phone)->delete() ;
            $passwordReset = new PasswordReset ;
            $passwordReset->email = $user->clients_phone ;
            $passwordReset->token = $code ;
            $passwordReset->save() ;

            $passwordResetEmail =  PasswordReset::where('email',$user->email)->delete() ;
            $passwordReset = new PasswordReset ;
            $passwordReset->email = $user->email ;
            $passwordReset->token = $code ;
            $passwordReset->save() ;

            $recipient = (int)('966'.$user->clients_phone);
            $message = "كود التفعيل الخاص بك هو   ".$code ;
            // Unifonic::send(  $recipient,   $message,   $senderID = null)  ;
            // $user->sendPasswordResetNotification($code);
            return redirect()->route('client.resetPassword',['clients_id'=>$user->clients_id]) ;
            // return back()->with('success', __('lang.mobileFound'));
        }else{
            return back()->with('status_danger', __('lang.mobileNotFound'));
        }
    }
    /**
     * change  PasswordReset.
     *
     * @return \Illuminate\Http\Response
     */
    public function PasswordReset($clients_id)
    {
        // return $clients_id ;
        $user = Client::where('clients_id',$clients_id)->first();
        if($user){
            return view('auth.passwords.reset',[
                'title' => __('lang.clientResetTitle'),
                'passwordUpdateRoute' => 'client.resetPassword.reset',
                'token' => $user,
            ]);
        }
    }


     /**
     * change  resetPasswordReset.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPasswordReset(Request $request)
    {

        Validator::make($request->all(), [
            'code'              => 'required',
            'password'          => 'required|min:6|confirmed',
        ])->validate();
        // return $request ;
        $user = Client::where('clients_id',$request->clients_id)->first();
        // return $user ;
        if($user){
            // if($user->phone_verified_at == null){
            //     return back()->with('status_danger', __('lang.mustVerifyPhone'));
            // }
            $resets = PasswordReset::where('email',$user->clients_phone)->where('token',$request->code)->first() ;
            if($resets){
                $date = Carbon::now();
                $user->update($request->all());
                // $user->phone_verified_at  = $date ;
                $user->save() ;
                $resets = PasswordReset::where('email',$user->clients_phone)->delete() ;
                return redirect()->route('login')->with('success', __('lang.save_successfuly'));
            }else{
                return back()->with('status_danger', __('lang.invalidCode'));
            }
        }else{
            return back()->with('status_danger', __('lang.mobileNotFound'));
        }
    }


    /**
     * Logout Client.
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::guard($request->type)->logout();
        return redirect()->route('home')->with('success', __('lang.loged_success'));
    }

    /**
     * changePassword
     *
     * @return Response
     */
    public function changePassword()
    {

        if(auth::guard('client')->check()){
            $type = 'client'  ;
            $title = __('lang.changePassword') ;
            $mainPageTitle = 'myProfile' ;
            return view('auth.passwords.change',compact('type','title','mainPageTitle' )) ;

        }else{
            return redirect()->route('login');
        }

    }

    /**
     * change  SavePassword.
     *
     * @return \Illuminate\Http\Response
     */
    public function SavePassword(Request $request)
    {
        // return $request ;
        if (Auth::guard('client')->check()) {
            // if logged,

            $client = Client::findOrFail(auth::guard('client')->user()->clients_id) ;
            Validator::make($request->all(), [
                 'password'          => 'required|min:6|confirmed',
                 'current_password' => ['required', new MatchOldPassword],
             ])->validate();

            $client =  $client->update($request->all());
             return back()->with('success', __('lang.save_successfuly'));
        }
       else {
            // if not logged, then go to home
            return redirect()->route('login');
        }

       return back()->with('status_danger', __('lang.error_occured'));

    }


    /**
     * Validate Form Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function validateClient(Request $request)
    {
        Validator::make($request->all(), [
            'clients_name'        => 'required|string|max:100',
            'clients_phone'       => 'required|numeric|digits:9|regex:/^[1-9]{1}[0-9]{8}/|unique:clients,clients_phone',
            'clients_civil_no'       => 'required|numeric|unique:clients,clients_civil_no',
            'email'                 =>'required|email|unique:clients,email' ,
            'password'              => 'required|max:16|min:6|confirmed',
        ])->validate();

    }

    public function validateProfileClient(Request $request,$client)
    {
        // dd($client->clients_id)  ;
        Validator::make($request->all(), [
            'clients_name'        => 'required|string|max:100',
            'clients_civil_no'       => "required|numeric|digits:9|regex:/^[1-9]{1}[0-9]{8}/|unique:clients,clients_civil_no,$client->clients_id,clients_id",
            'clients_phone'       => "required|numeric|digits:9|regex:/^[1-9]{1}[0-9]{8}/|unique:clients,clients_phone,$client->clients_id,clients_id",
            'email'                 => 'required|email|unique:clients,email,'.$client->clients_id.',clients_id'  ,
         ])->validate();

    }

}
