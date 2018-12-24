<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{   
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function afterLoginUserCannotAccessTheHomePageUntilVerified()
    {
        $this->logInUser();
        $this->get('/home')->assertRedirect('/verifyOTP');
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function afterLoginUserCanAccessTheHomePageIfVerified()
    {
        $this->logInUser(['isVerified' => 1]);

        $this->get('/home')->assertStatus(200);
    }

}
