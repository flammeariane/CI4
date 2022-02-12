<?php

namespace App\Controllers;

use App\Models\QueryModel;
use App\Models\UsersModel;
use App\Models\BooksModel;
use App\Models\LibraryModel;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        // recup des user infos
        $usersModel = new UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $listBook = new BooksModel();
        $isAdmin = session()->get('isAdmin');


        $data = [
            'title' => 'DashboardAdmin',
            'userInfo' => $userInfo,
            'listUsers' => $usersModel->findAll(),
            'listBook' => $listBook->findAll(),
            'isAdmin' => $isAdmin
        ];
        //  var_dump($data['listUsers']);
        return view('dashboardAdmin/index', $data);
    }


    public function editUser($id)
    {
        $user = new UsersModel();
        $data['user'] = $user->find($id);
        return view('dashboardAdmin/editUser', $data);
    }

    public function updateUser($id)
    {
        $user = new UsersModel();
        $user->find($id);
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $user->find($loggedUserId);
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status' => $this->request->getPost('status'),
            'admin' => $this->request->getPost('admin'),
            'birthdate' => $this->request->getPost('birthdate'),
            'tel_number' => $this->request->getPost('tel_number'),
            'street' => $this->request->getPost('street'),
            'post_code' => $this->request->getPost('post_code'),

        ];
        $user->update($id, $data);
        if ($userInfo['admin'] == 1) {
            return redirect()->to(base_url('dashboardAdmin'))->with('status', 'mise a jour éffectuée avec succes');
        }
        return redirect()->to(base_url('dashboardUser'))->with('status', 'mise a jour éffectuée avec succes');
    }

    public function deleteUser($id)
    {
        $user = new UsersModel();
        $user->delete($id);
        return redirect()->to(base_url('dashboardAdmin'))->with('status', 'utilisateur supprimer avec success');
    }
}
