<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'pic'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $picName = null;

        if ($request->hasFile('pic')) {
            $pic = $request->file('pic');

            // Generate unique file name
            $picName = Str::uuid() . '.' . $pic->getClientOriginalExtension();

            // Store in: storage/app/public/users
            $pic->move(public_path('users'), $picName); // saved in public/imgs
            //$pic->storeAs('public/users', $picName);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'pic'      => $picName
        ]);

        $token = $user->createToken('MobileApp')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user'    => $user,
            'token'   => $token
        ], 201);
    }

    // LOGIN
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    $user = Auth::user();

    $tokenResult = $user->createToken('MobileApp');
    $token = $tokenResult->accessToken;

    return response()->json([
        'message' => 'Login successful',
        'token'   => $token,
        'user'    => $user,
    ]);
}

    // PROFILE
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
