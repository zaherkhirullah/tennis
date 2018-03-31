<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Models\Kiralayan;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
      'full_name','email','phone_number',
      'password','isDeleted',
     ];
     protected $hidden = [
        'password', 'remember_token',
    ];
  
      public function user_id()
      {
        return Auth::id();
      } 
      public function Role()
      {
          return $this->belongsTo( 'App\Http\Models\Role', 'role_id' );
      }
     // list All users
     public function users()
     {
      return $this->where([['isDeleted','0'],['role_id','2']])->orderBy('created_at','desc');
     }
    // list of  users has been deleted and list (Desc) by create date
     public function deletedUsers()
     {
      return $this->where(['isDeleted','1'],['role_id','2'])->orderBy('updated_at','desc');
     }

     public function Rezervasyons()
     {
         return $this->hasMany( 'App\Http\Models\Rezervasyon' );
     }  
     public function Kiralayan()
    {
        return $this->belongsTo(Kiralayan::class);
    }  
}
