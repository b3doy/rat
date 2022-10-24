<?php

namespace App\Libraries;

use App\Models\IdentifikasiModel;

date_default_timezone_set('Asia/Jakarta');


class Lib
{
    public function noRegResiko($id)
    {
        $identifikasiModel = new IdentifikasiModel();
        $noRegResiko = $identifikasiModel->setNoRegResiko($id);
        $urutan = (int) substr($noRegResiko, -2, 2);
        $urutan++;
        $noRegResiko = sprintf("%02s", $urutan);
        return $noRegResiko;
    }
}
