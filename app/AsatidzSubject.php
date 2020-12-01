<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsatidzSubject extends Model
{
    protected $fillable = ['subject_id', 'asatidz_id'];

    public function Asatidz()
    {
        return $this->belongsTo('App\Asatidz');
    }
}
