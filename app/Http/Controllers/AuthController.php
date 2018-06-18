<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function register(RegisterFormRequest $request)
    // {
    //     $user = new User;
    //     $user->email = $request->email;
    //     $user->name = $request->name;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     return response([
    //         'status' => 'success',
    //         'data' => $user
    //        ], 200);
    // }
    // 
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (($user = DB::table('users')->select('password')->where('username', $request->input('username'))->latest()->first()) === null) {
            return response([
                'status' => 'error',
                'error'  => 'username.not.exist',
                'msg'  => 'Username not found !'
            ], 400);
        } elseif ( ! Hash::check($request->input('password'), $user->password)) {
            return response([
                'status' => 'error',
                'error'  => 'password.wrong',
                'msg'    => 'Password wrong !'
            ], 400);
        }
        
        if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Username or password wrong !'
                ], 400);
        }

        return response([
                'status' => 'success'
            ])
            ->header('Authorization', $token);
    }
    
    public function logout()
    {
        JWTAuth::invalidate();

        return response([
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ], 200);
    }
    
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }

    public function refresh()
    {
        return response([
                'status' => 'success'
            ]);
    }
}
