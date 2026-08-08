<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nidn',
        'nama_dosen'
    ];

    /*
    =====================================
                LOGIN
    =====================================
    */

    public function loginDosen($nama, $nidn)
    {
        return $this->where('nama_dosen', $nama)
                    ->where('nidn', $nidn)
                    ->first();
    }

    public function getByNidn($nidn)
    {
        return $this->where('nidn', $nidn)
                    ->first();
    }

    /*
    =====================================
            DASHBOARD ADMIN
    =====================================
    */

    public function jumlahDosen()
    {
        return $this->countAllResults();
    }

    /*
    =====================================
                CRUD
    =====================================
    */

    public function getDosen($search = null)
    {
        $builder = $this;

        if ($search) {

            $builder->groupStart()
                    ->like('nidn', $search)
                    ->orLike('nama_dosen', $search)
                    ->groupEnd();

        }

        return $builder->orderBy('nama_dosen', 'ASC')
                       ->findAll();
    }

    public function getDosenById($id)
    {
        return $this->find($id);
    }

    public function tambahDosen($data)
    {
        return $this->insert($data);
    }

    public function updateDosen($id, $data)
    {
        return $this->update($id, $data);
    }

    public function hapusDosen($id)
    {
        return $this->delete($id);
    }

}