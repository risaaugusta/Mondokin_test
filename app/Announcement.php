<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['pesantren_id', 'title', 'photo', 'description', 'start_date', 'end_date'];
}
