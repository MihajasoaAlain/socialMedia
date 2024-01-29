<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{  protected $primaryKey = 'reaction_id';
    protected $fillable = ['reaction_type'];
    public function posts()
{
    return $this->hasMany(Faire::class, 'reaction_id');
}

    use HasFactory;
}
