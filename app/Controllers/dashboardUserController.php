<?php

namespace App\Controllers;

class DashboardUserController extends BaseController
{
    public function index()
    {
        // recup des user infos
        $usersModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $bookModel = new \App\Models\BooksModel();

        $data = [
            'title' => 'DashboardUser',
            'userInfo' => $userInfo,
            'listBooks' => $bookModel->findAll()
        ];
        return view('dashboardUser/index', $data);
    }
}
