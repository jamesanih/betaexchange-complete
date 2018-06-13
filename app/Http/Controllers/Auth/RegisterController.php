<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\ActivationService;
use Session;
use Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use App\Helpers\Utility;
use App\Models\NextOfKin;
use App\Models\AccountDetail;
use DB;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verification';
    protected $activationService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
        public function showRegistrationForm()
       {
              
        $data['relationships']=Utility::GetRelationships();
        $data['banks']=Utility::GetBanks();
         return view('auth.register',$data);
        }

public function register(Request $data)
{

    $postData = $data->all();

    //  $postData['account_first_name']=strtolower($data['account_first_name']);
    // $postData['account_middle_name']=strtolower($data['account_middle_name']);
    // $postData['account_last_name']=strtolower($data['account_last_name']);

    // setting up custom error messages for the field validation
    $messages = ['first_name.required' => 'Enter First Name',
      'last_name.required' => 'Enter Last Name',
      'middle_name.required' => 'Enter Middle Name',
      'email.email' => 'Enter a valid email address',
      'email.required' => 'Enter email address',
      'confirm_password.required' => 'You need confirm password',
      'password.required' => 'You need a password',
      'email.unique' => 'The email  '.' '. $data['email']. ' has already been taken. Please enter another email','next_first_name.required' => 'Enter Next of Kin First Name',
      'next_last_name.required' => 'Enter Next of Kin Last Name',
      'next_phone_no.required' => 'Next of kin phone number is required',
      'next_phone_no.different' => 'Your next of kin phone number must be different  from your registered  phone number',
      'next_last_name.different' => 'Your next of kin Last Name must be different  from your registered  Last Name',
      'next_first_name.different' => 'Your next of kin First Name must be different  from your registered  First Name',
      'relationship.required' => 'Relationship status required',
      'account_first_name.required' => 'Your account first name is required',
      'account_last_name.required' => 'Your account last name is required',
      'account_no.required' => 'Your account number is required',
      'bank_name.required' => 'Your bank name is required',
      'secret_question.required' => 'Your secret question is required',
      'secret_answer.required' => 'Your secret answer is required',
      'account_first_name.same' => 'Your account first name must match your registered first name',
      'account_middle_name.same' => 'Your account middle name must match your registered middle name',
      'account_last_name.same' => 'Your account last name must match your registered last name'];


    $rules = ['first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password'=> 'required|min:4',
      'confirm_password' => 'required|min:4|same:password'];

    $validator = Validator::make($postData, $rules, $messages);


    if( $validator->fails() ) {
      // Validator fails, return to the previous page with the errors
      return redirect()->back()->withErrors( $validator )->withInput();
    }


    try
    {

      $user_id = $this->generate_id();
      $user_id = $this->check_id($user_id);

      //check if another user has input phone number
      $user = User::where('phone_no', $data['phone_no'])->get();

      if (!empty($user[0])) {
        return redirect()->back()->withErrors('Phone number already exixts, please try again with a different number.')->withInput();
      }


      $code=$this->generate_code();
      // Start transaction!
      DB::beginTransaction();
      $user= User::create([
        'id' => $user_id,
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'middle_name' => $data['middle_name'],
        'phone_no' => $data['phone_no'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'verify_code' => $code
      ]);

      // Commit the queries!
      DB::commit();

      // $this->send_sms($user->phone_no,"'Welcome to Betaexchangeng. Kindly use this code: " .  $code .  "  to confirm your account. Thanks.'");
      $this->sendRegistrationMail($user);

    }
    catch(ValidationException $e)
    {
      // Rollback and then redirect // back to form with errors
      DB::rollback();
      return redirect()->back()->withErrors( $e->getErrors() ) ->withInput();
    } catch(\Exception $e)
    {
      DB::rollback();
      throw $e;
    }
      return redirect()->intended('/verify-code');
}

 public function generate_id()
 {
    //generate id for user
    $rand_no = mt_rand(100000, 999999);
    $rand_no = str_shuffle($rand_no);
    return $rand_no;
 }

 public function check_id($user_id)
 {
    $exists = User::where('id', $user_id)->exists();

    if ($exists) {
      $user_id = mt_rand(100000, 999999);
      $user_id = str_shuffle($user_id);
      return $user_id;

    } else {
      return $user_id;

    }
    
 }

    public function sendRegistrationMail($user)
    {

    
               try
          {
     
        $data['user']=$user;
         Mail::send('emails.register_user', $data, function($message) use ($user)
        {
         $message->to($user->email)
          ->bcc("niyibrahym@gmail.com")
          ->from('info@betaexchangeng.com')
          ->subject('Welcome to betaexchangeng.com');
      });

    
    $data['user']=$user;
      Mail::send('emails.copy_admin',$data, function($message) use ($user)
        {
         $message->to("info@betaexchangeng.com")
         ->bcc('admin@betaexchangeng.com')
         ->from('info@betaexchangeng.com')
            ->subject('New user registration!');
      });

       
     }
         catch(\Exception $e)
          {
            // throw $e;
             return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
            }

    }


    public function verifyCode()
    {

      return view('auth.verify_code');
    }


public function generate_code()
{
  $characters='ABCDEFHJKLMNPQRSTUVWXYZ';  
  $pin=mt_rand(100,999).mt_rand(100,999).$characters[rand(0,strlen($characters)-3)];
  $ref_no=str_shuffle($pin);

  return $ref_no;
}


         private function user_id() {
            $pin=mt_rand(1000,99999);
            $user_no=str_shuffle($pin);
            return $user_no;
            //$this->checkid($user_no);
         }


         private function checkid($gen_id) {
      $exists = User::where('id', $gen_id)->exists();
      if($exists) {
        $id = $this->user_id();
        return $id;

      } else {
        return $gen_id;
      }
   }


   private function send_sms($user)
    //private function send_sms($phone_no,$message)
   {
   try {
       //$data['user']=$user;

       $message = 'Welcome to Betaexchangeng. Kindly use this code: $code to confirm your account. Thanks.';
           $client = new GuzzleHttpClient();
 
           //$apiRequest = $client->request('POST', 'http://www.smsmobile24.com/index.php/component/spc/?comm=spc_api', [
            $apiRequest = $client->request('POST', 'http://developers.cloudsms.com.ng/api.php', [
             'form_params' => [
        'userid' => '20065979',
        'password' => 'adeolu123',
        'type' => '0',
        'destination' => '2348077156443',
        'sender' => 'BetaExchangeNG',
                 //'username' => 'BetaX',
                 //'password' => 'newpassword$',
        //'option' => 'com_spc',
        //'comm' => 'spc_api',
        //'recipient' => $phone_no,
        'message' => $message,
        ]
      ]);
           echo $apiRequest->getStatusCode();
           //echo $apiRequest->getHeader('content-type'));
 
         // $content = json_decode($apiRequest->getBody()->getContents());
 
      } catch (RequestException $re) {
          //For handling exception
      }
   }


}
