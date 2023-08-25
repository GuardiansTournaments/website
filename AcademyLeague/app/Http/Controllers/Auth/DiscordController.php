<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Helpers\ImageManager;

class DiscordController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        session()->put('intended_url', url()->previous());

        // if session_token exists, do different request?
        $token = request()->cookie('discord_session');
        if ($token) {
            try {
                $user = Socialite::driver('discord')->userFromToken($token);
                if ($user) {
                    $user = User::where('email', $user->email)->first();
                    Auth::login($user, true);
                    return redirect()->intended(session('intended_url'));
                }
            } catch (\Throwable $th) {
                return Socialite::driver('discord')->redirect();
            }
            
        }
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $intended_url = session('intended_url');

        
        if (!$request->input('code')) {
            return redirect()->intended($intended_url)->with('error', 'Inloggen afgebroken');
        }
        $user = Socialite::driver('discord')->user();
        
        $token = $user->token;
        $user = User::updateOrCreate([
            'email' => $user->email
        ], [
            'username' => $user->name,
            'avatar' => ImageManager::downloadImage($user->avatar, $user->name, "avatar"),
            'email' => $user->email,
            'has_discord' => true,
            'banner' => $user->user['banner'],
            'accent_color' => $user->user['accent_color'],
            'banner_color' => $user->user['banner_color'],
            'locale' =>$user->user['locale'],
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);
        return redirect()->intended($intended_url)->withCookie(cookie()->forever('discord_session', $token));
    }
}
