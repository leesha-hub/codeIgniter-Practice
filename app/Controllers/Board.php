<?php

namespace App\Controllers;

class Board extends BaseController
{
    public function index()
    {
        echo "11111111111111111111111";
        exit;
        return view('index');
    }

    public function list()
    {
        echo "22222222222222222222222";
        exit;
        return view('index');
    }

    public function view($num)
    {
        // echo "33333333333333333333333";
        // echo $num;
        // print_r($this->request->getMethod());
        
        echo "<pre>";
        // echo var_dump($this->request);
        echo "</pre>";
        
        echo "<pre>";
        echo var_dump($this->request->uri);
        echo "</pre>";
        
        exit;
        return view('index');
    }

    public function view2()
    {
        echo "444444444444444444444444";
        exit;
        return view('index');
    }
}
