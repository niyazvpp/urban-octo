<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function specialQualifications()
    {
        return $this->hasMany(SpecialQualification::class)->select('id', 'name', 'qualification_id');
    }
}
