<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'img';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'img_name', 'active', "url"];
    protected $returnType    = \App\Entities\ImageEntity::class;
}
