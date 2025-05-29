<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image_url',
        'scheduled_time',
        'status',
        'user_id',
    ];

    protected $casts = [
        'scheduled_time' => 'datetime',
        'status' => PostStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
