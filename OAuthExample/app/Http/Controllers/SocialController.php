<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\SocialiteManager;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle social login process.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $provider
     * @return \App\Http\Controllers\Response
     */
    public function execute(Request $request, $provider)
    {
        if (! $request->has('code')) {
            return $this->redirectToProvider($provider);
        }

        return $this->handleProviderCallback($provider);
    }

    /**
     * Redirect the user to the Social Login Provider's authentication page.
     *
     * @param string $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the Social Login Provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $token = $user->token;

        $user = (\App\User::whereEmail($user->getEmail())->first())
            ?: \App\User::create([
                'name'  => $user->getName() ?: 'unknown',
                'email' => $user->getEmail(),
                'confirm_code' => $token,
                //'confirm_code' => base64_encode($token),
                'activated' => 1,
            ]);

        auth()->login($user);
        flash(
            auth()->user()->name
        );

        return redirect(route('home'));
    }
}
