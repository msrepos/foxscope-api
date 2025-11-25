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
        $scopeStatus = ScopeStatus::create($request->all());
        return response()->json($scopeStatus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeStatus $scopeStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScopeStatus $scopeStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScopeStatus $scopeStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeStatus $scopeStatus)
    {
        //
    }
}
