<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            [
                'name' => 'Larry',
                'age' => 30
            ],
            [
                'name' => 'Bill',
                'age' => 10
            ],
            [
                'name' => 'Steve',
                'age' => 24
            ]
        ];

        return view('dashboard', [
            'users' => $users
        ]);
    }
}
