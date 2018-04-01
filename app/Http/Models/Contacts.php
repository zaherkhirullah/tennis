<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['adi','email','konu','mesaje','isDeleted',];
    
    public function AllContacts()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedContacts()
    {
        return $this->where(['isDeleted',1])->orderBy('updated_at','desc');
        
    }
    
}
