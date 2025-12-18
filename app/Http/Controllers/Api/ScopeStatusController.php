<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScopeStatus;
use Illuminate\Http\Request;

class ScopeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ScopeStatus::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $scopeStatus = ScopeStatus::create($request->all());
        return response()->json($scopeStatus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeStatus $scopeStatus)
    {
        return response()->json($scopeStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScopeStatus $scopeStatus)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string',
        ]);
        $scopeStatus->update($validatedData);
        return response()->json($scopeStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeStatus $scopeStatus)
    {
        $scopeStatus->delete();
        return response()->json(null, 204);
    }
}
