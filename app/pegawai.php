<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'pegawai';

    function user() {
        return $this->belongsTo(user::class, 'user_id' ,'id');
    }
}
