<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Servis;
class ServisTableSeeder extends Seeder
{
    
    public function run()
    {
        $servis = new Servis;

        $servis->isim ='servis A';
        $servis->plaka ='542154';
        $servis->sofor_adi ='ahmet';
        $servis->sofor_numarasi ='5061442151';
        $servis->save();

        Servis::create([
            'isim'=>'servis B',
            'plaka'=>'544564',
            'sofor_adi'=>'alican',
            'sofor_numarasi'=>'5511463352',
        ]);
        Servis::create([
            'isim'=>'servis C',
            'plaka'=>'251241',
            'sofor_adi'=>'alican',
            'sofor_numarasi'=>'5123456789',
        ]);
        Servis::create([
            'isim'=>'servis D',
            'plaka'=>'544564',
            'sofor_adi'=>'mehmet',
            'sofor_numarasi'=>'5515215214',
        ]);
    }
}
