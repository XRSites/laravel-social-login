<?php

namespace Tests\Feature\App;

use Tests\TestCase;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2017-12-16 at 16:44:41.
 */
class LoginControllerTest extends TestCase
{

    use DatabaseMigrations;
    //use DatabaseTransactions;

    /**
     * @covers App\Http\Controllers\Auth\LoginController::auth
     * @todo   Implement testAuth().
     */
    public function testAuth()
    {
        $provider = \Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('redirect')->andReturn('Redirected');
        $provider->shouldReceive('with')
            ->with(["access_type" => "offline", "prompt" => "consent select_account"])->andReturnSelf();
        Socialite::shouldReceive('driver')->once()->with('google')->andReturn($provider);
        $response = $this->get('/login/google');
        $response->assertSuccessful();
    }

    public function testCallback()
    {

        $abstractUser = \Mockery::mock('Laravel\Socialite\Two\User');

        $abstractUser->id = rand();
        $abstractUser->email = str_random(10) . '@noemail.app';
        $abstractUser->name = str_random(10);
        $abstractUser->avatar = 'https://en.gravatar.com/userimage';
        $abstractUser->token = str_random(32);
        $abstractUser->refreshToken = str_random(32);
        // Get the api user object here
        $abstractUser->shouldReceive('getId')
            ->andReturn($abstractUser->id)
            ->shouldReceive('getEmail')
            ->andReturn($abstractUser->email)
            ->shouldReceive('getName')
            ->andReturn($abstractUser->name)
            ->shouldReceive('getAvatar')
            ->andReturn($abstractUser->avatar)
            ->shouldReceive('getToken')
            ->andReturn($abstractUser->token);

        $provider = \Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        Socialite::shouldReceive('driver')->with('facebook')->andReturn($provider);

        // After Oauth redirect back to the route
        $response = $this->get('/login/facebook/callback');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }
}
