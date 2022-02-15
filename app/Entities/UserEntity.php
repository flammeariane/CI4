<?php

namespace App\Entities;

use App\Models\ImageModel;
use CodeIgniter\Entity\Entity;
use CodeIgniter\Images\Image;

class UserEntity extends Entity
{
    public function getImage()
    {
        $imageModel = new ImageModel();
        return $imageModel->where('id_user', $this->id)->find();
    }
}
