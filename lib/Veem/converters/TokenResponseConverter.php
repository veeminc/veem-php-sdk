<?php

namespace Veem\converters;

use Veem\model\TokenResponse;
use Veem\model\VeemErrorResponse;

class TokenResponseConverter extends BaseConverter
{
    public static function convertResponse($response)
    {
        if ($response instanceof VeemErrorResponse) return $response;
        $tokenPayload = new TokenResponse();
        if (empty($response))   return $tokenPayload;
        $tokenPayload
            ->setAccessToken($response["access_token"] ?? null)
            ->setUsername($response["user_name"] ?? null)
            ->setAccountId($response["account_id"] ?? null)
            ->setExpiresIn($response["expires_in"] ?? null)
            ->setTokenType($response["token_type"] ?? null)
            ->setScope($response["scope"] ?? null)
            ->setUserId($response["user_id"] ?? null)
            ->setRefreshToken($response["refresh_tooken"] ?? null);

        return $tokenPayload;
    }
}
