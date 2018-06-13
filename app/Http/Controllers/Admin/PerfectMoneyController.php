<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers\Utility;
use App\Models\PerfectMoney;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class PerfectMoneyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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
    $data['perfects']=PerfectMoney::latest('id')->get(); 
   
    return view('admin.perfect_money.index',$data);
  }
  
    private function perfect_approved($user,$units,$ref_no,$email,$status,$initial_status)
     {

          try
          {
     
            $data['user']=$user;
            $data['units']=$units;
            $data['ref_no']=$ref_no;
            $data['status']=$status;
            $data['initial_status']=$initial_status;
            Mail::send('emails.perfect_money_approved',$data, function($message) use ($email){

            $message->to($email)
            ->bcc("niyibrahym@gmail.com")
            ->from('info@betaexchangeng.com')
            ->subject('Perfect Money order status changed!!');
      });

       
     }
         catch(\Exception $e)
          {
            // throw $e;
            return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
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
      $perfect=PerfectMoney::find($id);   
      $data['page_title']="Process ";
      $data['page_action']="Activate";
      $data['status']=Utility::Status();
      $data['payment_status']=Utility::ActivationStatus();
      $data['user']=User::find($perfect->user_id);
      $data['perfect']=$perfect;

    return view('admin.perfect_money.createOrUpdate',$data);
        
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,Request $request)
  {

    try {
        $perfect = PerfectMoney::find($id);
        $initial_status = $perfect->status;
        if($perfect)
        {
          if (!empty($request['custom_status'])) {
              $perfect->status = $request['custom_status'];
              $perfect->save();

              $user=User::find($perfect->user_id);
              $units=$perfect->unit;
              $ref_no=$perfect->ref_no;
              $total=$perfect->total;
              $status=$perfect->status;
              $email=$user->email;

              $this->perfect_approved($user,$units,$ref_no,$email,$status,$initial_status);

          }else if($request['status'] == "1"){
              $perfect->status = "Processing..";
              $perfect->save();

              $user=User::find($perfect->user_id);
              $units=$perfect->unit;
              $ref_no=$perfect->ref_no;
              $total=$perfect->total;
              $status=$perfect->status;
              $email=$user->email;

              $this->perfect_approved($user,$units,$ref_no,$email,$status,$initial_status);

          }else if ($request['status'] == "2"){
              $perfect->status = "Completed";
              $perfect->save();

              $user=User::find($perfect->user_id);
              $units=$perfect->unit;
              $ref_no=$perfect->ref_no;
              $total=$perfect->total;
              $status=$perfect->status;
              $email=$user->email;

              $this->perfect_approved($user,$units,$ref_no,$email,$status,$initial_status);

          }else if ($request['status'] == "3"){
              $perfect->status = "Canceled";
              $perfect->save();

              $user=User::find($perfect->user_id);
              $units=$perfect->unit;
              $ref_no=$perfect->ref_no;
              $total=$perfect->total;
              $status=$perfect->status;
              $email=$user->email;

              $this->perfect_approved($user,$units,$ref_no,$email,$status,$initial_status);

          }else{
              $perfect->status = $perfect->status;
              $perfect->save();
          }


        }
        return  \Response::json(array('success' => true));
      
    } catch (Exception $e) {
      
    }
    
        $data['page_title']="Edit";
        $data['page_action']="Update";
     return view('admin.perfect_money.createOrUpdate',$data);
  }


  
}

?>