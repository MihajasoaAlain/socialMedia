<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faire extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function reaction()
{
    return $this->belongsTo(Reaction::class, 'reaction_id');
}
public function post()
{
    return $this->belongsTo(Post::class, 'post_id');
}

}
