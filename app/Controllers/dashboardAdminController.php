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
            'listUsers' => $usersModel->getAllUsers(),
        ];
        //  var_dump($data['listUsers']);
        return view('dashboardAdmin/index', $data);
    }

    public function getUserList()
    {
    }
    public function updateUser()
    {
        $usersModel = new \App\Models\UsersModel();

        return $this->response->redirect(base_url('dashboardAdmin'));
    }

    public function deleteUser($id)
    {
        $usersModel = new \App\Models\UsersModel();
        $usersModel->delete($id);
        return $this->response->redirect(base_url('dashboardAdmin'));
    }
}
