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
        $renter = new \App\Models\Renter;
        
        $renter->name='Admin';
        $renter->phone='05511545521';
        $renter->save();
        
        $user->id =  $renter->id;
        $user->email='admin@gmail.com';
        $user->cinsiyet='syrian';
        $user->yas=22;
        $user->password=bcrypt('password');
        $user->save();
    }
}
