<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo "develop rebase";
        exit;
        return view('welcome_message');
    }
}
