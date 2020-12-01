<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topup extends Model
{
    use SoftDeletes;

    protected $fillable = ['santri_id', 'amount', 'notes', 'confirmation_photo', 'type', 'confirmed'];

    public function Santri()
    {
        return $this->belongsTo('App\Santri')->withTrashed();
    }
}
