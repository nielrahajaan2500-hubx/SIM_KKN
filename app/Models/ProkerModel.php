<?php

namespace App\Models;

use CodeIgniter\Model;

class ProkerModel extends Model
{
    protected $table = 'proker';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'id_kelompok',
        'judul_proker',
        'bidang',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'catatan_dpl',
        'created_by'
    ];

    /*
    ============================================
            SEMUA PROGRAM KERJA
    ============================================
    */

    public function getProker()
    {
        return $this->select("
                proker.*,
                kelompok.nama_kelompok
            ")
            ->join(
                'kelompok',
                'kelompok.id = proker.id_kelompok',
                'left'
            )
            ->orderBy(
                'proker.tanggal_mulai',
                'DESC'
            )
            ->findAll();
    }

    /*
    ============================================
            DETAIL PROGRAM KERJA
    ============================================
    */

    public function getProkerById($id)
    {
        return $this->select("
                proker.*,
                kelompok.nama_kelompok
            ")
            ->join(
                'kelompok',
                'kelompok.id = proker.id_kelompok',
                'left'
            )
            ->where(
                'proker.id',
                $id
            )
            ->first();
    }

    /*
    ============================================
            PROKER PER KELOMPOK
    ============================================
    */

    public function getByKelompok($idKelompok)
    {
        return $this->where(
                    'id_kelompok',
                    $idKelompok
                )
                ->orderBy(
                    'tanggal_mulai',
                    'DESC'
                )
                ->findAll();
    }

    /*
    ============================================
            ALIAS PROKER KELOMPOK
    ============================================
    */

    public function getProkerKelompok($idKelompok)
    {
        return $this->getByKelompok($idKelompok);
    }

    /*
    ============================================
            JUMLAH PROKER KELOMPOK
    ============================================
    */

    public function jumlahProkerKelompok($idKelompok)
    {
        return $this->where(
                    'id_kelompok',
                    $idKelompok
                )
                ->countAllResults();
    }

    /*
    ============================================
            PROKER DOSEN PEMBIMBING
    ============================================
    */

    public function getProkerDosen($idDosen)
    {
        return $this->select("
                proker.*,
                kelompok.nama_kelompok
            ")
            ->join(
                'kelompok',
                'kelompok.id = proker.id_kelompok',
                'left'
            )
            ->where(
                'kelompok.id_dpl',
                $idDosen
            )
            ->orderBy(
                'proker.tanggal_mulai',
                'DESC'
            )
            ->findAll();
    }

    /*
    ============================================
            TAMBAH PROGRAM KERJA
    ============================================
    */

    public function tambahProker($data)
    {
        return $this->insert($data);
    }

    /*
    ============================================
            UPDATE PROGRAM KERJA
    ============================================
    */

    public function updateProker($id, $data)
    {
        return $this->update(
            $id,
            $data
        );
    }

    /*
    ============================================
            HAPUS PROGRAM KERJA
    ============================================
    */

    public function hapusProker($id)
    {
        return $this->delete($id);
    }

    /*
    ============================================
            SETUJUI PROGRAM KERJA
    ============================================
    */

    public function approveProker($id, $catatan = '')
    {
        return $this->update(
            $id,
            [
                'status' => 'Disetujui',
                'catatan_dpl' => $catatan
            ]
        );
    }

    /*
    ============================================
            TOLAK PROGRAM KERJA
    ============================================
    */

    public function tolakProker($id, $catatan = '')
    {
        return $this->update(
            $id,
            [
                'status' => 'Ditolak',
                'catatan_dpl' => $catatan
            ]
        );
    }

    /*
    ============================================
            JUMLAH SEMUA PROKER
    ============================================
    */

   public function jumlahProkerDosen($idDosen)
{
    return $this->select('proker.id')
                ->join('kelompok','kelompok.id = proker.id_kelompok')
                ->where('kelompok.id_dpl',$idDosen)
                ->countAllResults();
}
}