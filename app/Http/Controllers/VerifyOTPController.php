<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\OTPVerifyRequest;

class VerifyOTPController extends Controller
{
    
	public function verify()
	{

		if (request('OTP') === Cache::get('OTP')) {
			
			auth()->user()->update(['isVerified' => true]);
			return redirect('/home');
		}


	}

	public function showVerifyForm()
	{
		return view('verify');
	}


}
