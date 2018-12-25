@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter OTP</div>

                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <div class="card-body">
                    <form action="/verifyOTP" method="post">
                        
                        @csrf

                        <div class="form-group">
                            <label for="otp">YOUR OTP</label>
                            <input type="text" name="OTP" id="otp" class="form-control" required>
                        </div>
                        <input type="submit" value="Verify" class="btn btn-info">

                    </form>
                    <form action="/resendOTP" method="post">
                        
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="otpVia" id="sms" value="viaSms">

                                    <label class="form-check-label" for="sms">
                                        OTP Via SMS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="otpVia" id="otpemail" value="viaEmail" checked>

                                    <label class="form-check-label" for="otpemail">
                                        OTP Via Email
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resend OTP') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
