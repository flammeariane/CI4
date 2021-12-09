<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['user'] = "David";
        return view('welcome_message',$data);
    }
}
