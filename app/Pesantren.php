<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesantren extends Model
{
    use SoftDeletes;

    protected $fillable = ['registration_number', 'accreditation', 'name', 'slug', 'address', 'province_id', 'regency_id', 'phone', 'description', 'email', 'photo', 'website', 'facebook', 'instagram', 'youtube', 'online_registration'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function Regency()
    {
        return $this->belongsTo('App\Models\Regency');
    }

    public function Province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function Admin()
    {
        return $this->hasMany('App\User')->where('role', '!=', 'asatidz')->where('role', '!=', 'santri');
    }

    public function Santri()
    {
        return $this->hasMany('App\User')->where('role', 'santri');
    }

    public function Registration()
    {
        return $this->hasOne('App\Registration');
    }

    public function Classes()
    {
        return $this->hasMany('App\Classes');
    }

    public function PesantrenType()
    {
        return $this->hasMany('App\PesantrenType');
    }
}
