<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
       return view('auth/login');
    }

    public function register(){
        return view('auth/register');
    }

    public function save(){
        $validation = $this->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'email'=>'required|valid_email|is_unique[users.emai]',
            'password'=>'required|min_lenght[5]|max_lenght[12]',
            'cpassword'=>'required|min_lenght[5]|max_lenght[12]|matches[password]',



        ]);
    }

}