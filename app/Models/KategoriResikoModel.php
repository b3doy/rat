<?php 
namespace App\Models;

use CodeIgniter\Model;

class KategoriResikoModel extends Model
{
    protected $table = 'kategori_resiko';

    public function getKategoriResiko($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
