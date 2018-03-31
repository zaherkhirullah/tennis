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
        $user->full_name='Admin';
        $user->username='admin';
        $user->phone_number='05511445521';
        $user->email='admin@gmail.com';
        $user->role_id= 1;
        $user->password=bcrypt('password');
        $user->save();
    }
}
