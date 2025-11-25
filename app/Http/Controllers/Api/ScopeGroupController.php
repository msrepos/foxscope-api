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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeGroup $scopeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScopeGroup $scopeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScopeGroup $scopeGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeGroup $scopeGroup)
    {
        //
    }
}
