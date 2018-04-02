<?php

use Illuminate\Database\Seeder;

class KortTypeTableSeeder extends Seeder
{
  
    public function run()
    {
      
        $type1 = new \App\Http\Models\KortType;
        
        $type1->isim ='Tekli';
        $type1->saat_fiyati = 10 ;
        $type1->saat_puani = 5 ;
        $type1->save();
        
        $type2 = new \App\Http\Models\KortType;
        
        $type2->isim ='Ciftli';
        $type2->saat_fiyati = 15 ;
        $type2->saat_puani = 5 ;
        $type2->save();
    }
}
