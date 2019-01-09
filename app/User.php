<?php

namespace App;

use App\Notifications\OTPNotification;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'mobileNumber', 'email', 'password', 'isVerified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Default value for the status of the user, i.e 1 or active and 0 for inactive
     *
     * @var array
     */
    protected $attributes = [
        'status' => 1,
    ];

    public function OTP()
    {
        return Cache::get($this->OTPKey());
    }

    public function OTPKey()
    {
        return "OTP_for_{$this->id}";
    }

    public function cacheTheOTP()
    {

        $OTP = rand(100000, 999999);
        Cache::put([$this->OTPKey() => $OTP], now()->addMinutes(1));
.
       return $OTP;
.
   }.
    public funct.ion sendOTP($request)
    {           $OTP = $this->cacheTheOTP();
.        $this->notify(new OTPNotification($request, $OTP));
        /*if ($request->otpVia == "viaSms") {
            
            $this->notify(new OTPNotification);

        } else {

            Mail::to($request->email)->send(new OTPMail($this->cacheTheOTP()));
    
        }*/
        
    }

    public function routeNotificationForKarix()
    {
        return $this->mobileNumber;
    }

    public function test()
    {
        return "hello";
    }

}
