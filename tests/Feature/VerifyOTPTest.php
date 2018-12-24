<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VerifyOTPTest extends TestCase
{	
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function userCanSubmitOtpAndGetVerified()
    {
        
        $this->logInUser();
        $OTP = auth()->user()->cacheTheOTP();
        $this->post('/verifyOTP', [auth()->user()->OTPKey() => $OTP])->assertStatus(302);
        $this->assertDatabaseHas('users', ['isVerified' => 1]);
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function userCanSeeOtpVerifyPage()
    {
        
        $this->logInUser();
        $this->get('/verifyOTP')
            ->assertStatus(200)
            ->assertSee('Enter OTP');
    }



}
