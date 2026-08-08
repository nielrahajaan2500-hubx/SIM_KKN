<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokModel extends Model
{
    protected $table = 'kelompok';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'nama_kelompok',
        'id_lokasi',
        'id_dpl',
        'catatan_dpl'
    ];

    /*
    =====================================
            DASHBOARD ADMIN
    =====================================
    */

    public function jumlahKelompok()
    {
        return $this->countAllResults();
    }

    /*
    =====================================
            CRUD KELOMPOK
    =====================================
    */

    public function getKelompok()
    {
        return $this->orderBy('nama_kelompok', 'ASC')
                    ->findAll();
    }

    public function getKelompokById($id)
    {
        return $this->find($id);
    }

    public function tambahKelompok($data)
    {
        return $this->insert($data);
    }

    public function updateKelompok($id, $data)
    {
        return $this->update($id, $data);
    }

    public function hapusKelompok($id)
    {
        return $this->delete($id);
    }

    /*
    =====================================
        DATA KELOMPOK + JOIN
    =====================================
    */

    public function getKelompokLengkap()
    {
        return $this->select('
                kelompok.*,
                lokasi.desa,
                lokasi.dusun,
                lokasi.kecamatan,
                lokasi.kabupaten,
                dosen.nama_dosen
            ')
            ->join('lokasi', 'lokasi.id = kelompok.id_lokasi', 'left')
            ->join('dosen', 'dosen.id = kelompok.id_dpl', 'left')
            ->orderBy('nama_kelompok', 'ASC')
            ->findAll();
    }

    /*
    =====================================
        DETAIL SATU KELOMPOK
    =====================================
    */

    public function getDetailKelompok($id)
    {
        return $this->select('
                kelompok.*,
                lokasi.*,
                dosen.nama_dosen
            ')
            ->join('lokasi', 'lokasi.id = kelompok.id_lokasi', 'left')
            ->join('dosen', 'dosen.id = kelompok.id_dpl', 'left')
            ->where('kelompok.id', $id)
            ->first();
    }
public function jumlahMahasiswaKelompok($idKelompok)
{
    return db_connect()
        ->table('mahasiswa')
        ->where('id_kelompok', $idKelompok)
        ->countAllResults();
}
   public function getKelompokDosen($idDosen)
{
    return $this->db->table('mahasiswa')

        ->select('
            kelompok.id,
            kelompok.nama_kelompok,
            mahasiswa.nama_mahasiswa,
            mahasiswa.prodi,
            lokasi.desa,
            lokasi.kecamatan,
            lokasi.kabupaten
        ')

        ->join('kelompok', 'kelompok.id = mahasiswa.id_kelompok')

        ->join('lokasi', 'lokasi.id = kelompok.id_lokasi')

        ->where('kelompok.id_dpl', $idDosen)

        ->orderBy('kelompok.nama_kelompok', 'ASC')

        ->orderBy('mahasiswa.nama_mahasiswa', 'ASC')

        ->get()

        ->getResultArray();
}
    public function jumlahKelompokDosen($idDosen)
{
    return $this->where('id_dpl', $idDosen)
                ->countAllResults();
}

}