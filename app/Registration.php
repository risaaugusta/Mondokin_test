<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['pesantren_id', 'offline_document', 'description', 'requirement'];
}
