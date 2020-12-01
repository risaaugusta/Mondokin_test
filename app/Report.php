<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['santri_id', 'file', 'category', 'year', 'semester'];

    public function Santri()
    {
        return $this->belongsTo('App\Santri');
    }
}
