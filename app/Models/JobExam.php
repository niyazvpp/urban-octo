<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobExam extends Model
{
    use SoftDeletes;
    public $guarded = [];
    public function interestArea()
    {
        return $this->belongsToMany(InterestArea::class, 'interest_jobs', 'job_exam_id', 'interest_area_id');
    }
    public function jobQualifications()
    {
        return $this->belongsToMany(SpecialQualification::class, 'sp_qual_job', 'job_id', 'sp_id');
    }
    public function qualificationSet()
    {
        return $this->belongsToMany('App\Models\QualificationSet', 'job_set', 'set_id', 'job_id');
    }
}
