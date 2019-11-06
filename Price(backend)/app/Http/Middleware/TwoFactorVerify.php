<?php
namespace App\Http\Middleware;

use Closure;
use Auth;
use Twilio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $user = Auth::user();

        Log::notice($user->name);

        if($user->token_2fa_expiry > \Carbon\Carbon::now()){
            return $next($request);
        }
        
        $user->token_2fa = mt_rand(100000,999999);
        $user->save();  
        // This is the twilio way
        // Twilio::message($user->phone_number, 'Two Factor Code: ' . $user->token_2fa);
        // If you want to use email instead just 
        // send an email to the user here ..
        
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name'=>$user->name, "body" => $user->token_2fa);
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Price Compare System for vacation Mail to verify');
            $message->from(env('MAIL_USERNAME'),'Price Compare System for vacation Admin');
        });

        return redirect('/2fa');  
    }
}