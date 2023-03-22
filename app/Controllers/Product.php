<?php

namespace App\Controllers;

class Product extends BaseController
{
    public function index()
    {
        echo "11111111111111111111111";
        exit;
        return view('index');
    }

    public function feature()
    {
        echo "rebase_test";
        exit;
        return view('index');
    }

    public function feature2($num)
    {
        echo "develop rebase";
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

    public function feature3()
    {
        echo "444444444444444444444444";
        exit;
        return view('index');
    }
}
