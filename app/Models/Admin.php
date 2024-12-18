<?php

namespace App\Models;

use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([AdminObserver::class])]
class Admin extends Authenticatable
{
    use SoftDeletes, Notifiable;
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function isSuperAdmin()
    {
        return $this->role === 'super';
    }
}
