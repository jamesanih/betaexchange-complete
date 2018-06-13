<?php

// namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Helpers\Utility;
use App\Models\Price;
use App\Models\PurchaseBitCoin;
use App\Models\PurchasePerfectMoney;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["price"]=Price::first();
        return view('home.index',$data);
    }

    public function about()
    {
        return view('home.about');
    }

    public function buy()
    {
        return view('home.buy');
    }

    public function sell()
    {
        $data['banks']=Utility::GetBanks();
        $data['pm_price']=Price::find(1)->perfect_money_sell;
        $data['bitcoin_price']=Price::find(1)->bitcoin_sell;
        $data['currency_type']=Utility::CurrencyType();
        return view('home.sell',$data);
    }

     public function buy_ecurrency()
    {
        $data['banks']=Utility::GetBanks();
        $data['pm_price']=Price::find(1)->perfect_money_buy;
        $data['bitcoin_price']=Price::find(1)->bitcoin_buy;
        $data['currency_type']=Utility::CurrencyType();
        return view('home.buy_ecurrency',$data);
    }

        public function sell_currency(Request $request)
        {

        try {
            
        
       $input=$request->all();
       if($input["currency_type"]=="Bitcoin")
       {
       $next=PurchaseBitCoin::create([
            'account_name' => $input['account_name'],
            'account_no' => $input['account_no'],
            'bank_name' => $input['bank_name'],
            'phone_no' => $input['phone_no'],
            'email' => $input['email'],
            'unit' => $input['unit'],
            'price' => $input['price1'],
            'total' => $input['total'],
            'wallet_id' => $input['wallet_id'],
            'ref_no' => 1
        ]);

        $user=array('account_name' =>$input['account_name'] ,       
        'account_no' =>$input['account_no'] ,
        'bank_name' =>$input['bank_name'] ,
        'phone_no' =>$input['phone_no'] ,
        'email' =>$input['email'] ,
        'unit' =>$input['unit'] ,
        'price' =>$input['price1'] ,
        'total' =>$input['total']);

         $this->notify_currency_sales($user,"Bitcoin");


       }
       else if($input["currency_type"]=="Perfect Money")
       {
         $next=PurchasePerfectMoney::create([
            'account_name' => $input['account_name'],
            'account_no' => $input['account_no'],
            'bank_name' => $input['bank_name'],
            'phone_no' => $input['phone_no'],
            'email' => $input['email'],
            'unit' => $input['unit'],
            'price' => $input['price1'],
            'total' => $input['total'],
            'ref_no' => 2
        ]);
      
          $user=array('account_name' =>$input['account_name'] ,       
        'account_no' =>$input['account_no'] ,
        'bank_name' =>$input['bank_name'] ,
        'phone_no' =>$input['phone_no'] ,
        'email' =>$input['email'] ,
        'unit' =>$input['unit'] ,
        'price' =>$input['price1'] ,
        'total' =>$input['total']);
         $this->notify_currency_sales($user,"Perfect Money");

       }
       return redirect('/how-to-sell')->with('status', 'Transaction successfull! Thanks, We shall get in touch soon.');
 
         }
          catch(\Exception $e)
          {
          
             throw $e;
            }
      return redirect()->intended('/how-to-sell');
    }




    public function contact()
    {
        return view('home.contact');
    }

    public function policy()
    {
        return view('home.policy');
    }

    public function terms()
    {
        return view('home.terms_conditions');
    }

    public function disclamers()
    {
        return view('home.disclamers');
    }

     public function testimonial()
    {
        return view('home.testimonial');
    }
    public function blog()
    {
        $data['posts']=BlogPost::with('comments')->with('user')->get();;
        return view('home.blog',$data);
    }

    public function full_post($id)
    {
         $data['title']='Posts';
         $data['post']=BlogPost::with('comments')->find($id);
      return view('home.full_post',$data);
    }


     public function show_comments_by_post($id)
    {
          $data['comments']=BlogComment::with('user')->
          where('post_id','=',$id)->get();
         return redirect('portal.blog.blog_detail',$data);
    }


    public function save_comment(Request $request)
    {
          $input=$request->all();
         // var_dump($input);
         $input['user_id']=Auth::user()->id;
        BlogComment::create($input);
        return  redirect()->back();
    }



     public function verification()
    {
        return view('home.verify');
    }

    public function next_kin()
    {
       
    }

    public function account_activation()
    {
        return view('home.account_activation');
    }

    public function login()
    {
        return view('auth.login');
    }


         private function notify_currency_sales($user,$ctype)
        {

          try
          {
     
     $data['user']=$user;
     $data['ctype']=$ctype;
      Mail::send('emails.sell_currency',$data, function($message) use ($user)
        {
         $message->to("ayo2000us@yahoo.com")
         ->bcc('info@betaexchangeng.com')
        // ->from('info@betaexchangeng.com')
            ->subject('Sell E-currency to us!!');
      });

       
     }
         catch(\Exception $e)
          {
            // throw $e;
             return redirect()->back()->withErrors( "Unable to send emails. Pls try again") ->withInput();
            }

     }

}
