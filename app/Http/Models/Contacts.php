<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['adi','email','konu','mesaje','durum',];
    
    public function AllContacts()
    {
        return $this->where('durum',0)->orderBy('created_at','desc');
    }
    public function AllDeletedContacts()
    {
        return $this->where('durum',1)->orderBy('updated_at','desc');
        
    }
    
}
