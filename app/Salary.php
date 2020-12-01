<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['asatidz_id', 'pesantren_id', 'amount', 'date', 'received', 'file'];

    public function Asatidz()
    {
        return $this->belongsTo('App\Asatidz')->withTrashed();
    }
}
