<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successful register',
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Successful Login',
                    'data' => $user
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Email or password got wrong!'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Email not registered'
        ]);
    }
}
