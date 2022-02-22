<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\BooksModel;
use App\Models\ImageModel;
use App\Models\QueryModel;
use App\Models\LibraryModel;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $usersModel = new UsersModel();
        $imageModel = new ImageModel();
        $listBook = new BooksModel();
        $QueryModel = new QueryModel($db);

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $isAdmin = session()->get('isAdmin');

        $data = [
            'userInfo' => $userInfo,
            'listUsers' => $usersModel->findAll(),
            'listBook' => $listBook->findAll(),
            'isAdmin' => $isAdmin,

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
        $imageModel = new ImageModel();
        $imagePath = new ImageModel();
        $imagePath->find();
        $user->find($id);
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $user->find($loggedUserId);

        $file = $this->request->getFile('userProfileImage');
        if ($file != '') {
            $name = $file->getRandomName();
            $file->move('./assets/img/', $name);


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
                'profil_img_name' => $name,
            ];
        } else {
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
        }


        $user->update($id, $data);
        if ($_SESSION['isAdmin']) {
            //fix redirect
            return redirect()->to(base_url('dashboardAdmin'))->with('status', 'mise a jour éffectuée avec succes');
        }
        return redirect()->to(base_url('dashboardAdmin'))->with('status', 'mise a jour éffectuée avec succes');
    }

    public function deleteUser($id)
    {
        $user = new UsersModel();
        $user->delete($id);
        return redirect()->to(base_url('dashboardAdmin'))->with('status', 'utilisateur supprimer avec success');
    }



    public function viewUserBook()
    {
        $db = db_connect();
        $usersModel = new UsersModel();

        $listBook = new BooksModel();
        $QueryModel = new QueryModel($db);

        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $isAdmin = session()->get('isAdmin');

        echo base_url();

        $data = [
            'userInfo' => $userInfo,
            'listUsers' => $usersModel->findAll(),
            'listBook' => $listBook->findAll(),
            'isAdmin' => $isAdmin,

        ];
        return view('dashboardAdmin/viewUserBook', $data);
    }

    public function action()
    {

        if ($this->request->getVar('user_id')) {
            $action = $this->request->getvar('user_id');

            $book = new LibraryModel();
            $bookdata =  $book->where('id_users', $this->request->getVar('user_id'))->findAll();

            echo ("<script>console.log('PHP: " . $bookdata . "');</script>");
            echo json_decode($bookdata);
        }
    }
};
