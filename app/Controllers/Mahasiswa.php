<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\KelompokModel;
use App\Models\ProkerModel;
use App\Models\LaporanModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    protected $kelompokModel;
    protected $prokerModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->kelompokModel = new KelompokModel();
        $this->prokerModel = new ProkerModel();
        $this->laporanModel = new LaporanModel();
    }
    /*
====================================================
                DASHBOARD
====================================================
*/

public function index()
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'mahasiswa') {
        return redirect()->to('/login');
    }

    $nim = session()->get('nim');

    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa($nim);

    if (!$mhs) {
        return redirect()->to('/login');
    }

    $teman = [];
    $jumlahProker = 0;
    $jumlahLaporan = 0;

    if (!empty($mhs['id_kelompok'])) {

        $teman = $this->mahasiswaModel
                      ->getTemanKelompok(
                            $mhs['id_kelompok'],
                            $nim
                      );

        $jumlahProker = $this->prokerModel
                             ->jumlahProkerKelompok(
                                    $mhs['id_kelompok']
                             );

        $jumlahLaporan = $this->laporanModel
                              ->jumlahLaporanKelompok(
                                    $mhs['id_kelompok']
                              );
    }

    $data = [

        'title' => 'Dashboard Mahasiswa',

        'mhs' => $mhs,

        'teman' => $teman,

        'jumlah_proker' => $jumlahProker,

        'jumlah_laporan' => $jumlahLaporan

    ];

    return view('mahasiswa/dashboard',$data);
}
/*
====================================================
            INFORMASI KKN
====================================================
*/

public function informasi()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}

    $mhs = $this->mahasiswaModel
                ->getInformasiKKN(
                    session()->get('nim')
                );

    if (!$mhs) {

        return redirect()->to('/mahasiswa');

    }

    $anggota = [];

    if (!empty($mhs['id_kelompok'])) {

        $anggota = $this->mahasiswaModel
                        ->getAnggotaKelompok(
                            $mhs['id_kelompok']
                        );
    }

    return view('mahasiswa/informasi',[

        'title'=>'Informasi KKN',

        'mhs'=>$mhs,

        'anggota'=>$anggota

    ]);

}
/*
====================================================
                PROGRAM KERJA
====================================================
*/

public function proker()
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'mahasiswa') {
        return redirect()->to('/login');
    }

    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    if (!$mhs) {
        return redirect()->to('/mahasiswa');
    }

    $proker = [];

    if (!empty($mhs['id_kelompok'])) {

        $proker = $this->prokerModel
                       ->getByKelompok($mhs['id_kelompok']);

    }

    $data = [

        'title' => 'Program Kerja',

        'mhs' => $mhs,

        'proker' => $proker

    ];

    return view('mahasiswa/proker', $data);
}
/*
====================================================
            FORM TAMBAH PROKER
====================================================
*/

public function tambahProker()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    return view('mahasiswa/tambah_proker', [

        'title' => 'Tambah Program Kerja',

        'mhs' => $mhs

    ]);
}
/*
====================================================
            SIMPAN PROKER
====================================================
*/

public function simpanProker()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    if (!$mhs || empty($mhs['id_kelompok'])) {

        return redirect()->back()
                         ->with('error', 'Anda belum memiliki kelompok.');

    }

    $data = [

        'id_kelompok' => $mhs['id_kelompok'],

        'judul_proker' => $this->request->getPost('judul_proker'),

        'bidang' => $this->request->getPost('bidang'),

        'deskripsi' => $this->request->getPost('deskripsi'),

        'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),

        'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),

        'status' => 'Menunggu',

        'catatan_dpl' => '',

        'created_by' => $mhs['id']

    ];

    $this->prokerModel->tambahProker($data);
    

    return redirect()->to('/mahasiswa/proker')
                     ->with('success', 'Program kerja berhasil ditambahkan.');
          if ($proker['id_kelompok'] != $mhs['id_kelompok']) {
    return redirect()->to('/mahasiswa/proker')
                     ->with('error', 'Akses ditolak.');
}           
}
/*
====================================================
                EDIT PROKER
====================================================
*/

public function editProker($id)
{
    if (!session()->get('login')) {
        return redirect()->to('/login');
    }

    if (session()->get('role') != 'mahasiswa') {
        return redirect()->to('/login');
    }

    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    $proker = $this->prokerModel
                   ->getProkerById($id);

    if (!$proker) {
        return redirect()->to('/mahasiswa/proker')
                         ->with('error','Program kerja tidak ditemukan.');
    }

    if ($proker['id_kelompok'] != $mhs['id_kelompok']) {
        return redirect()->to('/mahasiswa/proker')
                         ->with('error','Akses ditolak.');
    }

    return view('mahasiswa/edit_proker', [

        'title' => 'Edit Program Kerja',

        'mhs' => $mhs,

        'proker' => $proker

    ]);
}
/*
====================================================
                UPDATE PROKER
====================================================
*/

