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


class AdminLoginController extends Controller
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
    protected $redirectTo = '/administrator';

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
    if ($user->activation_status==3 && $user->isAdmin) {

       redirect()->intended("/administrator");
    }
    return redirect()->intended($this->redirectPath());
    }





}
