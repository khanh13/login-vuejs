<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function registerUser(array $data);

    public function activateUser(int $userId);

    public function checkIfUserExistsViaEmail($email);
}
