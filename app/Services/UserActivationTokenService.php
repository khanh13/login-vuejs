<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserActivationToken\UserActivationTokenRepositoryInterface;
use Illuminate\Support\Str;

class UserActivationTokenService
{
    protected $activationTokenRepository;

    protected $userRepository;

    public function __construct(UserActivationTokenRepositoryInterface $activationTokenRepository, UserRepositoryInterface $userRepository)
    {
        $this->activationTokenRepository = $activationTokenRepository;

        $this->userRepository = $userRepository;
    }

    public function createNewToken(int $userId)
    {
        $rand = Str::random(5);
        $token = sha1(time().$rand);

        return $this->activationTokenRepository->createToken($userId, $token);
    }

    public function checkToken($code)
    {
        $checkToken = $this->activationTokenRepository->checkToken($code);

        if ($checkToken) {
            $userId = $checkToken->user_id;

            $this->userRepository->activateUser($userId);

            $user = $checkToken;

            $checkToken->delete();

            return $userId;
        }

        return "User has not been activated";
    }
}
