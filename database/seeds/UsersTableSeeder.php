<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $kiralayan = new \App\Http\Models\Kiralayan;
        
        $kiralayan->isim='Admin';
        $kiralayan->telefon='05511545521';
        $kiralayan->save();
        
        $user->id =  $kiralayan->id;
        $user->email='admin@gmail.com';
        $user->cinsiyet='syrian';
        $user->yas=22;
        $user->password=bcrypt('password');
        $user->save();
    }
}
