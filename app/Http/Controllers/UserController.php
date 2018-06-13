<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\BitCoin;
use App\Models\Price;
use App\Models\PerfectMoney;
use App\Helpers\Utility;
use App\Models\PurchasePerfectMoney;
use App\Models\PurchaseBitCoin;
use App\User;
use App\Models\AccountDetail;
use App\Http\Requests\BitcoinFormRequest;
use App\Confirm_buy_bitcoins;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;
use App\Confirm_buy_pm;
use DB;
use App\Confirm_sell_bitcoin;
use App\Confirm_sell_pm;
use App\notifyUser;

class UserController extends Controller
{
    public function userdashboard() {
    	$data["price"]=Price::first();
    	return view('dashboard.dashboardedit', $data);
    }

    public function pm_order() {
    	$user_id = Auth::user()->id;
        $data['id'] = $user_id;
    	$data['title'] = 'PerfectMoney';
        //$data['pmall'] = PurchasePerfectMoney::all();
    	$data['pm'] = PerfectMoney::where('user_id', $user_id)->get();
    	$data['modal_user'] =  PerfectMoney::where('user_id', $user_id)->get();
    	$data['pm_sold'] = PurchasePerfectMoney::where('user_id', $user_id)->get();
      $data['sell_pm'] = PurchasePerfectMoney::where('user_id', $user_id)->get();
      // dd($data);
    	return view('dashboard.pm_order', $data);
    }

    public function bitcoin_order() {
      $user_id = Auth::user()->id;
      $data['title']='Bitcoins';
      $data['bitcoins']=BitCoin::where('user_id', $user_id)->get();
      $data['modal_user'] =  BitCoin::where('user_id', $user_id)->get();
      $data['sold_bitcoins']=PurchaseBitCoin::where('user_id', $user_id)->get();
      $data['sell_bit'] = PurchaseBitCoin::where('user_id', $user_id)->get();
      // dd($data);
    	return view('dashboard.bitcoin_order', $data);
    }

    


    public function delete_order($id) {

    	$order = Bitcoin::find($id);
        $order->status = "4";

    	$order->save();
         return redirect()->back()->with(['message' =>'Successfully deleted!']);
    }


    public function delete_bitcoin_sell($id) {

        $order = PurchaseBitCoin::find($id);

        $order->status = "4";
        $order->save();
         return redirect()->back()->with(['message' =>'Purchase Cancelled']);
    }


     public function pm_delete_order($id) {

    	$order = PerfectMoney::find($id);

    	$order->status = "4";
        $order->save();
         return redirect()->back()->with(['message' =>'Successfully deleted!']);
    }

    public function pm_delete_sell($id) {
        //dd($id);
        $order = PurchasePerfectMoney::find($id);
        $order->status = "4";
        //dd($order);
        $order->save();
         return redirect()->back()->with(['message' =>'Successfully deleted!']);
    }


    public function profile() {
    	$user_id = Auth::user()->id;
        //dd($user_id);
        $data['user'] = User::where('id', $user_id)->get();
        $data['account_details'] = AccountDetail::where('user_id', $user_id)->get();
        $ac = AccountDetail::where('user_id', $user_id)->get();
        
        if(isset($ac[0]->account_no)) {
            $data['account_no'] = substr($ac[0]->account_no, 6);
        } 
         
       
        
        // dd(substr($ac[0]->account_no, 6));
    	
    	
    	return view('dashboard.profile', $data);
    }

    public function notification() {
        $id =Auth::user()->id;
        //dd($id);

         $data['msg'] = notifyUser::where('user_id', $id)->get();
         $data['modal_msg'] = notifyUser::where('user_id', $id)->get();
        //dd($data);
    	return view('dashboard.notification', $data);
    }


