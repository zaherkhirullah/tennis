<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    'durum'
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
      return $this->where([['durum','0']])->orderBy('created_at','desc');
     }
    // list of  users has been deleted and list (Desc) by create date
     public function deletedUsers()
     {
      return $this->where(['durum','1'])->orderBy('updated_at','desc');
     }
 
     public function Kiralayan()
     {
         return $this->hasOne('App\Http\Models\Kiralayan','id');
     }  
  
     
}
