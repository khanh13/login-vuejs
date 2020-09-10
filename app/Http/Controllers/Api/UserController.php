<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // return response()->json(
        //     [
        //         'status' => 'success',
        //         'users' => $users->toArray()
        //     ], 200
        // );
        $user = User::all();
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200
        );
    }

    public function edit(User $user)
    {
        dd($user);
    }
}
