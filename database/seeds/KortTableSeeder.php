<?php

use Illuminate\Database\Seeder;

class KortTableSeeder extends Seeder
{
  
    public function run()
    {
        $kort1 = new \App\Http\Models\Kort;
        $kort1->isim ='Kort_1_A';
        $kort1->type= 0 ;
        $kort1->saat_ucreti =10 ;
        $kort1->saat_puani = 5 ;
        $kort1->save();
      
        $kort2 = new \App\Http\Models\Kort;
        $kort2->isim ='Kort_1_B';
        $kort2->type = 0 ;
        $kort2->saat_ucreti =10 ;
        $kort2->saat_puani = 5 ;
        $kort2->save();
       
        $kort3 = new \App\Http\Models\Kort;
        $kort3->isim ='Kort_1_C';
        $kort3->type = 0 ;
        $kort3->saat_ucreti =10 ;
        $kort3->saat_puani = 5 ;
        $kort3->save();
       
        $kort4 = new \App\Http\Models\Kort;
        $kort4->isim ='Kort_1_D';
        $kort4->type =1 ;
        $kort4->saat_ucreti =10 ;
        $kort4->saat_puani = 5 ;
        $kort4->type =1 ;
        $kort4->save();
        
        $kort5 = new \App\Http\Models\Kort;
        $kort5->isim ='Kort_2_A';
        $kort5->type = 1 ;
        $kort5->saat_ucreti =15 ;
        $kort5->saat_puani = 7 ;
        $kort5->save();
        
        $kort6 = new \App\Http\Models\Kort;
        $kort6->isim ='Kort_2_B';
        $kort6->type = 1 ;
        $kort6->saat_ucreti =15 ;
        $kort6->saat_puani = 7 ;
        $kort6->save();
        
        $kort7 = new \App\Http\Models\Kort;
        $kort7->isim ='Kort_2_C';
        $kort7->type = 1 ;
        $kort7->saat_ucreti =15 ;
        $kort7->saat_puani = 7 ;
        $kort7->save();
        
        $kort8 = new \App\Http\Models\Kort;
        $kort8->isim ='Kort_2_D';
        $kort8->type = 1 ;
        $kort8->saat_ucreti =15 ;
        $kort8->saat_puani = 7 ;
        $kort8->save();
    }
}
