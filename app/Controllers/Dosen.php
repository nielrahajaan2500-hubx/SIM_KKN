<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\KelompokModel;
use App\Models\ProkerModel;
use App\Models\LaporanModel;
use App\Models\MahasiswaModel;
class Dosen extends BaseController
{
    protected $dosenModel;
    protected $kelompokModel;
    protected $prokerModel;
    protected $laporanModel;
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->kelompokModel = new KelompokModel();
        $this->prokerModel = new ProkerModel();
        $this->laporanModel = new LaporanModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }

    /*
====================================================
                DASHBOARD DOSEN
====================================================
*/

public function index()
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $idDosen = session()->get('id');

    $data = [

        'title' => 'Dashboard Dosen',

        'jumlahKelompok' => $this->kelompokModel
                                 ->jumlahKelompokDosen($idDosen),

        'jumlahProker' => $this->prokerModel
                               ->jumlahProkerDosen($idDosen),

        'jumlahLaporan' => $this->laporanModel
                                ->jumlahLaporanDosen($idDosen),

    ];

    return view('dosen/dashboard',$data);
}

/*
====================================================
                MONITORING
====================================================
*/

public function monitoring()
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $idDosen = session()->get('id');

    $data = [

        'title' => 'Monitoring',

        'kelompok' => $this->kelompokModel
                           ->getKelompokDosen($idDosen)

    ];

    return view('dosen/monitoring',$data);
}
/*
====================================================
            DETAIL KELOMPOK
====================================================
*/

public function detailKelompok($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $data = [

    'title' => 'Detail Kelompok',

    'kelompok' => $this->kelompokModel
                       ->getDetailKelompok($id),

    'anggota' => $this->mahasiswaModel
                      ->getByKelompok($id),

    'proker' => $this->prokerModel
                     ->getByKelompok($id),
    'laporanM'   => $this->laporanModel
            ->getLaporanKelompok($id),
    

];
    return view('dosen/detail_kelompok', $data);
}
/*
====================================================
            APPROVE PROKER
====================================================
*/

public function approveProker($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->prokerModel
         ->approveProker($id);

    return redirect()->back()
                     ->with(
                         'success',
                         'Program kerja disetujui.'
                     );
}
/*
====================================================
            TOLAK PROKER
====================================================
*/

public function tolakProker($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->prokerModel
         ->tolakProker(

            $id,

            $this->request->getPost('catatan_dpl')

         );

    return redirect()->back()
                     ->with(
                         'success',
                         'Program kerja ditolak.'
                     );
}
/*
====================================================
            DETAIL PROKER
====================================================
*/

public function detailProker($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $data = [

        'title' => 'Detail Program Kerja',

        'proker' => $this->prokerModel
                         ->getProkerById($id)

    ];

    return view(
        'dosen/detail_proker',
        $data
    );
}
/*
====================================================
            APPROVE LAPORAN
====================================================
*/

public function approveLaporan($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->laporanModel
         ->approveLaporan($id);

    return redirect()->back()
                     ->with(
                         'success',
                         'Laporan berhasil disetujui.'
                     );
}
/*
====================================================
            TOLAK LAPORAN
====================================================
*/

public function tolakLaporan($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->laporanModel
         ->tolakLaporan(
             $id,
             $this->request->getPost('catatan_dpl')
         );

    return redirect()->back()
                     ->with(
                         'success',
                         'Laporan berhasil direvisi.'
                     );
}
/*
====================================================
            DETAIL LAPORAN
====================================================
*/

public function detailLaporan($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $data = [

        'title' => 'Detail Laporan',

        'laporan' => $this->laporanModel
                          ->getLaporanById($id)

    ];

    if (!$data['laporan']) {

        return redirect()->to('/dosen');

    }

    return view(
        'dosen/detail_laporan',
        $data
    );
}
/*
====================================================
            DATA MAHASISWA
====================================================
*/

public function mahasiswa($idKelompok)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $data = [

        'title' => 'Mahasiswa',

        'mahasiswa' => $this->kelompokModel
                            ->getDetailKelompok($idKelompok)

    ];

    return view(
        'dosen/mahasiswa',
        $data
    );
}
/*
====================================================
            UPDATE VERIFIKASI LAPORAN
====================================================
*/

public function updateVerifikasi($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->laporanModel->update($id, [

        'status' => $this->request->getPost('status'),

        'catatan_dpl' => $this->request->getPost('catatan_dpl')

    ]);

    return redirect()->back()
                     ->with('success', 'Verifikasi laporan berhasil disimpan.');
}
/*
====================================================
            SIMPAN CATATAN DPL
====================================================
*/

public function simpanCatatan($idKelompok)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'dosen') {
        return redirect()->to('/login');
    }

    $this->kelompokModel->update($idKelompok, [

        'catatan_dpl' => $this->request->getPost('catatan_dpl')

    ]);

    return redirect()->back()
                     ->with('success', 'Catatan DPL berhasil disimpan.');
}
}