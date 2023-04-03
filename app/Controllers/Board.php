<?php

namespace App\Controllers;

class Board extends BaseController
{
    public function index()
    {
        echo "develop rebase";
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
        echo "33333333333333333333333";
        // echo $num;
        // print_r($this->request->getMethod());
        
        //echo $this->uri->segment(1);

        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        echo "<pre>";
        echo var_dump($uriSegments);
        echo "</pre>";

        echo "<pre>";
        //echo var_dump($this->uri->segment_array());
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
