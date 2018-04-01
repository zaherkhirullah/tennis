<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['adi','email','konu','mesaje',];
    
    public function AllContacts()
    {
        return $this->orderBy('created_at','desc');
    }
    public function AllDeletedContacts()
    {
        return $this->orderBy('updated_at','desc');
        
    }
    
}
