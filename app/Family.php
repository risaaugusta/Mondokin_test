<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['user_id', 'name', 'nik', 'educational', 'status', 'birthplace', 'birthdate', 'occupation', 'income'];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
