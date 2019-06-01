<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Socialite;
use Illuminate\Support\Facades\Session;

class LoginUser {

    public function authenticate($provider) {
        return Socialite::driver($provider)
            ->with(["access_type" => "offline", "prompt" => "consent select_account"])
            ->scopes(['read:user', 'public_repo', 'offline_access'])
            ->redirect();
    }

    public function login($provider = 'google') {
        $provider_user = Socialite::driver($provider)->user();

        //setup the oauth identity
        $oauth_identity = OauthIdentity::firstOrNew(['provider' => $provider, 'provider_user_id' => $provider_user->id]);

        //setup the email
        $email = Email::firstOrNew(['email' => $provider_user->email]);

        // if we have an oauth user.. then grab that user.. if we don't then try and find the user via email (or just make a new user)
        if ($oauth_identity->user_id) {
            $user = User::find($oauth_identity->user_id);
        } else {
            $user = User::firstOrNew(['id' => $email->user_id]);
        }

        // save tokens
        $oauth_identity->access_token = $provider_user->token;
        $oauth_identity->refresh_token = $provider_user->refreshToken;

        // if we don't have a user id, then it is a new user.. fill from the provider..
        if (!$user->id) {
            $user->name = $provider_user->name;
            $user->avatar = $provider_user->avatar;
            $user->confirmed = 0;
            $email->is_primary = 1;
        }

        // if the user exists already, but isn't active then activate and grab the avatar.  
        // (this is for the scenario where someone registers their email address, but never activates their account using 
        // normal registration process.. we want to activate the user and clear the activation token etc.
        if ($user->id && !$user->confirmed) {
            $user->confirmed = 1;
            $user->activation_token = null;
            $user->avatar = $provider_user->avatar;
        }
            
        // Verify if user is new. Prepare user to second stage of register if so.
        if(!$user->exists) {
            Session::flash('warning', 'New User: Register a password for your local account.');
            $retorno = view('auth.register',['name' => $provider_user->name, 'email' => $provider_user->email]);
        } else {
            $retorno = redirect()->action('HomeController@showDashboard');
        }

        // these should only actually do anything if there is something to update.. but maybe wrap these up..
        $user->save();
        $user->emails()->save($email);
        $user->oauthIdentities()->save($oauth_identity);

        // log the user in with whatever you've chosen for authentication (I use JWT tokens) but you can do something like this
        auth()->login($user);

        // I like to throw in an event to handle some stuff like sending a welcome email etc...
        //event(new UserRegisteredThroughOauth($user));
        
        return $retorno;
    }

}
