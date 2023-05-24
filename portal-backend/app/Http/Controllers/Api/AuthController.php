<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct() {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * @OA\Get(
     *      path="/v1/login",
     *      operationId="login",
     *      tags={"Authentication"},
     *      summary="Login user",
     *      description="Returns user information and token",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    //
    public function login(SigninRequest $request){

        $credentials = $request->validated();


        // $user = $request->validate([
        //     'email' =>'required|email',
        //     'password' =>'required|min:6',
        // ]);

        // $credentials = [
        //     // 'name' => '',
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ];
        $token = auth()->attempt($credentials);
        // if(!auth()->attempt($credentials,false)){
        if(!$token){
            // return response()->json(['status' =>'success']);
            return response([
                'status' =>'error',
                'message' => 'Credentials Incorrect'], 422);
        }

        return $this->respondWithToken($token);

        $token = $this->createNewToken($token);
        $user = auth()->user();
        // $token = $user->createToken('main')->plainTextToken;
        // return response()->json(['status' =>'success']);
        // return response([
        //    'status' =>'success',
        //     'token' => $token
        // ]);

        return response(compact('user', 'token'));
    }

    public  function register(SignupRequest $request){
        $data = $request->validate([
            'name' => 'required',
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ];

        $user = User::create($credentials);

        $token = $user->createToken('main')->plainTextToken;

        return response(compact('user', 'token'));
        // if(auth()->attempt($credentials)){
        //     return response()->json(['status' =>'success']);
        // }

        // return response()->json(['status' => 'error']);
    }

    public function logout(Request $request){
        // $user = $request->user();
        // $user->currentAccessToken()->delete();

        // return response('', 204);

        auth()->logout();
        return response()->json(['status' =>'Successfully logged out']);
    }

    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    public function check(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function registerCheck(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function reset(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function resetCheck(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function forgot(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function forgotCheck(Request $request){
        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);

        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];

        if(auth()->attempt($credentials)){
            return response()->json(['status' =>'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function resetPassword(Request $request){

        $user = $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);
        $credentials = [
            'email' => $user['email'],
            'password' => $user['password'],
        ];
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
