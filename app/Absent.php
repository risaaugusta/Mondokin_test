<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    protected $fillable = ['schedule_id', 'asatidz_id'];

    public function Schedule()
    {
        return $this->belongsTo('App\Schedule');
    }

    public function Asatidz()
    {
        return $this->belongsTo('App\Asatidz');
    }
}
