<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etre extends Model
{
    use HasFactory;
    public function conversation()
{
    return $this->belongsTo(Conversation::class, 'conversation_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