    public function confirm_buy_bitcoin(Request $request) {
        //$data = $request->all();
        //dd($data);
        $path = 'receipt_uploads';

             

        if($request->hasFIle('receipt_dir')) {
            $image = $request->file('receipt_dir');
            $filename = $image->getClientOriginalName();
             $fileExtension = $image->getClientOriginalExtension();
             $newfilename = Auth::user()->id . "." . $filename;

              // dd($request['purchase_id']);
             $save = Confirm_buy_bitcoins::create([
                'user_id' => Auth::user()->id,
                'date_sent'=> $request['date'],
                'transfer_details'=> $request['details_no'],
                'amount_paid'=>$request['amount_paid'],
                'depositor_name'=>$request['depositor_name'],
                'receipt_dir'=> $newfilename,
                'bitcoin_id'=>$request['purchase_id']
             ]);

             $bitcoin_id = $request['purchase_id'];

             if($save) {
                $sender_name = "BetaexchangeNg";
                $subject = "Confirm Bitcoin Payment!!";
                $desc ="Thanks for confirming your order, Your order is been processed...";
                $title = "BitCoin Payment Alert";

                $image->move($path, $newfilename);
                 $this->notice($title, $sender_name, $subject, $desc);
                $this->bitcoin_alert_status($bitcoin_id);
                $this->send_bitcoin_alert($request['date'], $request['details_no'], $request['amount_paid'],$request['depositor_name'], $newfilename);
            
             }
                
        } else {
            return redirect()->back()->with(['message'=>'upload receipt']);
        }
        
        return redirect()->back()->with(['message'=>'we will get back to you']);
    }


    public function confirm_pm(Request $request) {
        $data = $request->all();
        $path = 'pm_receipt_uploads';

        //dd($data);

        $this->validate($request, [
            'date' => 'required',
            'details_no' => 'required',
            'amount_paid' => 'required',
            'depositor_name' => 'required',
            'receipt_dir' => 'required|file|mimes:png,jpeg,pdf|max:2000'
        ]);

        if($request->hasFIle('receipt_dir')) {
            $image = $request->file('receipt_dir');
            $filename = $image->getClientOriginalName();
             $fileExtension = $image->getClientOriginalExtension();
             $newfilename = Auth::user()->id . "_" . $filename;


             $save = Confirm_buy_pm::create([
                'user_id' => Auth::user()->id,
                'date_sent'=> $request['date'],
                'details_no'=> $request['details_no'],
                'amount_paid'=>$request['amount_paid'],
                'depositor_name'=>$request['depositor_name'],
                'receipt_dir'=> $newfilename,
                'perfect_money_id' => $request['purchase_id']
             ]);

             if($save) {
                 $sender_name = "betaexchangeng";
                $subject = "Confirm Perfect Money Payment!!";
                $desc ="Thanks for confirming your order, Your order is been processed...";
                $title = "Perfect Money Payment Alert";

                $image->move($path, $newfilename);
                 $this->notice($title, $sender_name, $subject, $desc);
                $this->pm_alert_status($request['purchase_id']);
                $this->send_pm_alert($request['date'], $request['details_no'], $request['amount_paid'],$request['depositor_name'], $newfilename);

             }
                
        } else {
            return redirect()->back()->with(['message'=>'upload receipt']);
        }
        
        return redirect()->back()->with(['message'=>'we will get back to you']);

    }


