<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            logger(request()->fullUrl());
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
                return redirect('/dashboard');
            } else {
                return redirect('/login')->with('error', 'Akun Google Anda belum terdaftar.');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat login.');
        }
    }
}
