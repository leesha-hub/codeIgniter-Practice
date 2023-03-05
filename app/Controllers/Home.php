<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        exit;
        return view('welcome_message');
    }
}
