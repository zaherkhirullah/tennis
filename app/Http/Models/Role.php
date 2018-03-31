<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','display_name',];
    
    public function users()
    {
        return $this ->hasMany( 'App\User', 'role_id' );
    }
     // list All users
     public function roles()
     {
      return $this->orderBy('created_at','desc');
     }
}
