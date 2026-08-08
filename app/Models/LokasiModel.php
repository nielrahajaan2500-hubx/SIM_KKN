<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'kabupaten',
        'kecamatan',
        'desa',
        'dusun',
        'kuota',
        'status'
    ];

    /*
    =====================================
            DASHBOARD ADMIN
    =====================================
    */

    public function jumlahLokasi()
    {
        return $this->countAllResults();
    }

    /*
    =====================================
                CRUD
    =====================================
    */

    public function getLokasi($search = null, $kabupaten = null, $kecamatan = null)
    {
        $builder = $this;

        if (!empty($search)) {

            $builder->groupStart()
                ->like('desa', $search)
                ->orLike('kabupaten', $search)
                ->orLike('kecamatan', $search)
                ->groupEnd();
        }

        if (!empty($kabupaten)) {
            $builder->where('kabupaten', $kabupaten);
        }

        if (!empty($kecamatan)) {
            $builder->where('kecamatan', $kecamatan);
        }

        return $builder->orderBy('kabupaten', 'ASC')
                       ->orderBy('kecamatan', 'ASC')
                       ->orderBy('desa', 'ASC')
                       ->findAll();
    }

    public function getLokasiById($id)
    {
        return $this->find($id);
    }

    public function tambahLokasi($data)
    {
        return $this->insert($data);
    }

    public function updateLokasi($id, $data)
    {
        return $this->update($id, $data);
    }

    public function hapusLokasi($id)
    {
        return $this->delete($id);
    }

    /*
    =====================================
            FILTER DROPDOWN
    =====================================
    */

    public function getKabupaten()
    {
        return $this->select('kabupaten')
                    ->distinct()
                    ->orderBy('kabupaten', 'ASC')
                    ->findAll();
    }

    public function getKecamatan()
    {
        return $this->select('kecamatan')
                    ->distinct()
                    ->orderBy('kecamatan', 'ASC')
                    ->findAll();
    }
}