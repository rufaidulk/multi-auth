<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setup()
    {

    	parent::setUp();
    	$this->withoutExceptionHandling();

    }

    public function logInUser($args = [])
    {
    	$user = factory(User::class)->create($args);

        $this->actingAs($user);

    }
}
