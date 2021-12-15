<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use App\Libraries\Hash;

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
        // $validation = $this->validate([
        //     'lastname'=>'required',
        //     'firstname'=>'required',
        //     'email'=>'required|valid_email',
        //     'password'=>'required|min_lenght[5]|max_lenght[12]',
        //     'cpassword'=>'required|min_lenght[5]|max_lenght[12]|matches[password]',
        // ]);

        $validation = $this->validate([
            'lastname'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nom de famille requis'
                ]
                ],
                'firstname'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Nom de famille requis'
                    ]
                    ],
                'email'=>[
                    'rules'=>'required|valid_email',
                    'errors'=>[
                        'required'=>'Email requis',
                        'valid_email'=>'vous devez indiquez un email valide'
                    ]
                    ],
                    'password'=>[
                        'rules'=>'required|min_length[5]|max_length[12]',
                        'errors'=>[
                            'required'=>'Mot de passe requis',
                            'min_length'=>'Votre mot de passe doit contenir minimum 5 caractères',
                            'max_length'=>'Votre mot de passe doit contenir maximun 12 caractères'
                        ]
                        ],
                        'cpassword'=>[
                            'rules'=>'required|matches[password]',
                            'errors'=>[
                                'required'=>'Confirmation de mot de passe requis',
                                'matches'=>'La confirmation doit correspondre au mot de passe '
                            ]
                            ],
            ]);

        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else{
           //enregistrement en DB
           $lastname =$this->request->getPost('lastname');
           $firstname =$this->request->getPost('firstname');
           $email =$this->request->getPost('email');
           $password =$this->request->getPost('password');

           $values= [
               'lastname'=>$lastname,
               'firstname'=>$firstname,
               'email'=>$email,
               'password'=>Hash::make($password),

           ];
           $userModel = new \App\Models\UsersModel();
           $query = $userModel->insert($values);
           if(!$query){
               return redirect()->back()->with('fail','erreur d enregistrement');
            //    return redirect()->to('register')->with('fail','error');
           }else{
            return redirect()->to('auth/register')->with('success','enregistrement ok');
           }
        }

    }
}

