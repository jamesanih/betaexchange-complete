<?php

namespace App;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);
        
        $link = route('user.activate', $token);

               try
          {
     
         $data['link']=$link;
         Mail::send('emails.register', $data, function($message) use ($user)
        {
         $message->to($user->email)
         //->bcc("niyibrahym@gmail.com")
          ->subject('Welcome to betaexchangeng.com');
      });

    
    $data['user']=$user;
      Mail::send('emails.copy_admin',$data, function($message) use ($user)
        {
         $message->to("niyibrahym@gmail.com")
         ->bcc('info@betaexchangeng.com')
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


    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    public function getValidUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}