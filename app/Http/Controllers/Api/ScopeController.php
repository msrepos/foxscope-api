<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scope;
use App\Models\User;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Scope::all();
    }

    /**
     * Display a listing of the user scopes.
     */
    public function user(User $user)
    {
        $scopes = Scope::where('user_id', $user->id)
            ->with('user:id,name')
            ->get();

        return response()->json($scopes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'img'  => 'nullable|image'
        ]);

        $imgPath = null;

        if ($request->hasFile('img')) {
            // uploads to storage/app/public/scopes/xxxx.png
            $imgPath = $request->file('img')->store('scopes', 'public');
        }

        $scope = Scope::create([
            'name'         => $request->name,
            'code'         => $request->code,
            'note'         => $request->note,
            'lat'          => $request->lat,
            'lng'          => $request->lng,
            'user_id'      => $request->user_id,
            'type_id'      => $request->type_id,
            'status_id'    => $request->status_id,
            'country_code' => $request->country_code,
            'privacy'      => $request->privacy,
            'img'          => $imgPath,   // <--- save correct path
        ]);

        return response()->json($scope, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Scope $scope)
    {
        return $scope;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scope $scope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scope $scope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scope $scope)
    {
        //
    }
}
