<?php

namespace App\Controllers;

use App\Models\CustomModel;
use App\Models\UsersModel;
use App\Models\BooksModel;
use App\Models\LibraryModel;

class DashboardUserController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $usersModel = new UsersModel();
        $bookModel = new BooksModel();
        $LibraryModel = new LibraryModel();
        $customModel = new CustomModel($db);

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);



        $data = [
            'title' => 'DashboardUser',
            'userInfo' => $userInfo,
            'listBooks' => $bookModel->findAll(),
            'Library' => $LibraryModel->findAll($loggedUserId),
            'myLibrabry' => $customModel->getMyLibrary($loggedUserId)
        ];

        return view('dashboardUser/index', $data);
    }

    public function addBook()
    {
        $book = new BooksModel();
        $data = [
            'isbn' => $this->request->getPost('isbn'),
            'title' => $this->request->getPost('title'),
            'edition_year' => $this->request->getPost('edition_year'),
            'language' => $this->request->getPost('language'),
            'resume_book' => $this->request->getPost('resume_book'),

        ];
        $book->update($data);
        return redirect()->to(base_url('dashboardUser'))->with('status', 'votre livre à été ajouté avec succes');
    }
    public function editBook($isbn)
    {
        $book = new BooksModel();
        $data['book'] = $book->find($isbn);
        return view('dashboardUser/editBook', $data);
    }

    public function updateBook($isbn)
    {
        $book = new BooksModel();
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
        $book = new BooksModel();
        $book->delete($isbn);
        return redirect()->to(base_url('dashboardUser'))->with('status', 'livre supprimé avec success');
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
