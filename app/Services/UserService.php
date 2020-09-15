<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(array $data)
    {
        $user = [
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ];

        $newUser = $this->userRepository->registerUser($user);

        // $token = $newUser->createToken('token-name')->plainTextToken;

        // $data = [
        //     'user'  => $newUser,
        //     'token' => $token
        // ];
        return $newUser;
    }

    public function loginUser(array $data)
    {
        $credentials = ([
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        if (!Auth::attempt($credentials)) {
            return false;
        }

        $user = Auth::user();

        return $user;
    }

    private function guard()
    {
        return Auth::guard();
    }

    public function checkUserIsActivated($email)
    {
        $checkIfUserExists = $this->userRepository->checkIfUserExistsViaEmail($email);

        // dd($checkIfUserExists);

        if ($checkIfUserExists && $checkIfUserExists->email_verified_at) {
            return true;
        }

        return false;
    }

    public function checkEmail($email)
    {
        $checkIfUserExists = $this->userRepository->checkIfUserExistsViaEmail($email);

        if ($checkIfUserExists) {
            return true;
        }

        return false;
    }
}
