<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['pesantren_id', 'santri_id', 'type', 'sender', 'message'];

    public function Pesantren()
    {
        return $this->belongsTo('App\Pesantren');
    }

    public function Santri()
    {
        return $this->belongsTo('App\Santri');
    }
}
