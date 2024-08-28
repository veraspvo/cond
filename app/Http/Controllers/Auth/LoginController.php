<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\KeycloakOAuthProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectToKeycloak()
    {
        $provider = new KeycloakOAuthProvider();
        //dd($provider);
        $authorizationUrl = $provider->getAuthorizationUrl();
        session(['oauth2state' => $provider->getState()]);
        ($authorizationUrl);
        return redirect($authorizationUrl);
    }

    public function handleKeycloakCallback(Request $request)
    {
        $provider = new KeycloakOAuthProvider();
        //dd($provider);

        if ($request->input('state') !== session('oauth2state')) {
            dd('Passei aqui_01');
            session()->forget('oauth2state');
            return redirect()->route('login')->with('error', 'Invalid OAuth state');
        }
        //dd($request->input('code'));
        try {
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $request->input('code'),
            ]);

            dd('Passei aqui_02');

            $resourceOwner = $provider->getResourceOwner($accessToken);

            $user = $resourceOwner->toArray();
            // Aqui você pode autenticar ou registrar o usuário no sistema
            dd($user);
            Auth::login($user);
            return redirect()->intended('documentos_divisoes.index');
            //return redirect()->intended('/home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Falha na autenticação');
        }
    }
}
