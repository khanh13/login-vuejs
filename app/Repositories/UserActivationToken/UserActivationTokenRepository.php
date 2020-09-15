<?php

namespace App\Repositories\UserActivationToken;

use App\Models\UserActivationToken;

class UserActivationTokenRepository implements UserActivationTokenRepositoryInterface
{
    public function createToken(int $userId, $token)
    {
        try {
            $newToken = new UserActivationToken();
            $newToken->user_id = $userId;
            $newToken->token = $token;
            $newToken->save(); 

            return $newToken;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function checkToken($code)
    {
        try {
            $checkToken = UserActivationToken::where(['token' => $code])->first();

            return $checkToken;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
