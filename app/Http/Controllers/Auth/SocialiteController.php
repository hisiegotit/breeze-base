<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialiteUser = Socialite::driver($provider)->user();

            $emailExisted = User::where('email', $socialiteUser->email);

            $user = User::where('provider_id', $socialiteUser->id)->where('provider', $provider)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'Login successfully');
            }

            if ($emailExisted->where('provider', $provider)->exists()) {
                return redirect()->route('login')->withErrors(['email' => 'Email is being associated with another ' . $provider . ' account.']);
            }

            if ($emailExisted->exists()) {
                return redirect()->route('login')->withErrors(['email' => 'Email already exists, please login with your email and password']);
            }

            $password = Str::random(12);
            $user = User::create([
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'username' => User::getUsername($socialiteUser->nickname),
                'password' => $password,
                'provider' => $provider,
                'provider_id' => $socialiteUser->id,
                'provider_token' => $socialiteUser->token,
            ]);
            $user->sendEmailVerificationNotification();
            $user->update([
                'password' => Hash::make($password)
            ]);

            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login failed');
        }
    }
}
