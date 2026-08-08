<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $mahasiswaModel;
    protected $allowedFields = [
        'nim',
        'nama_mahasiswa',
        'prodi',
        'id_kelompok'
    ];

    /*
    ============================================
                LOGIN
    ============================================
    */

    public function loginMahasiswa($nama,$nim)
    {
        return $this->where('nama_mahasiswa',$nama)
                    ->where('nim',$nim)
                    ->first();
    }

    /*
    ============================================
            DASHBOARD ADMIN
    ============================================
    */

    public function jumlahMahasiswa()
    {
        return $this->countAllResults();
    }

    /*
    ============================================
            CRUD
    ============================================
    */

    public function getMahasiswa($search=null,$prodi=null)
    {
        $builder = $this;

        if($search){

            $builder->groupStart()
                    ->like('nim',$search)
                    ->orLike('nama_mahasiswa',$search)
                    ->groupEnd();

        }

        if($prodi){

            $builder->where('prodi',$prodi);

        }

        return $builder
                ->orderBy('prodi','ASC')
                ->orderBy('nim','ASC')
                ->findAll();
    }

    public function getMahasiswaById($id)
    {
        return $this->find($id);
    }

    public function tambahMahasiswa($data)
    {
        return $this->insert($data);
    }

    public function updateMahasiswa($id,$data)
    {
        return $this->update($id,$data);
    }

    public function hapusMahasiswa($id)
    {
        return $this->delete($id);
    }

    /*
    ============================================
            DASHBOARD MAHASISWA
    ============================================
    */

    public function getDashboardMahasiswa($nim)
    {
        return $this->select("
                mahasiswa.*,
                kelompok.nama_kelompok
            ")
            ->join(
                'kelompok',
                'kelompok.id = mahasiswa.id_kelompok',
                'left'
            )
            ->where('mahasiswa.nim',$nim)
            ->first();
    }

    /*
    ============================================
            INFORMASI KKN
    ============================================
    */

    public function getInformasiKKN($nim)
    {
        return $this->select("
                mahasiswa.*,
                kelompok.nama_kelompok,
                dosen.nama_dosen,
                lokasi.desa,
                lokasi.dusun,
                lokasi.kecamatan,
                lokasi.kabupaten
            ")

            ->join(
                'kelompok',
                'kelompok.id = mahasiswa.id_kelompok',
                'left'
            )

            ->join(
                'dosen',
                'dosen.id = kelompok.id_dpl',
                'left'
            )

            ->join(
                'lokasi',
                'lokasi.id = kelompok.id_lokasi',
                'left'
            )

            ->where(
                'mahasiswa.nim',
                $nim
            )

            ->first();
    }

    /*
    ============================================
            ANGGOTA KELOMPOK
    ============================================
    */

    public function getAnggotaKelompok($idKelompok)
    {
        return $this->where(
                    'id_kelompok',
                    $idKelompok
                )

                ->orderBy(
                    'nama_mahasiswa',
                    'ASC'
                )

                ->findAll();
    }

    public function getTemanKelompok($idKelompok,$nim)
    {
        return $this->where(
                    'id_kelompok',
                    $idKelompok
                )

                ->where(
                    'nim !=',
                    $nim
                )

                ->findAll();
    }

    /*
    ============================================
            PLOTTING
    ============================================
    */

    public function getBelumKelompok()
    {
        return $this->where('id_kelompok',null)
                    ->orWhere('id_kelompok',0)
                    ->findAll();
    }

   public function getByKelompok($idKelompok)
{
    return $this->where('id_kelompok', $idKelompok)
                ->orderBy('nama_mahasiswa', 'ASC')
                ->findAll();
}

}