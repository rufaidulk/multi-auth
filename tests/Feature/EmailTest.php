<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EmailTest extends TestCase
{   
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function anOtpEmailIsSendWhenUserIsLoggedIn()
    {	
    	Mail::fake();
    	$this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $res = $this->post('/login', ['email' => $user->email, 'password' => 'secret']);
        Mail::assertSent(OTPMail::class);


    }

    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function anOtpEmailIsNotSendIfCredentialsAreIncorrect()
    {   
        Mail::fake();
        //$this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $res = $this->post('/login', ['email' => $user->email, 'password' => 'secreeee']);
        Mail::assertNotSent(OTPMail::class);


    }
}
