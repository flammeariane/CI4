<?php

namespace App\Models;

use CodeIgniter\Model;

class LibraryModel extends Model
{
    protected $table = 'library';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_users', 'isbn', 'buy_date', 'add_date', 'favorite', 'whish'];
    protected $returnType    = \App\Entities\LibraryEntity::class;
}
