<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notifyUser;
use App\Models\BitCoin;
use App\Models\PerfectMoney;
use App\Models\PurchaseBitCoin;
use App\Models\PurchasePerfectMoney;
use App\Confirm_sell_bitcoin;
use App\Confirm_sell_pm;
use App\Confirm_buy_bitcoins;
use App\Confirm_buy_pm;


class NotifyUserController extends Controller
{
    public function Viewmsg($id) {
    	$msg = notifyUser::find($id);
    	//dd($msg);
    	 $data['page_title']="Confirm Alert";
    	 $data['msg'] = notifyUser::find($id);

    	 return view('modals.message_modal',$data);

    }


    public function delete_msg($id) {

    	$order = notifyUser::find($id);

    	$order->delete();
         return redirect()->back()->with(['message' =>'Successfully deleted!']);
    }


    public function viewBitcoin($id) {
        //$data = BitCoin::find($id);
        //dd($id);
        $data['page_title'] = "BitCoin" ;
        $data['buy_details'] = BitCoin::find($id);
        $data['conf_details'] = Confirm_buy_bitcoins::where('bitcoin_id', $id)->get();
        //dd($data);
        return view('modals.bt_confirm_model', $data);
    }

    public function viewsellBitcoin($id) {
        //$data = PurchaseBitCoin::find($id);
        //dd($data);
        $data['page_title'] = "Bitcoin";
        $data['sale_details'] = PurchaseBitCoin::find($id);
        $data['conf_details'] = Confirm_sell_bitcoin::where('purchase_bitcoins_id', $id)->get();
        //dd($data);
        return view('modals.bt_confirm_sells_modal', $data);
    }

    public function viewPm($id) {
        $data['page_title'] = "Perfect Money";
        $data['buy_pm'] = PerfectMoney::find($id);
        $data['conf_details'] = Confirm_buy_pm::where('perfect_money_id', $id)->get();
        //dd($data);

        return view('modals.pm_confirm_modal', $data);
    }

    public function confirm_sold($id) {
        $data['sold_pm'] = PurchasePerfectMoney::find($id);
        //dd($data);
        return view('modals.pm_sell_modal', $data);
    }

    //  public function confirm_sold($id) {
    //     $data['sold_pm'] = PerfectMoney::find($id);
    //     //dd($data);
    //     return view('modals.pm_modal', $data);
    // }

     public function Confirm_buypm($id) {
        $data['pm'] = PerfectMoney::find($id);
        //dd($data);
        return view('modals.pm_modals', $data);
    }

    public function confirm_bit($id) {
        $data['bit'] = BitCoin::find($id);
        // dd($data);
        return view('modals.bit_modal', $data);
    }

     public function load_confirmbitsell($id) {
        $data['bitsell'] = PurchaseBitCoin::find($id);
        //dd($data);
        return view('modals.bitsell_modal', $data);
    }

    public function pm_details($id) {
        $data['page_title'] = "Perfect Money";
        $data['sold_pm'] = PurchasePerfectMoney::find($id);
        //dd(PurchasePerfectMoney::find($id));
        $data['conf_details'] = Confirm_sell_pm::where('purchase_perfect_money_id', $id)->get();
        

        return view('modals.pmsell', $data);
    }
}
