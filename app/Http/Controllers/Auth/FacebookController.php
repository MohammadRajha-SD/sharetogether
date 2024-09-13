<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    const DRIVER_TYPE = 'facebook';

    public function handleFacebookRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)
            // ->scopes(['email']) 
            ->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver(static::DRIVER_TYPE)->user();
        } catch (Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Unable to authenticate with Facebook']);
        }

        try {
            $userExisted = User::where('email', $user->email)->first();

            if ($userExisted) {
                $userExisted->update([
                    'oauth_id' => $user->id,
                    'oauth_type' => static::DRIVER_TYPE,
                ]);

                Auth::login($userExisted, true);

                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => 'user'. uniqid(), 
                    'oauth_id' => $user->id,
                    'oauth_type' => static::DRIVER_TYPE,
                    'password' => Hash::make($user->id),
                ]);

                Auth::login($newUser, true);
                return redirect()->route('home');
            }

        } catch (Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Unable to create or find user']);
        }
    }
}
