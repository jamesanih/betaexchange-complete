<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\ActivationService;
use Illuminate\Http\Request;
use App\Models\NextOfKin;
use App\Models\AccountDetail;
use Illuminate\Support\Facades\Validator;
use App\User;
use Session;
use DB;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $activationService;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest')->except('logout');
        $this->activationService = $activationService;
    }



  

    public function authenticated(Request $request, $user)
    {
     
     if ($user->activated==false) {
        auth()->logout();
        redirect()->intended("/verify-code");
    }
     else if ($user->activated==true) {

       redirect()->intended("/");
    }
    else if ($user->activated==true && $user->isAdmin) {

       redirect()->intended("/administrator");
    }
    return redirect()->intended($this->redirectPath());
    


    }


    public function verifyCode(Request $request)
    {

     
        try {
            
        
       $input=$request->all();

       $user=User::where('verify_code','=',$input['verify_code'])->first();

       if(isset($user))
       {
        $user->activated=true;
        $user->save();
         return redirect()->intended('/login');
       }
       return redirect()->back()->withErrors(['warning'=>['Invalid Verification Code'] ]) ->withInput();

         }
          catch(ValidationException $e)
          {
            // Rollback and then redirect // back to form with errors
      
        return redirect()->back()->withErrors( $e->getErrors() ) ->withInput();
         }
          catch(\Exception $e)
          {
        
             throw $e;
            }
      
    }
    




       /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
      
        
        if(!\Auth::check())
        {
        return '/verify-code';
        }
        else if (\Auth::user()->activation_status == "Deactivated") {
            
            auth()->logout();

            return '/retry-login';
        }
        else if (\Auth::user()->isAdmin==true && \Auth::user()->activated==true) {
            return '/administrator';
        }

        elseif (\Auth::user()->isAdmin==false && \Auth::user()->activated==true) {
            return '/';
        }

        else {
            return '/dashboard';
        }

        
    }

}
