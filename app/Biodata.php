<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    function user() {
        return $this->belongsTo(user::class, 'user_id' ,'id');
    }
}
