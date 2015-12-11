<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use TwitchApi;

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->setViewLayout('layouts.auth');
    }

    public function login()
    {
        //
    }

    public function handleLogin(AuthManager $auth, Request $request)
    {
        // Set the auth data
        $userData = [
            'email'    => $request->get('email'),
            'password' => $request->get('password'),
        ];
        // Log in successful
        if ($auth->attempt($userData)) {
            return redirect()->intended(route('home'))->with('message', 'You have been logged in.');
        }

        // Login failed
        return redirect(route('auth.login'))->with('error', 'Your username or password was incorrect.');
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        auth()->logout();

        return redirect(route('home'))->with('message', 'You have been logged out.');
    }

    public function register()
    {
        //
    }

    public function handleRegister(RegistrationRequest $request, AuthManager $auth)
    {
        $user = User::create($request->all());

        $auth->login($user);

        return redirect()->route('home')->with('message', 'Your account has been created!');
    }
}
