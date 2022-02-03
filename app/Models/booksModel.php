<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'isbn';
    protected $allowedFields = ['isbn', 'title', 'edition_year', 'language', 'resume_book'];
    protected $returnType    = \App\Entities\BookEntity::class;
}
