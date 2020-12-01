<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesantrenType extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['pesantren_id', 'name'];
}
