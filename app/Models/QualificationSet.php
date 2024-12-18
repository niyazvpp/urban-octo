<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualificationSet extends Model
{
    public $guarded = [];
    public function qualifications()
    {
        return $this->belongsToMany(SpecialQualification::class, 'set_special');
    }
}
