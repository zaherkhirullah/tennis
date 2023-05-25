<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServisTableSeeder extends Seeder
{
    
    public function run()
    {
        $service = new Service;

        $service->name ='service A';
        $service->number_plate ='542154';
        $service->driver_name ='ahmet';
        $service->driver_phone ='5061442151';
        $service->save();

        Service::create([
            'name'=>'service B',
            'number_plate'=>'544564',
            'driver_name'=>'alican',
            'driver_phone'=>'5511463352',
        ]);
        Service::create([
            'name'=>'service C',
            'number_plate'=>'251241',
            'driver_name'=>'alican',
            'driver_phone'=>'5123456789',
        ]);
        Service::create([
            'name'=>'service D',
            'number_plate'=>'544564',
            'driver_name'=>'mehmet',
            'driver_phone'=>'5515215214',
        ]);
    }
}
