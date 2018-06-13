<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\AccountDetail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;
use App\Models\BitCoin;
use App\Models\PerfectMoney;
use App\Models\Price;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Validator;
//use App\BankDetails;
use App\Models\PurchaseBitCoin;
use App\Models\PurchasePerfectMoney;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use App\notifyUser;


class ecurrencyController extends Controller
{


  public function confirm_order() {
    return view('home.thank_you');
  }


public function  buy_currency(Request $request) {

    	$code = $this->generate_code();
      $id = $this->user_id();
      $user_id = $this->checkid($id);
      $input = $request->all();
      $this->validate($request, [
            'email' => 'required|unique:users',
            'first_name' => 'required',
            'last_name'=> 'required',
            'password' => 'required',
            'phone_no'=> 'required|unique:users'
        ]);
      //dd($user_id);

    	$user = User::create([
        'id'=> $user_id,
    		'first_name'=> $request['first_name'],
    		'middle_name' => $request['middle_name'],
    		'last_name'=> $request['last_name'],
    		'email'=> $request['email'],
    		'password' => bcrypt($request['password']),
    		'phone_no'=> $request['phone_no'],
    		'verify_code' => $code
    	]);
    	Auth::login($user);
      

    	if ($user) {
    		
    		$user_id = Auth::user()->id;

    		$account_details = AccountDetail::create([
    			'user_id' => $user_id,
    			'account_first_name'=>$request['first_name2'],
    			'account_no'=>$request['ac_number'],
    			'bank_name'=>$request['bank_name'],
    			'account_middle_name'=> $request['m_name2'],
    			'account_last_name'=> $request['last_name2']
    		]);

        $ref_no = $this->getref_code();

        if($request['currency_type'] == "Bitcoin") {
          $sender_name = "info@betaexchangeng.com";
          $subject = "Bitcoin new order!!";
          $desc ="Thank you for ordering BitCoin with BetaExchangeNg.com. Please kindly visit Your mail for more information";
          $title = "E-currency";
          $user=\Auth::user();

           $buy_bitcoin = BitCoin::create([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone_no' => $user->phone_no,
            'unit' => $input['units'],
            'total' => $input['total_units'],
            'wallet_id' => $input['wallet'],
            'method' => $input['payment_method'],
            'ref_no' => $ref_no
        ]);
        $register_user = \Auth::user();
        $this->notification($title, $sender_name, $subject, $desc);
        $this->send_verifycode($code);
        $this->notify_bitcoin_purchase($register_user,$input['units'],$ref_no, $input['wallet'], $input['total_units'], $input['payment_method']);
        //$this->testmail();
        //dd($input);
        return redirect()->intended('dashboard/confirm_order');


        }elseif ($request['currency_type'] == "Perfect Money") {

          $sender_name = "info@betaexchangeng.com";
          $subject = "PerfectMoney new order!!";
          $desc ="Thank you for ordering PerfectMoney with BetaExchangeNg.com. Please kindly visit Your mail for more information";
          $title = "E-currency";

          $buy_perfectmoney = PerfectMoney::create([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone_no' => $user->phone_no,
            'unit' => $input['units'],
            'total' => $input['total_units'],
            'account_name' => $input['pm_account_name'],
            'account_no' => $input['account_no'],
            'method' => $input['payment_method'],
            'ref_no' => $ref_no
          ]);

          $register_user = \Auth::user();
          $input = $request->all();
          $this->notification($title,$sender_name, $subject, $desc);
          $this->send_verifycode($code);
          $this->notify_perfect_purchase($register_user,$input['units'],$ref_no, $input['confirm_wallet'],$input['wallet'], $input['total_units'], $input['payment_method']);
          //$this->testmail();
        return redirect()->intended('dashboard/confirm_order');
        }
     

       

    		
    		
    	} else {
    		echo "not inserted";
    	}
    	
    }


    public function generate_code() {
        
          $characters='ABCDEFHJKLMNPQRSTUVWXYZ';  
      	  $pin=mt_rand(100,999).mt_rand(100,999).$characters[rand(0,strlen($characters)-3)];
      	  $verify_no=str_shuffle($pin);

     	   return $verify_no;
    }


    public function getref_code() {
       $characters='ABCDEFHJKLMNPQRSTUVWXYZ';  
      $pin=mt_rand(100000,999999).mt_rand(100000,999999).$characters[rand(0,strlen($characters)-3)];
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



     private function notify_bitcoin_purchase($user,$units,$ref_no,$wallet_id,$total_units,$method)
     {

          try
          {

              if($method == "1") {
                  $method = "Internet Bank Transfer";

              }else if ($method == "2"){
                  $method = "Bank Deposit";

              }else if ($method == "3"){
                  $method = "Short Code";
              }
     
              $data['user']=$user;
              $data['units']=$units;
              $data['ref_no']=$ref_no;
              $data['wallet_id']=$wallet_id;
              $data['total_units']=$total_units;
              $data['method']=$method;

             // $data['bank_details']= BankDetails::all();

             //dd($data);
              //user
             Mail::send('emails.buy_bitcoin_confirmation',$data, function($message)
             {
                 $message->to("anihuchenna16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Bitcoin new order!!');
             });

             //admin
             Mail::send('emails.buy_bitcoin',$data, function($message)
             {
                 $message->to("uchennaanih16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Bitcoin new order!!');
             });

       
          }catch(\Exception $e){
            // throw $e;
             return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
          }

     }


     private function send_verifycode($verifycode) {

      $data['user'] = Auth::user()->first_name;
      $data['verifycode'] = $verifycode;
      //dd($data);

        Mail::send('emails.verify_user', $data, function ($message){
            $message->to('uchennaanih16@gmail.com')
              ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Verification code');
        });
     }



     private function notify_perfect_purchase($user,$units,$ref_no,$account_name,$account_no,$total_units,$method)
    {

        try
        {
            if($method == "1") {
                $method = "Internet Bank Transfer";

            }else if ($method == "2"){
                $method = "Bank Deposit";

            }else if ($method == "3"){
                $method = "Short Code";
            }

            $data['user']=$user;
            $data['units']=$units;
            $data['total_units']=$total_units;
            $data['ref_no']=$ref_no;
            $data['account_name']=$account_name;
            $data['account_no']=$account_no;
            $data['method']=$method;

            //dd($data);
           // $data['bank_details']= BankDetails::all();
            //send mail to admin
            Mail::send('emails.buy_perfect_money',$data, function($message)
            {
                  $message->to("uchennaanih16@gmail.com")
                  ->bcc('info@betaexchangeng.com')
                  ->from('info@betaexchangeng.com')
                  ->subject('Perfect Money new order!!');
            });

            //send mail to user
            Mail::send('emails.buy_pm_confirmation',$data, function($message)
            {
                  $message->to("anihuchenna16@gmail.com")
                  ->bcc('info@betaexchangeng.com')
                  ->from('info@betaexchangeng.com')
                  ->subject('Perfect Money new order!!');
            });


        }
            catch(\Exception $e)
        {
            // throw $e;
            return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
        }

    }


    private function notification($title,$sender_name, $subject, $desc) {
      $message = notifyUser::create([
            'user_id'=> Auth::user()->id,
            'sender_name'=> $sender_name,
            'subject'=> $subject,
            'desc' => $desc,
            'title' => $title
      ]);
    }


    private function testmail() {
      $data = array('name' => "James");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to("uchennaanih16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Bitcoin new order!!');
      });

      echo "Base Email Sent. Check your inbox";
    }

}
