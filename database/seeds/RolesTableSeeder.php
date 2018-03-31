<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new App\Http\Models\Role();
        $role->name= 'admin';
        $role->display_name= 'Admins';
        $role->save();
        $role = new App\Http\Models\Role();
        $role->name= 'user';
        $role->display_name= 'Users';
        $role->save();
    }
}
