<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['pesantren_id', 'code', 'name', 'amount', 'start_date', 'end_date', 'notes'];
}
