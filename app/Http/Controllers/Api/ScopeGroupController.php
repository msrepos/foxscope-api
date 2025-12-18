<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScopeGroup;
use Illuminate\Http\Request;

class ScopeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ScopeGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $scopeGroupData = $request->validate([
            'scope_id' => 'required|integer',
            'group_id' => 'required|integer',
        ]);
        $scopeGroup = ScopeGroup::create($scopeGroupData);
        return response()->json($scopeGroup, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeGroup $scopeGroup)
    {
        return response()->json($scopeGroup);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScopeGroup $scopeGroup)
    {
        $validatedData = $request->validate([
            'scope_id' => 'sometimes|required|integer',
            'group_id' => 'sometimes|required|integer',
        ]);
        $scopeGroup->update($validatedData);
        return response()->json($scopeGroup);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeGroup $scopeGroup)
    {
        $scopeGroup->delete();
        return response()->json(null, 204);
    }
}
