<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseHelper;

class UserController extends Controller
{
    protected $responseHelper;

    public function __construct(ResponseHelper $responseHelper)
    {
        $this->responseHelper = $responseHelper;
    }

    public function me()
    {
        // $user = Auth::user();

        $user_id = Auth::user()->id;

        $user = User::with('todos')->find($user_id);

        $todo = $user->todos()->get();

        return $this->responseHelper->successResponse(true, 'Information of this user', $user);
    }

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::find($id);

        return $this->responseHelper->successResponse(true, 'Find by user id', $user);
    }

    public function edit(User $user)
    {
        dd($user);
    }
}
