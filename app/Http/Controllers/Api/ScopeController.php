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
    public function user(Request $request)
    {   

        $scopes = Scope::where('user_id', $request->user()->id)
            ->with('user:id,name')
            ->get();

        return response()->json($scopes);
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

        $filename = null;

        if ($request->hasFile('img')) {
            $file = $request->file('img'); // match 'img'
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imgs'), $filename); // saved in public/imgs
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
            'img'          => $filename, // null if no image uploaded
        ]);

        return response()->json($scope, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Scope $scope)
    {
        return response()->json($scope);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scope $scope)
    {
        $validatedData = $request->validate([
            'name'         => 'sometimes|required|string',
            'code'         => 'sometimes|required|string',
            'note'         => 'sometimes|nullable|string',
            'lat'          => 'sometimes|nullable|numeric',
            'lng'          => 'sometimes|nullable|numeric',
            'user_id'      => 'sometimes|required|integer|exists:users,id',
            'type_id'      => 'sometimes|required|integer|exists:scope_types,id',
            'status_id'    => 'sometimes|required|integer|exists:scope_statuses,id',
            'country_code' => 'sometimes|nullable|string',
            'privacy'      => 'sometimes|required|in:public,private',
        ]);
        $scope->update($validatedData);
        return response()->json($scope);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scope $scope)
    {
        $scope->delete();
        return response()->json(null, 204);
    }
}
