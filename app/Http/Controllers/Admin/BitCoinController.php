<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Confirm_buy_bitcoins;
use App\Helpers\Utility;
use App\Models\BitCoin;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class BitCoinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data['title']='Bitcoins';
    $data['users']=User::where('isAdmin','=',false)
    ->with("account_detail","next_kin")->get();
    $data['bitcoins']=BitCoin::latest('id')->get();
   
    return view('admin.bitcoins.index',$data);
  }



    private function notify_bitcoin_approval($user,$units,$ref_no,$email,$status,$initial_status)
     {

        try
        {
     
          $data['user']=$user;
          $data['units']=$units;
          $data['ref_no']=$ref_no;
          $data['initial_status']=$initial_status;
          $data['status']=$status;
          Mail::send('emails.bitcoin_approved',$data, function($message) use ($email){
            $message->to($email)
            ->bcc("niyibrahym@gmail.com")
            ->from('info@betaexchangeng.com')
            ->subject('Bitcoin order status changed!!');
          });

       
      }
      catch(\Exception $e)
      {
        // throw $e;
         return redirect()->back()->withErrors( "Unable to send emails. Pls try again")->withInput();
      }

     }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $bitcoin=BitCoin::find($id);
      $data['alert_details']=Confirm_buy_bitcoins::where('bitcoin_id', $id)->get();
      $data['user']=User::find($bitcoin->user_id);
      $data['page_title']="Process ";
      $data['page_action']="Process Order";
      $data['status']=Utility::Status();
      $data['payment_status']=Utility::ActivationStatus();
      $data['bitcoin']=$bitcoin;

    return view('admin.bitcoins.createOrUpdate',$data);
              
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request  $request)
  {
    try {
        $bitcoin = BitCoin::find($id);
        $initial_status = $bitcoin->status;
        if($bitcoin)
        {
            if (!empty($request['custom_status'])) {
                $bitcoin->status = $request['custom_status'];
                $bitcoin->save();

                $user=User::find($bitcoin->user_id);
                $email=$user->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($user,$units,$ref_no,$email,$status,$initial_status);

            }else if($request['status'] == "1"){
                $bitcoin->status = "Processing..";
                $bitcoin->save();

                $user=User::find($bitcoin->user_id);
                $email=$user->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($user,$units,$ref_no,$email,$status,$initial_status);

            }else if ($request['status'] == "2") {
                $bitcoin->status = "Completed";
                $bitcoin->save();

                $user=User::find($bitcoin->user_id);
                $email=$user->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($user,$units,$ref_no,$email,$status,$initial_status);
            }
            else if ($request['status'] == "3") {
                $bitcoin->status = "Canceled";
                $bitcoin->save();

                $user=User::find($bitcoin->user_id);
                $email=$user->email;
                $units=$bitcoin->unit;
                $ref_no=$bitcoin->ref_no;
                $total=$bitcoin->total;
                $status=$bitcoin->status;

                $this->notify_bitcoin_approval($user,$units,$ref_no,$email,$status,$initial_status);
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
      return view('admin.bitcoins.createOrUpdate',$data);
  }


  
}

?>