<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScopeType;
use Illuminate\Http\Request;

class ScopeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ScopeType::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $scopeType = ScopeType::create($request->all());
        return response()->json($scopeType, 201);   
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeType $scopeType)
    {
        return response()->json($scopeType, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScopeType $scopeType)
    {
        $scopeType->update($request->all());
        return response()->json($scopeType, 200);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeType $scopeType)
    {
        $scopeType->delete();
        return response()->json(null, 204);
    }
}
