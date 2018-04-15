<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Models\Kiralayan;

use Illuminate\Http\Request;

use App\User;
use Session;
use Auth;
class UserController extends Controller
{

        public function index()
        {
    
        }
        public function hesabim()
        {
                $kiralayan = Kiralayan::find(Auth::id());
                $rezervasyonlar= $kiralayan->Rezervasyons()->get();
                return view('users.hesabim',compact([
                        'rezervasyonlar',
                ]));
    
        }

    
}
