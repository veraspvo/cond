<?php

namespace App\Services;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\GenericProvider;

class KeycloakOAuthProvider extends GenericProvider
{
    public function __construct(array $options = [])
    {
        $options = array_merge([
            'clientId'                => config('keycloak-web.client_id'),
            'clientSecret'            => config('keycloak-web.client_secret'),
            'redirectUri'             => route('callback'),
            'urlAuthorize'            => config('keycloak-web.base_url') ,
            'urlAccessToken'          => config('keycloak-web.base_url') ,
            'urlResourceOwnerDetails' => config('keycloak-web.base_url') ,
            'scopes'                  => 'openid profile email',
        ], $options);

        parent::__construct($options);
    }
}

