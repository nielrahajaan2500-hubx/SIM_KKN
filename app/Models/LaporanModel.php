<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'id_proker',
        'judul_laporan',
        'deskripsi',
        'foto',
        'file_laporan',
        'tanggal_upload',
        'status',
        'catatan_dpl',
        'uploaded_by'
    ];

    /*
    ============================================
            SEMUA LAPORAN
    ============================================
    */

    public function getLaporan()
    {
        return $this->select("
                laporan.*,
                proker.judul_proker,
                kelompok.nama_kelompok
            ")

            ->join(
                'proker',
                'proker.id = laporan.id_proker',
                'left'
            )

            ->join(
                'kelompok',
                'kelompok.id = proker.id_kelompok',
                'left'
            )

            ->orderBy(
                'tanggal_upload',
                'DESC'
            )

            ->findAll();
    }

    /*
    ============================================
            DETAIL LAPORAN
    ============================================
    */

    public function getLaporanById($id)
    {
        return $this->select("
                laporan.*,
                proker.judul_proker,
                kelompok.nama_kelompok
            ")

            ->join(
                'proker',
                'proker.id = laporan.id_proker',
                'left'
            )

            ->join(
                'kelompok',
                'kelompok.id = proker.id_kelompok',
                'left'
            )

            ->where(
                'laporan.id',
                $id
            )

            ->first();
    }

    /*
    ============================================
            LAPORAN KELOMPOK
    ============================================
    */

    public function getLaporanKelompok($idKelompok)
    {
        return $this->select("
                laporan.*,
                proker.judul_proker
            ")

            ->join(
                'proker',
                'proker.id = laporan.id_proker',
                'left'
            )

            ->where(
                'proker.id_kelompok',
                $idKelompok
            )

            ->orderBy(
                'tanggal_upload',
                'DESC'
            )

            ->findAll();
    }

    /*
    ============================================
            JUMLAH LAPORAN
    ============================================
    */

    public function jumlahLaporanKelompok($idKelompok)
    {
        return $this->select('laporan.id')

            ->join(
                'proker',
                'proker.id = laporan.id_proker'
            )

            ->where(
                'proker.id_kelompok',
                $idKelompok
            )

            ->countAllResults();
    }

    /*
    ============================================
            CRUD
    ============================================
    */

    public function tambahLaporan($data)
    {
        return $this->insert($data);
    }

    public function updateLaporan($id,$data)
    {
        return $this->update($id,$data);
    }

    public function hapusLaporan($id)
    {
        return $this->delete($id);
    }

    /*
    ============================================
            VALIDASI DPL
    ============================================
    */

    public function approveLaporan($id,$catatan='')
    {
        return $this->update($id,[

            'status'=>'Disetujui',

            'catatan_dpl'=>$catatan

        ]);
    }

    public function tolakLaporan($id,$catatan='')
    {
        return $this->update($id,[

            'status'=>'Revisi',

            'catatan_dpl'=>$catatan

        ]);
    }

    /*
    ============================================
            DASHBOARD
    ============================================
    */

    public function jumlahLaporanDosen($idDosen)
{
    return $this->select('laporan.id')
                ->join('proker','proker.id=laporan.id_proker')
                ->join('kelompok','kelompok.id=proker.id_kelompok')
                ->where('kelompok.id_dpl',$idDosen)
                ->countAllResults();
}
/*
============================================
        LAPORAN DOSEN
============================================
*/

public function getLaporanDosen($idDosen)
{
    return $this->select("
            laporan.*,
            proker.judul_proker,
            kelompok.id as id_kelompok,
            kelompok.nama_kelompok,
            mahasiswa.nama_mahasiswa
        ")

        ->join(
            'proker',
            'proker.id = laporan.id_proker'
        )

        ->join(
            'kelompok',
            'kelompok.id = proker.id_kelompok'
        )

        ->join(
            'mahasiswa',
            'mahasiswa.id_kelompok = kelompok.id'
        )

        ->where(
            'kelompok.id_dpl',
            $idDosen
        )

        ->groupBy('laporan.id')

        ->orderBy(
            'laporan.tanggal_upload',
            'DESC'
        )

        ->findAll();
}
}