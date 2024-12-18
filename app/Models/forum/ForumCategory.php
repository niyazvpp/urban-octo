<?php

namespace App\Models\forum;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(ForumPost::class);
    }
}
