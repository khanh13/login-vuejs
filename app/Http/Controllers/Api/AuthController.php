<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Mail;
use App\Mails\RegisterUserMail;
use App\Models\UserActivation;
use App\Repositories\UserActivationToken\UserActivationTokenRepositoryInterface;
use App\Services\UserActivationTokenService;

class AuthController extends Controller
{
    protected $userService;

    protected $userActivationTokenService;

    protected $responseHelper;

    protected $userActivationTokenRepositoryInterface;

    public function __construct(UserService $userService, UserActivationTokenService $userActivationTokenService, UserActivationTokenRepositoryInterface $userActivationTokenRepositoryInterface, ResponseHelper $responseHelper)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'sendPasswordResetLink', 'activateEmail']]);

        $this->userService = $userService;

        $this->responseHelper = $responseHelper;

        $this->userActivationTokenService = $userActivationTokenService;

        $this->userActivationTokenRepositoryInterface = $userActivationTokenRepositoryInterface;
    }

    public function register(RegisterUserRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        if ($user) {
            $token = $this->userActivationTokenService->createNewToken($user->id);
            //  dd(url());
            Mail::to($user->email)->send(new RegisterUserMail($user, $token->token));

            return $this->responseHelper->successResponse(true, 'Register Email has been sent!', $user);
        }

        return $this->responseHelper->errorResponse(false, 'Oops! Something went wrong', 401);
    }

    public function login(LoginUserRequest $request)
    {
        $checkActivated = $this->userService->checkUserIsActivated($request->email);

        if (!$checkActivated) {
            return $this->responseHelper->errorResponse(false, 'User Needs To Activate Account', 401);
        }

        // $credentials = $request->validated();
        $credentials = $request->all();


        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'The provided credentials are incorrect'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
        ]);
    }

    // public function login(LoginUserRequest $request)
    // {
    //     $checkActivated = $this->userService->checkUserIsActivated($request->email);

    //     if (!$checkActivated) {
    //         return $this->responseHelper->errorResponse(false, 'User Needs To Activate Account', 401);
    //     }

    //     $user = $this->userService->loginUser($request->all());

    //     if ($user) {
    //         $token = $user->createToken('token-login');

    //         $data = [
    //             'user' => $user,
    //             'token-type' => 'Bearer',
    //             'access_token' => $token->plainTextToken,
    //         ];

    //         return $this->responseHelper->successResponse(true, 'Logged in', $data);
    //     }

    //     return $this->responseHelper->errorResponse(false, 'The provided credentials are incorrect', 401);
    // }

    // public function logout()
    // {
    //     if (Auth::user()) {
    //         Auth::user()->tokens()->delete();
    //     }

    //     return $this->responseHelper->successResponse(true, 'Logged out', 200);
    // }

    // public function me()
    // {
    //     $user = Auth::user();
    //     // return $request->user();

    //     return $this->responseHelper->successResponse(true, 'User information', $user);
    // }

    public function activateEmail($code)
    {
        $userId = $this->userActivationTokenService->checkToken($code);

        // dd($user->id);
        return redirect('login');
        // return $this->responseHelper->successResponse(true, "Activate Email", $checkToken);
    }
}
