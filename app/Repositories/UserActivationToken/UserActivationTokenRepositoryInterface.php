<?php

namespace App\Repositories\UserActivationToken;

interface UserActivationTokenRepositoryInterface
{
    public function createToken(int $userId, $token);

    public function checkToken($code);
}
