<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryScope;
use Illuminate\Http\Request;

class CategoryScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryScope::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'scope_id' => 'required|integer',
        ]);
        $categoryScope = CategoryScope::create($validated);
        return response()->json($categoryScope, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CategoryScope::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'scope_id' => 'required|integer',
        ]);
        $categoryScope = CategoryScope::findOrFail($id);
        $categoryScope->update($validated);
        return response()->json($categoryScope, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryScope = CategoryScope::findOrFail($id);
        $categoryScope->delete();
        return response()->json(null, 204);
    }
}
