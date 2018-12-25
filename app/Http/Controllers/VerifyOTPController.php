<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\OTPResendRequest;
use App\Http\Requests\OTPRequest;

class VerifyOTPController extends Controller
{
    
	public function verify(OTPRequest $request)
	{
		
		if (request('OTP') == auth()->user()->OTP()) {
			
			auth()->user()->update(['isVerified' => true]);
			return redirect('/home');
		}

		return back()->withErrors('OTP is expired or invalid');

	}

	public function resend(OTPResendRequest $request)
	{
		$user = new User::;

		$user->sendOTP($request);

		return redirect('/verifyOTP');
	}

	public function showVerifyForm()
	{
		return view('verify');
	}


}
