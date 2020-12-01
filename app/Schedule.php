<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['asatidz_id', 'name', 'day', 'start_time', 'end_time', 'status'];

    public function Asatidz()
    {
        return $this->belongsTo('App\Asatidz');
    }
}
