<?php

namespace App\Controllers;

use App\Models\QueryModel;
use App\Models\UsersModel;
use App\Models\BooksModel;
use App\Models\LibraryModel;
use CodeIgniter\HTTP\Request;

class DashboardUserController extends BaseController

{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $db = db_connect();
        $usersModel = new UsersModel();
        $bookModel = new BooksModel();
        $QueryModel = new QueryModel($db);

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);

        $data = [
            'userInfo' => $userInfo,
            'listBooks' => $bookModel->findAll(),
            'myLibrabry' => $QueryModel->getMyLibrary($loggedUserId)
        ];

        return view('dashboardUser/index', $data);
    }


    public function addBook()
    {
        $db = db_connect();
        $book = new BooksModel();
        $library = new LibraryModel();
        $usersModel = new UsersModel();
        $QueryModel = new QueryModel($db);
        $loggedUserId = session()->get('loggedUser');

        $data = [
            'isbn' => $this->request->getPost('isbn'),
            'title' => $this->request->getPost('title'),
            'edition_year' => $this->request->getPost('edition_year'),
            'language' => $this->request->getPost('language'),
            'resume_book' => $this->request->getPost('resume_book'),
        ];
        $book->insert($data);
        $libdata = [
            'isbn' => $this->request->getPost('isbn'),
            'id_users' => $loggedUserId
        ];
        $library->insert($libdata);

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


    function bookS()
    {
        return view('dashboardUser/book_search');
    }
}
