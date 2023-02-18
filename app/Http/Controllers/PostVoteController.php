<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\PostVote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    //
    public function upvote(Post $post){
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();

        if (!is_null($isVoted)) {
            if ($isVoted->vote === -1) {
                $isVoted->update(['vote' => 1]);
                $post->increment('votes', 2);
                return redirect()->back();
            } elseif ($isVoted->vote === 1) {
                return redirect()->back();
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => 1
            ]);
            $post->increment('votes', 1);
            return redirect()->back();
        }
    }

        
    

    public function downvote(Post $post){
        
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();

        if (!is_null($isVoted)) {
            if ($isVoted->vote === 1) {
                $isVoted->update(['vote' => -1]);
                $post->increment('votes', 2);
                return redirect()->back();
            } elseif ($isVoted->vote === -1) {
                return redirect()->back();
            }
            else {
                PostVote::create([
                    'post_id' => $post->id,
                    'user_id' => auth()->id(),
                    'vote' => -1
                ]);
                $post->increment('votes', 1);
                return redirect()->back();
            }
        }
    }
}