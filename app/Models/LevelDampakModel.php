<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelDampakModel extends Model
{
    protected $table = 'level_dampak_resiko';

    public function getLevelDampak($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
