<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\forum\ForumComment;
use App\Models\Scopes\AdminScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ScopedBy([AdminScope::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_sent_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function interestAreas()
    {
        return $this->belongsToMany(InterestArea::class);
    }
    public function specialQualifications()
    {
        return $this->belongsToMany(SpecialQualification::class);
    }
    public function savedJobs()
    {
        return $this->belongsToMany(JobExam::class)->withPivot('status');
    }
    public function comments()
    {
        return $this->belongsToMany(ForumComment::class, 'forum_comments', 'forum_post_id', 'user_id')->withPivot('content');
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function mahallAc()
    {
        return $this->belongsTo(Admin::class, 'mahall', 'id');
    }
}
