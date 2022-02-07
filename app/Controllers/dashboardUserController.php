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
            'listBooks' => $bookModel->findAll(),

        ];



        return view('dashboardUser/index', $data);
    }

    public function editBook($isbn)
    {
        $book = new \App\Models\BooksModel();
        $data['book'] = $book->find($isbn);
        return view('dashboardUser/editBook', $data);
    }

    public function updateBook($isbn)
    {
        $book = new \App\Models\BooksModel();
        $book->find($isbn);
        $data = [
            'isbn' => $this->request->getPost('isbn'),
            'title' => $this->request->getPost('title'),
            'edition_year' => $this->request->getPost('edition_year'),
            'language' => $this->request->getPost('language'),
            'resume_book' => $this->request->getPost('resume_book'),

        ];
        $book->update($isbn, $data);
        return redirect()->to(base_url('dashboardUser'))->with('status', 'mise a jour éffectuée avec succes');
    }

    public function deleteBook($isbn)
    {
        $book = new \App\Models\BooksModel();
        $book->delete($isbn);
        return redirect()->to(base_url('dashboardUser'))->with('status', 'livre supprimer avec success');
    }

    function searchApi()
    {
        $userSearch = $_POST['userSearch'];
        $resultApi = json_decode(file_get_contents('https://www.googleapis.com/books/v1/volumes?q=' . $userSearch));
        $data2 = [
            'result' => $resultApi
        ];
        return $data2;
    }
}
