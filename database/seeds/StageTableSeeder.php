<?php

use Illuminate\Database\Seeder;

class StageTableSeeder extends Seeder
{

    public function run()
    {
        $stage1 = new \App\Models\Stage;
        $stage1->name = 'Stage_1_A';
        $stage1->type = 0;
        $stage1->hour_fee = 10;
        $stage1->hour_score = 5;
        $stage1->save();

        $stage2 = new \App\Models\Stage;
        $stage2->name = 'Stage_1_B';
        $stage2->type = 0;
        $stage2->hour_fee = 10;
        $stage2->hour_score = 5;
        $stage2->save();

        $stage3 = new \App\Models\Stage;
        $stage3->name = 'Stage_1_C';
        $stage3->type = 0;
        $stage3->hour_fee = 10;
        $stage3->hour_score = 5;
        $stage3->save();

        $stage4 = new \App\Models\Stage;
        $stage4->name = 'Stage_1_D';
        $stage4->type = 1;
        $stage4->hour_fee = 10;
        $stage4->hour_score = 5;
        $stage4->save();

        $stage5 = new \App\Models\Stage;
        $stage5->name = 'Stage_2_A';
        $stage5->type = 1;
        $stage5->hour_fee = 15;
        $stage5->hour_score = 7;
        $stage5->save();

        $stage6 = new \App\Models\Stage;
        $stage6->name = 'Stage_2_B';
        $stage6->type = 1;
        $stage6->hour_fee = 15;
        $stage6->hour_score = 7;
        $stage6->save();

        $stage7 = new \App\Models\Stage;
        $stage7->name = 'Stage_2_C';
        $stage7->type = 1;
        $stage7->hour_fee = 15;
        $stage7->hour_score = 7;
        $stage7->save();

        $stage8 = new \App\Models\Stage;
        $stage8->name = 'Stage_2_D';
        $stage8->type = 1;
        $stage8->hour_fee = 15;
        $stage8->hour_score = 7;
        $stage8->save();
    }
}
