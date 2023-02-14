<?php

namespace App\Http\Controllers\Backend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityStoreRequest;

class communityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $communities = Community::where('user_id',auth()->id())->paginate(5)->through(fn($community)=>[
            'id'=> $community->id,
            'name'=>$community->name,
            'slug'=>$community->slug,
            'description'=>$community->description,
        ]);
        return Inertia::render('Communities/index',compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return Inertia::render('Communities/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommunityStoreRequest $request)
    {
        //
        Community::create($request->validated() + ['user_id'=>auth()->id()]);

        return to_route('communities.index')->with('message','Community successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
        return Inertia::render('Communities/edit',compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommunityStoreRequest $request, Community $community)
    {
        //
        $community->update($request->validated());

        return to_route('communities.index')->with('message','Community updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
        $community->delete();
        return back()->with('message','Community deleted successfully.');
    }
}