    private function send_bitcoin_alert($date, $details_no, $amount_paid, $depositor_name,$filename) {

        $data['user'] = \Auth::user();
        $data['date'] = $date;
        $data['details_no'] = $details_no;
        $data['amount_paid'] = $amount_paid;
        $data['depositor_name'] = $depositor_name;
        $data['receipt_dir'] = $filename;

        //dd($data);

         Mail::send('emails.bitcoin_alert',$data, function($message)
             {
                 $message->to("anihuchenna16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Confirmation of order!!');
             });
    }


    private function send_pm_alert($date, $details_no, $amount_paid, $depositor_name,$filename) {

        $data['user'] = \Auth::user();
        $data['date'] = $date;
        $data['details_no'] = $details_no;
        $data['amount_paid'] = $amount_paid;
        $data['depositor_name'] = $depositor_name;
        $data['receipt_dir'] = $filename;

        //dd($data);

         Mail::send('emails.pm_alert',$data, function($message)
             {
                 $message->to("anihuchenna16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Confirmation of order!!');
             });
    }

    private function bitcoin_alert_status($id) {

        $bitcoin = Bitcoin::find($id);
        // $status = BitCoin::find($id);
        // $status->payment_alert = "Alert sent";
        $bitcoin->payment_alert = "alert sent";
        $bitcoin->save();
        
    }


     private function pm_alert_status($id) {

        
        // $status = BitCoin::find($id);
        // $status->payment_alert = "Alert sent";
        $status = DB::table("perfect_money")->where('id', $id)
                        ->update([
                            'payment_alert'=> "alert sent"
                        ]); 
    }

    public function confirm_sell_bitcoin(Request $request) {
        $data = $request->all();
        //dd($data);
         $this->validate($request, [
            'date_sent' => 'required',
            'hash' => 'required',
            'amount_sent' => 'required',
            'wallet_id' => 'required'
        ]);

         $sell = Confirm_sell_bitcoin::create([
                'user_id'=> Auth::user()->id,
                'date_sent'=> $request['date_sent'],
                'hash'=> $request['hash'],
                'amount_sent'=> $request['amount_sent'],
                'wallet_id' => $request['wallet_id'],
                'purchase_bitcoins_id' => $request['purchase_id']
         ]);

         if($sell) {
             $sender_name = "info@betaexchangeng.com";
            $subject = "Confirm Sold Bitcoin!!";
            $desc ="Thanks for confirming sold BitCoin, Your sells is been processed...";
           $this->update_bitsell_alert();
            $title = "Fund BitCoins Alert";
            $this->notice($title,$sender_name, $subject, $desc);
            $this->send_email($title,$request['date_sent'], $request['hash'], $request['amount_sent'], $request['wallet_id']);
         }

         return redirect()->back()->with(['message'=>'we will get back to you']);
    }


    public function confirm_sell_pm(Request $request) {

        $this->validate($request, [
            'date_sent' => 'required',
            'batch_number' => 'required',
            'amount_sent' => 'required',
            'wallet_id' => 'required'
        ]);
        //dd($request->all());
         $sell = Confirm_sell_pm::create([
                'user_id'=> Auth::user()->id,
                'date_sent'=> $request['date_sent'],
                'batch_number'=> $request['batch_number'],
                'amount_sent'=> $request['amount_sent'],
                'wallet_id' => $request['wallet_id'],
                'purchase_perfect_money_id' => $request['purchase_id']
         ]);

         if($sell) {
            $sender_name = "info@betaexchangeng.com";
            $subject = "Confirm Sold Perfect Money!!";
            $desc ="Thanks for confirming your sold Perfect Money, Your sells is been processed...";
           // $this->update_pmsell_alert();
            $title = "Fund PerfectMoney Alert";
            $this->notice($title, $sender_name,$subject,$desc);
             $this->update_pmsell_alert();
            $this->send_email($title, $request['date_sent'], $request['batch_number'], $request['amount_sent'], $request['wallet_id']);
         }

         return redirect()->back()->with(['message'=>'we will get back to you']);


    }


    private function update_bitsell_alert() {
        $id = Auth::user()->id;
        // $status = BitCoin::find($id);
        // $status->payment_alert = "Alert sent";
        $status = DB::table("purchase_bitcoins")->where('user_id', $id)
                        ->update([
                            'funding_alert'=> "alert sent"
                        ]);
       
    }

    private function update_pmsell_alert() {
        $id = Auth::user()->id;
        // $status = BitCoin::find($id);
        // $status->payment_alert = "Alert sent";
        $status = DB::table("purchase_perfect_money")->where('user_id', $id)
                        ->update([
                            'funding_alert'=> "alert sent"
                        ]);
       
    }


    private function send_email($title, $date_sent, $hash, $amount_sent, $wallet_id) {
        $data['user'] = \Auth::user();
        $data['title'] = $title;
        $data['date_sent'] = $date_sent;
        $data['hash'] = $hash;
        $data['amount_sent'] = $amount_sent;
        $data['wallet_id']=$wallet_id;

        //admin
        Mail::send('emails.alert',$data, function($message)
             {
                 $message->to("anihuchenna16@gmail.com")
                 ->bcc('info@betaexchangeng.com')
                 ->from('info@betaexchangeng.com')
                 ->subject('Confirmation of order!!');
             });
    }


    private function notice($title, $sender_name, $subject, $desc) {
      $message = notifyUser::create([
            'user_id'=> Auth::user()->id,
            'sender_name'=> $sender_name,
            'subject'=> $subject,
            'desc' => $desc,
            'title'=> $title
      ]);
    }


}
