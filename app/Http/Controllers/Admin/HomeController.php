<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Price;
use App\Models\BitCoin;
use App\Models\PerfectMoney;
use App\Models\PurchaseBitCoin;
use App\Models\PurchasePerfectMoney;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_bitcoin = BitCoin::count();
        $total_perfect = PerfectMoney::count();
        $new_bitcoin = BitCoin::where('payment_alert', 'alert sent')->where('status', 'Processing..')->count();
        $new_perfect = PerfectMoney::where('payment_alert', 'alert sent')->where('status', 'Processing..')->count();
        $new_purchase_bitcoin = PurchaseBitCoin::where('funding_alert', 'alert sent')->where('status', 'Processing..')->count();
        $new_purchase_perfect = PurchasePerfectMoney::where('funding_alert', 'alert sent')->where('status', 'Processing..')->count();
        $total_purchase_bitcoin = PurchaseBitCoin::count();
        $total_purchase_perfect = PurchasePerfectMoney::count();

        $data['price']=Price::first();
        $data['total_customers']=User::count();
        $data['new_orders']= $new_bitcoin + $new_perfect + $new_purchase_bitcoin + $new_purchase_perfect;
        $data['buy_orders']= $total_bitcoin + $total_perfect;
        $data['sell_orders']= $total_purchase_bitcoin + $total_purchase_perfect;
        return view('admin.index',$data);
    }

    public function new_orders()
    {
        $bitcoin = BitCoin::where('payment_alert', 'alert sent')->where('status', 'Processing..')->get();
        $perfect = PerfectMoney::where('payment_alert', 'alert sent')->where('status', 'Processing..')->get();
        $purchase_bitcoin = PurchaseBitCoin::where('funding_alert', 'alert sent')->where('status', 'Processing..')->get();
        $purchase_perfect = PurchasePerfectMoney::where('funding_alert', 'alert sent')->where('status', 'Processing..')->get();

        $data['bitcoins']= $bitcoin;
        $data['perfect_money']= $perfect;
        $data['purchase_bitcoins']= $purchase_bitcoin;
        $data['purchase_perfect_money']= $purchase_perfect;
        return view('admin.new_orders',$data);
    }
      
    public function update_rates(Request  $request)
    {

    $price = Price::find(1);
     if($price)
     {
      
     $price->bitcoin = $request['bitcoin'];
     $price->perfect_money = $request['perfect_money'];
     $price->bitcoin_sell = $request['bitcoin_sell'];
     $price->perfect_money_sell = $request['perfect_money_sell'];
     $price->save(); 
    }
     return redirect("/administrator");

  }

    public function change_password()
    {
        return view('admin.change_password');
    }


    public function save_password(Request $request)
    {
        try {
            //validate the form
            $this->validate(request(), [
                'old_password' => 'required',
                'password' => 'required|confirmed',
                'secret_pin' => 'required'
            ]);

            $user = Auth::user();
            $input_password = $request["old_password"];
            $new_password = $request["password"];
            $secret_pin = $request["secret_pin"];

            $credentials = [
                'email' => $user->email,
                'password' => $input_password,
            ];

            //authenticate details
            if (auth()->attempt($credentials))
            {
                if($user->secret_pin == $secret_pin){

                    $user->password = bcrypt($new_password);
                    $user->save();

                    Auth::logout();
                    return redirect('/login');
                }else{
                    return redirect()->back()->withErrors("Incorrect pin.")->withInput();
                }


            }else{
                return redirect()->back()->withErrors("Old password doesn't match.")->withInput();
            }
 
        }catch(ValidationException $e){
           // Rollback and then redirect // back to form with errors
           return redirect()->back()->withErrors( $e->getErrors() )->withInput();
        }
    }

}
