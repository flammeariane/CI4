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

    public function deleteBook($isbn)
    {
        $book = new \App\Models\BooksModel();
        $book->delete($isbn);
        return redirect()->to(base_url('dashboardUser'))->with('status', 'livre supprimer avec success');
    }
}
