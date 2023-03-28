<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "develop commit";
        exit;
        return view('welcome_message');
    }
}
