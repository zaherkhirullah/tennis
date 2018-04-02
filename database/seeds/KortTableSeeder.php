<?php

use Illuminate\Database\Seeder;

class KortTableSeeder extends Seeder
{
  
    public function run()
    {
        $kort1 = new \App\Http\Models\Kort;
        $kort1->isim ='Kort_1_A';
        $kort1->type_id = 1 ;
        $kort1->save();
        $kort2 = new \App\Http\Models\Kort;
        $kort2->isim ='Kort_1_B';
        $kort2->type_id = 1 ;
        $kort2->save();
        $kort3 = new \App\Http\Models\Kort;
        $kort3->isim ='Kort_1_C';
        $kort3->type_id = 1 ;
        $kort3->save();
        $kort4 = new \App\Http\Models\Kort;
        $kort4->isim ='Kort_1_D';
        $kort4->type_id = 1 ;
        $kort4->save();
        
        $kort5 = new \App\Http\Models\Kort;
        $kort5->isim ='Kort_2_A';
        $kort5->type_id = 2 ;
        $kort5->save();
        $kort6 = new \App\Http\Models\Kort;
        $kort6->isim ='Kort_2_B';
        $kort6->type_id = 2 ;
        $kort6->save();
        $kort7 = new \App\Http\Models\Kort;
        $kort7->isim ='Kort_2_C';
        $kort7->type_id = 2 ;
        $kort7->save();
        $kort8 = new \App\Http\Models\Kort;
        $kort8->isim ='Kort_2_D';
        $kort8->type_id = 2 ;
        $kort8->save();
    }
}
