<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'password', 'role', 'pesantren_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Pesantren()
    {
        return $this->belongsTo('App\Pesantren');
    }

    public function Asatidz()
    {
        return $this->hasOne('App\Asatidz');
    }

    public function Family()
    {
        return $this->hasMany('App\Family');
    }

    public function Santri()
    {
        return $this->hasOne('App\Santri');
    }
}
