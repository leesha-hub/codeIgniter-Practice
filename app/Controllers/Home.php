<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "master rebase commit";
        exit;
        return view('welcome_message');
    }
}


