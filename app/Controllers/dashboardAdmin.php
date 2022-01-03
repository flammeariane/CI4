<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        // recup des user infos
        $usersModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $data = [
            'title' => 'DashboardAdmin',
            'userInfo' => $userInfo
        ];
        return view('dashboardAdmin/index', $data);
    }
}
