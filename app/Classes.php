<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;
    
    protected $table = 'classes';
    protected $fillable = ['pesantren_id', 'grade', 'name'];

    public function Santri()
    {
        return $this->hasMany('App\Santri', 'class_id');
    }
}
