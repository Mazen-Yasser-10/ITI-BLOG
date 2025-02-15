<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , Sluggable , SoftDeletes;
    protected $fillable = ['title', 'description', 'user_id' , 'image'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function get_human_readable_date()
    {
        return $this->created_at->diffForHumans();
    }

    public function sluggable(): array
    {
        return [ 'slug' => [ 'source' => 'title' ] ];
    }
}
