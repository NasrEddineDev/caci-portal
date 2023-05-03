<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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

        if(!auth()->attempt($credentials,false)){
            // return response()->json(['status' =>'success']);
            return response([
                'status' =>'error',
                'message' => 'Credentials Incorrect'], 422);
        }

        $user = auth()->user();
        $token = $user->createToken('main')->plainTextToken;
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
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response('', 204);

        auth()->logout();
        return response()->json(['status' =>'success']);
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
}
