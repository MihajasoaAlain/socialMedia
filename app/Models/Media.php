<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Media extends Model
{
    use HasFactory;
    protected $fillable =['media_type','media_name','media_url','post_id'];
    protected $primaryKey = 'media_id';
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
