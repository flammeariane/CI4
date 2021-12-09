<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
    
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
            'email'=>'required|valid_email',
            'password'=>'required|min_lenght[5]|max_lenght[12]',
            'cpassword'=>'required|min_lenght[5]|max_lenght[12]|matches[password]',
        ]);

        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            echo 'Formulaire valide';
        }

    }
}