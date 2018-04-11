<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Rezervasyon;
use App\Http\Models\Kiralayan;
use App\Http\Models\Servis;
use App\Http\Models\Kort;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth','admin']);
    }
    public function index()
    {
            $servisler      = Servis::take(5)->get();
            $rezervasyonlar = Rezervasyon::take(5)->get();
            $kiralayanlar   = Kiralayan::skip(1)->take(5)->get();
            $kortlar        = Kort::take(5)->get();
            $data =[
                'servisler' =>$servisler,
                'rezervasyonlar' =>$rezervasyonlar,
                'kiralayanlar' =>$kiralayanlar,
                'kortlar' =>$kortlar,
            ] ;
        return view("admin.dashboard")->with($data);
    }
}
