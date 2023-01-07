<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    protected $table = "crud";
    protected $primaryKey = "nim";
    protected $allowedFields = ['nim', 'nama_lengkap', 'kota_asal', 'tgl_lahir', 'nama_ortu', 'alamat_ortu', 'kode_pos', 'telp', 'setatus'];

    public function getAllData()
    {
        return $this->db->table('crud')->get();
    }

    public function tambah($data)
    {
        return $this->db->table('crud')->insert($data);
    }

    public function ubah($data, $nim)
    {
        return $this->db->table('crud')->update($data, ['nim' => $nim]);
    }
}
