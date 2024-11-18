<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['imgSrc', 'type', 'title', 'author', 'topics', 'date'];

    protected $dates = ['date'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'post_topic');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
