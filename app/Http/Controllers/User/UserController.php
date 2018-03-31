<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index()
    {
            // ornek
        $data['tasks'] = [
            [
                    'name' => 'Design New Dashboard',
                    'progress' => '87',
                    'color' => 'danger'
            ],
            [
                    'name' => 'Create Home Page',
                    'progress' => '76',
                    'color' => 'warning'
            ],
            [
                    'name' => 'Some Other Task',
                    'progress' => '32',
                    'color' => 'success'
            ],
            [
                    'name' => 'Start Building Website',
                    'progress' => '56',
                    'color' => 'info'
            ],
            [
                    'name' => 'Develop an Awesome Algorithm',
                    'progress' => '10',
                    'color' => 'success'
            ]
    ];
        return view("user.dashboard")->with($data);
    }

    
}
