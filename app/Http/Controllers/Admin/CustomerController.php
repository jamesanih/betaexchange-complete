<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\NextOfKin;
use App\Helpers\Utility;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class CustomerController extends Controller
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
    $data['title']='Customers';
    $data['users']=User::where('isAdmin','=',false)
    ->with("account_detail","next_kin")->get();
   
    return view('admin.customers.index',$data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  
        $data['page_title']="Add";
        $data['page_action']="Save";
     return view('admin.customers.createOrUpdate',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request  $request)
  {
  /*   try {
     $input=$request->all();
   
  Feed::create($input);

  return  \Response::json(array('success' => true));
            
        } catch (Exception $e) {
            
        }
        $data['page_title']="Add";
        $data['page_action']="Save";
      return view('feed.createOrUpdate',$data);*/
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
           // get the Device
       $data['status']=Utility::Status();
       $data['user']=User::find($id);
        // show the view and pass the device to it
        return view('admin.customers.delete',$data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
        $user = User::find($id);
        $data['page_title']="View";
        $data['page_action']="Update";
        $data['status']=Utility::Status();
        $data['user']=User::find($id);
        $data['next_of_kin']=NextOfKin::where('user_id','=',$id)->first();

        return view('admin.customers.createOrUpdate',$data);
        
  }


      private function notify_activation($user)
     {

          try
          {
     

     $data['user']=$user;
      Mail::send('emails.account_activation',$data, function($message) use ($user)
        {
         $message->to($user->email)
         ->bcc("niyibrahym@gmail.com")
         ->from('info@betaexchangeng.com')
            ->subject('Betaexchangeng Account Activated!!');
      });

       
     }
         catch(\Exception $e)
          {
            // throw $e;
             return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
            }

     }


      private function notify_deactivation($user)
     {

          try
          {
     

            $data['user']=$user;
            Mail::send('emails.account_deactivation',$data, function($message) use ($user)
            {
                $message->to($user->email)
                ->bcc("niyibrahym@gmail.com")
                ->from('info@betaexchangeng.com')
                ->subject('Betaexchangeng Account Deactivated');
            });

       
        }
         catch(\Exception $e)
          {
            // throw $e;
             return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
            }

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
          $user = User::find($id);
          if($user){
              if ($request['activation_status'] == "1") {
                  $user->activation_status = "Registered";
                  $user->save();
              }elseif ($request['activation_status'] == "2") {
                  $user->activation_status = "Confirmed";
                  $user->save();
              }elseif ($request['activation_status'] == "3") {
                  $user->activation_status = "Activated";
                  $user->save();
                  $this->notify_activation($user);
              }elseif ($request['activation_status'] == "4") {
                  $user->activation_status = "Deactivated";
                  $user->save();
                  $this->notify_deactivation($user);
              }
          }
          return  \Response::json(array('success' => true));

      } catch (Exception $e) {

      }

      $data['page_title']="Edit";
      $data['page_action']="Update";
      return view('admin.customers.createOrUpdate',$data);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $user = User::find($id);
     if($user)
     {
       // delete
      $user->delete();

      return  redirect('/administrator/customer');
     }
    
     App::abort(404);
  }
  
}

?>