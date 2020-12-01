<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahfidz extends Model
{
    protected $fillable = ['asatidz_id', 'santri_id', 'type', 'juz', 'ayat_first', 'ayat_end', 'page_first', 'page_end', 'notes'];

    public function Asatidz()
    {
        return $this->belongsTo('App\Asatidz');
    }

    public function Santri()
    {
        return $this->belongsTo('App\Santri');
    }
}
