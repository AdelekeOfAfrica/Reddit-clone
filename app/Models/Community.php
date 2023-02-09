<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory, Sluggable;
    
    protected $fillable = ['user_id','name','description','slug'];

    //here we are setting the source of each data as the name .

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
