<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USERS
    public function index()
    {
        return User::paginate(20);
    }

    // SHOW USER
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // UPDATE USER
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'  => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'pic'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => 'nullable|min:6',
        ]);

        // Handle image upload
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('users'), $filename);

            $validated['pic'] = $filename;
        }

        // Handle password
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }


    // DELETE USER
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
