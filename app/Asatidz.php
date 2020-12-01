<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asatidz extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'nip', 'name', 'npwp', 'ktp', 'religion', 'gender', 'address', 'phone', 'birthplace', 'birthdate', 'additional_task', 'marriage_status', 'employee_status', 'photo'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Schedule()
    {
        return $this->hasMany('App\Schedule');
    }

    public function Tahfidz()
    {
        return $this->hasMany('App\Tahfidz');
    }

    public function Absent()
    {
        return $this->hasMany('App\Absent');
    }
}
