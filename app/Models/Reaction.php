<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{  protected $primaryKey = 'reaction_id';
    protected $fillable = ['reaction_type'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'faire', 'reaction_id', 'user_id')
            ->withPivot('post_id');
    }

    // Relation "post" avec la table "post" (Many-to-Many)
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'faire', 'reaction_id', 'post_id')
            ->withPivot('user_id');
    }
    use HasFactory;
}
