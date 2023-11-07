<?php

namespace App\Models;

use CodeIgniter\Model;

class dbdModel extends Model
{
    protected $table = "dbd";
    protected $allowedFields = [
        'id',
        'tgl_pemeriksaan',
        'nama',
        'nik',
        'nama_ibu_kandung',
        'alamat',
        'alamat_domisili',
        'tgl_lahir',
        'jenis_kelamin'


    ];
}
