<?php

namespace App\Http\Controllers;

use App\Models\Galaxy;
use Illuminate\Http\Request;

class GalaxyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galaxy = Galaxy::create($request->all());

        auth()->user()->galaxies()->save($galaxy, ['is_owner' => true]);

        return response()->json($galaxy);
    }

    /**
     * Display the specified resource.
     *
     * @param  $galaxy
     * @return \Illuminate\Http\Response
     */
    public function show($galaxy)
    {
        $galaxy = Galaxy::wherePermalink($galaxy)->first();

        return response()->json($galaxy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galaxy  $galaxy
     * @return \Illuminate\Http\Response
     */
    public function edit(Galaxy $galaxy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galaxy  $galaxy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galaxy $galaxy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galaxy  $galaxy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galaxy $galaxy)
    {
        //
    }
}
