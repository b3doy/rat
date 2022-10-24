<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelKemungkinanModel extends Model
{
    protected $table = 'level_kemungkinan_resiko';

    public function getLevelKemungkinan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
