<?php namespace App\Controllers;

class DashboardUser extends BaseController
{
    public function index()
    {
        // recup des user infos
        $usersModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo =$usersModel->find($loggedUserId);
        $data=[
            'title'=>'DashboardUser',
            'userInfo'=>$userInfo
        ];
        return view('dashboardUser/index', $data);
    }
}