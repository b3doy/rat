<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RAT-1.0 || Home',
            'user' => user()->fullname
        ];
        return view('home/index', $data);
    }

    public function blank()
    {
        $data = [
            'title' => 'RAT-1.0'
        ];
        return view('home/blank', $data);
    }
}
