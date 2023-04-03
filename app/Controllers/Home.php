<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "master commit";
        exit;
        return view('welcome_message');
    }
}


