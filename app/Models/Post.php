<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'file_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment');
    }

    //slugs
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],

        ];
    }

    // public function getRouteKeyName(): string
    // {
    //     return 'slug';
    // }
}
