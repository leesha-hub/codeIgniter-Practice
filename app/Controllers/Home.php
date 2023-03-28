<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "developp commit";
        exit;
        return view('welcome_message');
    }
}
