<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {

        $validation = $this->validate([
            'lastname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nom de famille requis'
                ]
            ],
            'firstname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prénom requis'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email requis',
                    'valid_email' => 'vous devez indiquez un email valide'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Mot de passe requis',
                    'min_length' => 'Votre mot de passe doit contenir minimum 5 caractères',
                    'max_length' => 'Votre mot de passe doit contenir maximun 12 caractères'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Confirmation de mot de passe requis',
                    'matches' => 'La confirmation doit correspondre au mot de passe '
                ]
            ],
        ]);

        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            //enregistrement en DB
            $lastname = $this->request->getPost('lastname');
            $firstname = $this->request->getPost('firstname');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $email,
                'password' => $password,
                // 'password' => Hash::hash_password($password),

            ];
            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'erreur d enregistrement');
                //    return redirect()->to('register')->with('fail','error');
            } else {
                // return redirect()->to('auth/register')->with('success', 'enregistrement ok');
                $last_id = $usersModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboardUser');
            }
        }
    }

    function Check()
    {
        //verification des données introduite par le user dans le formulaire 
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email requis',
                    'valid_email' => 'veuillez entrer un email valide',
                    'is_not_unique' => 'email non trouvé, veuillez entrer un email enregistré'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Mot de passe requis',
                    'min_length' => 'minimun 5 caractère requis',
                    'max_length' => 'maximun 12 caractères authorisés',
                ]
            ]
        ]);

        // verification de la correspondance des donnée introduite dans la DB

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            // $check_password = Hash::verify_hash($password, $user_info['password']);
            $check_password = $this->request->getPost('password');

            session()->set('isAdmin', $user_info->admin);


            if (!$check_password) {
                session()->setFlashdata('fail', 'incorrect password');
                return redirect()->to('/auth')->withInput();
            } else {
                //store info du user si loggin reussi
                $user_id = $user_info->id;
                session()->set('loggedUser', $user_id);
                if ($user_info->admin == 1) {
                    return redirect()->to('/dashboardAdmin');
                }
                return redirect()->to('/dashboardUser');
                //TODO separer user&admin pour la redirection dashboard
            }
        }
    }

    function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail', 'vous êtes déconnecté');
        }
    }
}
