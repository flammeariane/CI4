<?php

namespace App\Models;

use CodeIgniter\Model;

class LibraryModel extends Model
{
    protected $table = 'library';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'isbn', 'buy_date', 'add_date', 'disponibility'];
    protected $returnType    = \App\Entities\LibraryEntity::class;
}
