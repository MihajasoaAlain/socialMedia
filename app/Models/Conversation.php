<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $primaryKey = 'conversation_id';
    protected $fillable = ['conversation_name'];
    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'etre', 'conversation_id', 'user_id');
    }
    
}
