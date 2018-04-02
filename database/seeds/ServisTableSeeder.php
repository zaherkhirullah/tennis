<?php

use Illuminate\Database\Seeder;

class ServisTableSeeder extends Seeder
{
    
    public function run()
    {
        $servis = new \App\Http\Models\Servis;
        
        $servis->isim ='servis_A';
        $servis->plaka ='542154';
        $servis->sofor_adi ='ahmet';
        $servis->sofor_numarasi ='5061442151';
        $servis->save();
    }
}
