<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['likes_count', 'comments_count'];
    public function category()
    {
        return $this->belongsTo(ForumCategory::class, 'forum_category_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User')->select('id', 'name', 'avatar');
    }
    public function whoLiked()
    {
        return $this->belongsToMany('App\Models\User', 'forum_post_likes')->select('users.id', 'users.name', 'users.avatar');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\forum\ForumComment')->whereNull('parent_id')->with('user');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\forum\ForumPostLike');
    }
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }
}
