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
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/home')->assertRedirect('/');
    }

    /**
     * A basic test example.
     *
     * @return void
     * @test 
     */
    public function afterLoginUserCanAccessTheHomePageIfVerified()
    {
        $user = factory(User::class)->create(['isVerified' => 1]);

        $this->actingAs($user);

        $this->get('/home')->assertStatus(200);
    }

}
