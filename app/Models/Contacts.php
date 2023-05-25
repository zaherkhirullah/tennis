<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

    public static function allList()
    {
        return Contacts::where('status', 0)->orderBy('created_at', 'desc')->get();
    }

    public static function allDeleted()
    {
        return Contacts::where('status', 9)->orderBy('updated_at', 'desc')->get();
    }
}
