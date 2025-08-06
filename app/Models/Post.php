<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model

{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use Commentable;

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'markdown',
        'cover'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
