<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'class_id', 'nis', 'name', 'gender', 'birthplace', 'birthdate', 'religion', 'postal', 'address', 'pesantren_type_id', 'phone', 'photo', 'balance', 'is_verified'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Classes()
    {
        return $this->belongsTo('App\Classes', 'class_id');
    }

    public function Tahfidz()
    {
        return $this->hasMany('App\Tahfidz');
    }

    public function Report()
    {
        return $this->hasMany('App\Report');
    }

    public function PesantrenType()
    {
        return $this->belongsTo('App\PesantrenType')->withTrashed();
    }
}
