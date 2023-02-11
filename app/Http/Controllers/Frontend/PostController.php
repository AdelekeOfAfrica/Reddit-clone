<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostShowResource;

class PostController extends Controller
{
    //

    public function show ($community_slug, $slug) {

        $community = Community::where('slug',$community_slug)->first();

        $post = new PostShowResource(Post::where('slug',$slug)->first());

        return Inertia::render('Frontend/Post/show',compact('community','post'));

    }
}
