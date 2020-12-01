<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillTransaction extends Model
{
    protected $fillable = ['bill_id', 'santri_id', 'pay_date', 'status'];

    public function Bill()
    {
        return $this->belongsTo('App\Bill');
    }

    public function Santri()
    {
        return $this->belongsTo('App\Santri');
    }
}