public function updateProker($id)
{
 $mhs = $this->mahasiswaModel
            ->getDashboardMahasiswa(session()->get('nim'));

$proker = $this->prokerModel
               ->getProkerById($id);

if (!$proker) {
    return redirect()->to('/mahasiswa/proker')
                     ->with('error','Program kerja tidak ditemukan.');
}

if ($proker['id_kelompok'] != $mhs['id_kelompok']) {
    return redirect()->to('/mahasiswa/proker')
                     ->with('error','Akses ditolak.');
}
    $data = [

        'judul_proker' => $this->request->getPost('judul_proker'),

        'bidang' => $this->request->getPost('bidang'),

        'deskripsi' => $this->request->getPost('deskripsi'),

        'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),

        'tanggal_selesai' => $this->request->getPost('tanggal_selesai')

    ];

    $this->prokerModel->updateProker($id,$data);

    return redirect()->to('/mahasiswa/proker')
                     ->with('success','Program kerja berhasil diperbarui.');
}
/*
====================================================
                HAPUS PROKER
====================================================
*/

public function hapusProker($id)
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
  $proker = $this->prokerModel
               ->getProkerById($id);

if (!$proker) {

    return redirect()->to('/mahasiswa/proker')
                     ->with('error','Data tidak ditemukan.');

}

$mhs = $this->mahasiswaModel
            ->getDashboardMahasiswa(session()->get('nim'));

if ($proker['id_kelompok'] != $mhs['id_kelompok']) {

    return redirect()->to('/mahasiswa/proker')
                     ->with('error','Akses ditolak.');

}

$this->prokerModel->hapusProker($id);

return redirect()->to('/mahasiswa/proker')
                 ->with('success','Program kerja berhasil dihapus.');
}
/*
====================================================
                LAPORAN
====================================================
*/

public function laporan()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}

    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    if (!$mhs) {
        return redirect()->to('/mahasiswa');
    }

    $proker = [];
    $laporan = [];

    if (!empty($mhs['id_kelompok'])) {

        $proker = $this->prokerModel
                       ->getByKelompok($mhs['id_kelompok']);

        $laporan = $this->laporanModel
                        ->getLaporanKelompok($mhs['id_kelompok']);

    }

    return view('mahasiswa/laporan', [

        'title' => 'Laporan',

        'mhs' => $mhs,

        'proker' => $proker,

        'laporan' => $laporan

    ]);
}
/*
====================================================
            FORM TAMBAH LAPORAN
====================================================
*/

public function tambahLaporan()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $mhs = $this->mahasiswaModel
                ->getDashboardMahasiswa(session()->get('nim'));

    $proker = [];

    if (!empty($mhs['id_kelompok'])) {

        $proker = $this->prokerModel
                       ->getByKelompok($mhs['id_kelompok']);

    }

    return view('mahasiswa/tambah_laporan', [

        'title' => 'Tambah Laporan',

        'mhs' => $mhs,

        'proker' => $proker

    ]);
}
/*
====================================================
            SIMPAN LAPORAN
====================================================
*/

public function simpanLaporan()
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $foto = $this->request->getFile('foto');

    $file = $this->request->getFile('file_laporan');

    $namaFoto = '';

    $namaFile = '';

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {

        $namaFoto = $foto->getRandomName();

        $foto->move('uploads/foto', $namaFoto);

    }

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $namaFile = $file->getRandomName();

        $file->move('uploads/laporan', $namaFile);

    }

    $data = [

        'id_proker'=>$this->request->getPost('id_proker'),

        'judul_laporan'=>$this->request->getPost('judul_laporan'),

        'deskripsi'=>$this->request->getPost('deskripsi'),

        'foto'=>$namaFoto,

        'file_laporan'=>$namaFile,

        'tanggal_upload'=>date('Y-m-d H:i:s'),

        'status'=>'Menunggu',

        'catatan_dpl'=>'',

        'uploaded_by'=>session()->get('id')

    ];

    $this->laporanModel
         ->tambahLaporan($data);

    return redirect()->to('/mahasiswa/laporan')
                     ->with('success','Laporan berhasil ditambahkan.');

}
/*
====================================================
            EDIT LAPORAN
====================================================
*/

public function editLaporan($id)
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $data=[

'title'=>'Edit Laporan',

'laporan'=>$this->laporanModel
                ->getLaporanById($id)

];

    return view('mahasiswa/edit_laporan',$data);
}
/*
====================================================
            UPDATE LAPORAN
====================================================
*/

public function updateLaporan($id)
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $data = [

        'judul_laporan' => $this->request->getPost('judul_laporan'),

        'deskripsi' => $this->request->getPost('deskripsi')

    ];

    $this->laporanModel
         ->updateLaporan($id,$data);

    return redirect()
    ->to('/mahasiswa/laporan')
                     ->with('success','Laporan berhasil diperbarui.');
}
/*
====================================================
            HAPUS LAPORAN
====================================================
*/

public function hapusLaporan($id)
{
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'mahasiswa') {
    return redirect()->to('/login');
}
    $laporan = $this->laporanModel
                    ->getLaporanById($id);

    if (!$laporan) {

        return redirect()->to('/mahasiswa/laporan');

    }

    if (!empty($laporan['foto']) && file_exists('uploads/foto/'.$laporan['foto'])) {

        unlink('uploads/foto/'.$laporan['foto']);

    }

    if (!empty($laporan['file_laporan']) && file_exists('uploads/laporan/'.$laporan['file_laporan'])) {

        unlink('uploads/laporan/'.$laporan['file_laporan']);

    }

    $this->laporanModel
         ->hapusLaporan($id);

    return redirect()->to('/mahasiswa/laporan')
                     ->with('success','Laporan berhasil dihapus.');
}

}