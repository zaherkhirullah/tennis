<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'id',
        'email',
        'password',
        'cinsiyet',
        'adres',
        'yas',
        'puan',
        'status'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_id()
    {
        return Auth::id();
    }

    // list All users
    public function users()
    {
        return $this->where([['status', '0']])->orderBy('created_at', 'desc');
    }

    // list of  users has been deleted and list (Desc) by create date
    public function deletedUsers()
    {
        return $this->where(['status', '1'])->orderBy('updated_at', 'desc');
    }

    public function Kiralayan()
    {
        return $this->hasOne('App\Models\Renter', 'id');
    }


}
