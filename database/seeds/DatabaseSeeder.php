<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
         $this->call(UsersTableSeeder::class);
         $this->call(ServisTableSeeder::class);
         $this->call(KortTypeTableSeeder::class);
         $this->call(KortTableSeeder::class);
    }
}
