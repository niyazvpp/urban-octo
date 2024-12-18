<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $guarded = ['id'];
    public $appends = ['likes_count', 'children_count'];
    public function post()
    {
        return $this->belongsTo('App\Models\ForumPost');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User')->select('users.id', 'users.name', 'users.avatar');
    }
    public function children()
    {
        return $this->hasMany('App\Models\forum\ForumComment', 'parent_id')->with('user');
    }
    public function getChildrenCountAttribute()
    {
        return $this->children->count();
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\forum\ForumComment', 'parent_id');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\forum\ForumCommentLike');
    }
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
}
