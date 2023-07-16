<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users'; //nama table di DB
    protected $fillable = ['nama', 'email', 'password'];
    
    protected $hidden = [
        'password',
    ];
    
    // join di tabel biodata pengguna antara tabel (users dan biodata)
    public function biodata(){
        return $this->belongsTo(Biodata::class, 'id', 'user_id');
    }
    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'id', 'user_id');
    }
}
