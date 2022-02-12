<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    function getMyLibrary($loggedUserId)
    {
        $value = 1;
        $builder = $this->db->table('book');
        $builder->join('library', 'book.isbn = library.isbn')->where('library.id_users', $loggedUserId);
        $data = $builder->get()->getResult();
        return $data;
    }

    function getMyfavorite($loggedUserId)
    {
        $builder = $this->db->table('book');
        $builder->join('library', 'book.isbn = library.isbn')->where('library.id_users', $loggedUserId)->where('favorite', '1');
        $data = $builder->get()->getResult();
        return $data;
    }

    function getMywhish($loggedUserId)
    {
        $builder = $this->db->table('book');
        $builder->join('library', 'book.isbn = library.isbn')->where('library.id_users', $loggedUserId)->where('whish', '1');
        $data = $builder->get()->getResult();
        return $data;
    }
}
