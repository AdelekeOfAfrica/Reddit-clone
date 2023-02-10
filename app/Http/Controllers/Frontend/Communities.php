<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;

class Communities extends Controller
{
    //

    public function show ($slug){

        $community = Community::where('slug',$slug)->first();
        $posts =CommunityPostResource::collection($community->posts()->paginate(12));

        return Inertia::render('Frontend/Communities/show',compact('community','posts'));


    }
}
