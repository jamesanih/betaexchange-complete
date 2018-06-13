<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\BankDetails;
use App\Helpers\Utility;
use App\Models\BitCoin;
use App\Models\PurchasePerfectMoney;
use App\Models\PurchaseBitCoin;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;


class SellCurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data['title']='Bitcoins';
    $data['bitcoins']=PurchaseBitCoin::latest('id')->get();
    $data['perfects']=PurchasePerfectMoney::latest('id')->get(); 
    return view('admin.sell.index',$data);
  }

  //opens purchase perfect money modal
  public function show($id)
  {
      $data['page_title']="Process ";
      $data['page_action']="Submit";
      $data['perfect_money']=PurchasePerfectMoney::find($id);
      $data['bank_details']=BankDetails::all();
      $data['payment_status']=Utility::ActivationStatus();


      return view('admin.sell.createOrUpdatePM',$data);
              
  }


  //opens purchase bitcoin modal
  public function edit($id)
  {
      $data['page_title']="Process ";
      $data['page_action']="Submit";
      $data['bitcoin']=PurchaseBitCoin::find($id);
      $data['bank_details']=BankDetails::all();
      $data['payment_status']=Utility::ActivationStatus();


      return view('admin.sell.createOrUpdateBitcoin',$data);
              
  }

  //saves purchase bitcoin modal details
  public function update($id, Request  $request)
  {
    try {
        $bitcoin = PurchaseBitCoin::find($id);
        if($bitcoin)
        {
            if (!empty($request['custom_status'])) {
                $initial_status=$bitcoin->status;
                $bitcoin->status = $request['custom_status'];
                $bitcoin->save();

                $account_name=$bitcoin->account_name;
                $email=$bitcoin->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($account_name,$units,$ref_no,$email,$status,$initial_status);

            }else if($request['status'] == "1"){
                $initial_status=$bitcoin->status;
                $bitcoin->status = "Processing..";
                $bitcoin->save();

                $account_name=$bitcoin->account_name;
                $email=$bitcoin->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($account_name,$units,$ref_no,$email,$status,$initial_status);

            }else if ($request['status'] == "2") {
                $initial_status=$bitcoin->status;
                $bitcoin->status = "Completed";
                $bitcoin->save();

                $account_name=$bitcoin->account_name;
                $email=$bitcoin->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($account_name,$units,$ref_no,$email,$status,$initial_status);
            }
            else if ($request['status'] == "3") {
                $initial_status=$bitcoin->status;
                $bitcoin->status = "Canceled";
                $bitcoin->save();

                $account_name=$bitcoin->account_name;
                $email=$bitcoin->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($account_name,$units,$ref_no,$email,$status,$initial_status);
            }
            else
            {
                $bitcoin->status = $bitcoin->status;
                $bitcoin->save();
            }


        }
     return  \Response::json(array('success' => true));
      
    } catch (Exception $e) {
      
    }
    
        $data['page_title']="Edit";
        $data['page_action']="Update";
        return view('admin.sell.createOrUpdateBitcoin',$data);
      
  }

  //saves purchase perfect money modal details
  public function create(Request  $request)
  {
      $perfect = PurchasePerfectMoney::find($request['id']);
      try {
          if($perfect)
          {
            if (!empty($request['custom_status'])) {
                $initial_status=$perfect->status;
                $perfect->status = $request['custom_status'];
                $perfect->save();

                $account_name=$perfect->account_name;
                $email=$perfect->email;
                $units=$perfect->unit;
                $ref_no=$perfect->ref_no;
                $total=$perfect->total;
                $status=$perfect->status;

                $this->notify_perfect_approval($account_name,$units,$ref_no,$email,$status,$initial_status);

            }else if($request['status'] == "1"){
                $initial_status=$perfect->status;
                $perfect->status = "Processing..";
                $perfect->save();

                $account_name=$perfect->account_name;
                $email=$perfect->email;
                $units=$perfect->unit;
                $ref_no=$perfect->ref_no;
                $total=$perfect->total;
                $status=$perfect->status;

                $this->notify_perfect_approval($account_name,$units,$ref_no,$email,$status,$initial_status);

            }else if ($request['status'] == "2") {
                $initial_status=$perfect->status;
                $perfect->status = "Completed";
                $perfect->save();

                $account_name=$perfect->account_name;
                $email=$perfect->email;
                $units=$perfect->unit;
                $ref_no=$perfect->ref_no;
                $total=$perfect->total;
                $status=$perfect->status;

                $this->notify_perfect_approval($account_name,$units,$ref_no,$email,$status,$initial_status);
            }
            else if ($request['status'] == "3") {
                $initial_status=$perfect->status;
                $perfect->status = "Canceled";
                $perfect->save();

                $account_name=$perfect->account_name;
                $email=$perfect->email;
                $units=$perfect->unit;
                $ref_no=$perfect->ref_no;
                $total=$perfect->total;
                $status=$perfect->status;

                $this->notify_perfect_approval($account_name,$units,$ref_no,$email,$status,$initial_status);
            }
            else
            {
                $perfect->status = $perfect->status;
                $perfect->save();
            }


        }
     return  \Response::json(array('success' => true));
      
    } catch (Exception $e) {
      
    }
    
        $data['page_title']="Edit";
        $data['page_action']="Update";
        return view('admin.sell.createOrUpdateBitcoin',$data);
      
  }

  private function notify_perfect_approval($account_name,$units,$ref_no,$email,$status,$initial_status)
   {
      try
      {
        $data['account_name']=$account_name;
        $data['units']=$units;
        $data['ref_no']=$ref_no;
        $data['status']=$status;
        $data['initial_status']=$initial_status;
        Mail::send('emails.perfect_purchase_approved',$data, function($message) use ($email){
          $message->to($email)
          ->bcc("niyibrahym@gmail.com")
          ->from('info@betaexchangeng.com')
          ->subject('Perfect Money order update!!');
        });

   
      }
      catch(\Exception $e)
      {
      // throw $e;
       return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
      }

   }

  private function notify_bitcoin_approval($account_name,$units,$ref_no,$email,$status,$initial_status)
   {
      try
      {
        $data['account_name']=$account_name;
        $data['units']=$units;
        $data['ref_no']=$ref_no;
        $data['status']=$status;
        $data['initial_status']=$initial_status;
        Mail::send('emails.purchase_bitcoin_approved',$data, function($message) use ($email){
          $message->to($email)
          ->bcc("niyibrahym@gmail.com")
          ->from('info@betaexchangeng.com')
          ->subject('Bitcoin order update!!');
        });

   
      }
      catch(\Exception $e)
      {
      // throw $e;
       return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
      }

   }
  
}

?>