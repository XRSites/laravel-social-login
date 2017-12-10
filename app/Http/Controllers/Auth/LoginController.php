<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;

use App\LoginUser;
use App\Exceptions\SocialAuthException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    protected $loginUser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginUser $loginUser)
    {
        $this->middleware('guest')->except('logout');
        $this->loginUser = $loginUser;
    }
    
    /**
     * Specific Route to Socialite's Login
     * 
     * @param type $provider
     * @return type
     */
    public function auth($provider)
    {
        return $this->loginUser->authenticate($provider);
    }
 
    public function login($provider)
    {
        Log::info('Login user with: '.$provider);
        try {
            return $this->loginUser->login($provider);
        } catch (SocialAuthException $e) {
            return redirect()->route('login')
                ->with('flash-message', $e->getMessage());
        }
    }
 
    public function logout()
    {
       auth()->logout();
       return redirect()->to('/'); 
    }
}
