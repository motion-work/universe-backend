<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewSkillSetRequest;
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galaxy = Galaxy::create($request->all());

        auth()->user()->galaxies()->save($galaxy, ['is_owner' => true]);

        return response()->json($galaxy);
    }

    /**
     * Store a new skill set
     *
     * @param StoreNewSkillSetRequest $request
     * @param                         $permalink
     *
     * @return mixed
     */
    public function storeSkillSet(StoreNewSkillSetRequest $request, $permalink)
    {

        $skillSet = Galaxy::wherePermalink($permalink)->first()->skillSets()->create([
            'user_id'     => auth()->user()->id,
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        // Store skill set items
        if($skillSet) $skillSet->skillSetItems()->createMany($request->get('skills'));

        // Store skill set tags
        $skillSet->retag($request->get('tags'));

        return $skillSet;
    }

    /**
     * Get all skill sets from this galaxy
     *
     * @param $permalink
     *
     * @return mixed
     */
    public function getSkillSets($permalink)
    {
        $skillSets = Galaxy::wherePermalink($permalink)->first()->skillSets()->with(['user', 'tagged'])->get();

        return $skillSets;
    }

    /**
     * Get a specific skill set
     *
     * @param $permalink
     * @param $skillSetPermalink
     *
     * @return mixed
     */
    public function getSkillSet($permalink, $skillSetPermalink)
    {
        $skillSet = Galaxy::wherePermalink($permalink)->first()
            ->skillSets()->wherePermalink($skillSetPermalink)->with(['skillSetItems', 'user', 'tagged'])->first();

        return $skillSet;
    }

    /**
     * Display the specified resource.
     *
     * @param  $galaxy
     *
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
     * @param  \App\Models\Galaxy $galaxy
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Galaxy $galaxy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Galaxy       $galaxy
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galaxy $galaxy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galaxy $galaxy
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galaxy $galaxy)
    {
        //
    }

}
