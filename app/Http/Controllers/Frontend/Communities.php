<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityResource;
use App\Http\Resources\CommunityPostResource;

class Communities extends Controller
{
    //

    public function show ($slug){

        $community = Community::where('slug',$slug)->firstOrFail();
        $posts =CommunityPostResource::collection($community->posts()->with(['user','postVotes'=>function($query){
            $query->where('user_id',auth()->id());
        }])->withCount('comments')->paginate(12));

        $communities=CommunityResource::collection(Community::withCount('posts')->latest()->take(4)->get());

        return Inertia::render('Frontend/Communities/show',compact('community','posts','communities'));


    }
}
