<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Community;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable =['user_id','community_id','title','slug','description','url','vote'];

    
    // Here the source of the data is title 
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function community(){
        return $this->belongsTo(Community::class);
    }
}
