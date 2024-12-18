<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialQualification extends Model
{
    use SoftDeletes;
    public $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
