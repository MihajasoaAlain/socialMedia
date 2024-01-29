<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =['post_content','post_date','user_id'];
    protected $primaryKey = 'post_id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'post_id');
    }
    public function reactions()
{
    return $this->hasMany(Faire::class, 'post_id');
}
public function getPostDetails()
    {
        $media = $this->media;
        $reactionsCount = $this->reactions()->count();
        $commentsCount = $this->comments()->count();

        return [
            'description' => $this->post_content,
            'media_url' => $media ? $media->media_url : null,
            'reactions_count' => $reactionsCount,
            'comments_count' => $commentsCount,
        ];
    }

}