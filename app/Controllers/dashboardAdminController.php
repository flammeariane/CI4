<?php

namespace App\Controllers;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        // recup des user infos
        $usersModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);

        $data = [
            'title' => 'DashboardAdmin',
            'userInfo' => $userInfo,
            'listUsers' => $usersModel->findAll(),
        ];
        //  var_dump($data['listUsers']);
        return view('dashboardAdmin/index', $data);
    }


    public function editUser($id)
    {
        $user = new \App\Models\UsersModel();
        $data['user'] = $user->find($id);
        return view('dashboardAdmin/editUser', $data);
    }

    public function updateUser($id)
    {
        $user = new \App\Models\UsersModel();
        $user->find($id);
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'status' => $this->request->getPost('status'),
            'admin' => $this->request->getPost('admin'),
        ];
        $user->update($id, $data);
        return redirect()->to(base_url('dashboardAdmin'))->with('status', 'mise a jour éffectuée avec succes');
    }

    public function deleteUser($id)
    {
        $user = new \App\Models\UsersModel();
        $user->delete($id);
        return redirect()->to(base_url('dashboardAdmin'))->with('status', 'utilisateur supprimer avec success');
    }
}
