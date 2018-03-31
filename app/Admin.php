<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Models\Kiralayan;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $fillable = [
      'full_name','email','password',
      'isDeleted',
     ];
     protected $hidden = [
        'password', 'remember_token',
    ];

    
     // list All users
     public function admins()
     {
      return $this->where(['isDeleted','0'])->orderBy('created_at','desc');
     }
    // list of  users has been deleted and list (Desc) by create date
     public function deletedAdmins()
     {
      return $this->where(['isDeleted','1'])->orderBy('updated_at','desc');
     }

}
