<?php

namespace App\Repositories\User;

use App\Models\User;
use Carbon\Carbon;

class UserRepository implements UserRepositoryInterface
{
    public function registerUser(array $data)
    {
        try {
            $newUser = new User();
            $newUser->fill($data);
            $newUser->save();

            return $newUser;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function activateUser(int $userId)
    {
        try {
            $user = User::where(['id' => $userId])->first();
            $user->email_verified_at = Carbon::now('Asia/Ho_Chi_Minh');
            $user->save();

            return $user;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function checkIfUserExistsViaEmail($email)
    {
        try {
            $user = User::where(['email'=> $email])->first();

            return $user;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        $result = $this->model->findOrFail($id);

        $user = auth()->user();

        if($result){
            $data =
            $result->update($data);
            return $result;
        }

        return false;
    }
}
