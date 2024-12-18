<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterestArea extends Model
{
    // use Cachable;
    use SoftDeletes;
    protected $table = "interest_areas";
    public $guarded = ['id'];
    // public $hidden = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
