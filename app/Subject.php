<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['pesantren_id', 'code', 'name', 'grade'];

    public function AsatidzSubject()
    {
        return $this->hasMany('App\AsatidzSubject');
    }
}
