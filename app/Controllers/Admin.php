<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\LokasiModel;
use App\Models\KelompokModel;

class Admin extends BaseController
{
    protected $mahasiswaModel;
    protected $dosenModel;
    protected $lokasiModel;
    protected $kelompokModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel     = new DosenModel();
        $this->lokasiModel    = new LokasiModel();
        $this->kelompokModel  = new KelompokModel();
    }

    /*
    ======================================================
                    DASHBOARD
    ======================================================
    */

    public function index()
    {
        
    if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $data = [
            'title'           => 'Dashboard Admin',
            'jumlahMahasiswa' => $this->mahasiswaModel->jumlahMahasiswa(),
            'jumlahDosen'     => $this->dosenModel->jumlahDosen(),
            'jumlahLokasi'    => $this->lokasiModel->jumlahLokasi(),
            'jumlahKelompok'  => $this->kelompokModel->jumlahKelompok()
        ];

        return view('admin/dashboard', $data);
    }

    /*
    ======================================================
                    MAHASISWA
    ======================================================
    */

    public function mahasiswa()
    {
       if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $search = $this->request->getGet('search');
        $prodi  = $this->request->getGet('prodi');

        $data = [
            'title'      => 'Data Mahasiswa',
            'mahasiswa'  => $this->mahasiswaModel->getMahasiswa($search,$prodi),
            'search'     => $search,
            'prodi'      => $prodi
        ];

        return view('admin/mahasiswa',$data);
    }



    public function simpanMahasiswa()
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}
        $this->mahasiswaModel->tambahMahasiswa([

            'nim'=>$this->request->getPost('nim'),
            'nama_mahasiswa'=>$this->request->getPost('nama_mahasiswa'),
            'prodi'=>$this->request->getPost('prodi')

        ]);

        return redirect()->to(site_url('admin/mahasiswa'))
                ->with('success','Data berhasil ditambahkan');
    }



    public function updateMahasiswa($id)
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $this->mahasiswaModel->updateMahasiswa($id,[

            'nim'=>$this->request->getPost('nim'),

            'nama_mahasiswa'=>$this->request->getPost('nama_mahasiswa'),

            'prodi'=>$this->request->getPost('prodi')

        ]);

        return redirect()->to(site_url('admin/mahasiswa'))
                ->with('success','Data berhasil diubah');

    }

    public function hapusMahasiswa($id)
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $this->mahasiswaModel->hapusMahasiswa($id);

        return redirect()->to(site_url('admin/mahasiswa'))
                ->with('success','Data berhasil dihapus');

    }
        /*
    ======================================================
                        DOSEN
    ======================================================
    */

    public function dosen()
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $search = $this->request->getGet('search');

        $data = [
            'title'  => 'Data Dosen',
            'dosen'  => $this->dosenModel->getDosen($search),
            'search' => $search
        ];

        return view('admin/dosen', $data);
    }



    public function simpanDosen()
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}
        $this->dosenModel->tambahDosen([
            'nidn' => $this->request->getPost('nidn'),
            'nama_dosen' => $this->request->getPost('nama_dosen')
        ]);

        return redirect()->to(site_url('admin/dosen'))
            ->with('success', 'Data dosen berhasil ditambahkan');
    }


    public function updateDosen($id)
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}
        $this->dosenModel->updateDosen($id, [
            'nidn' => $this->request->getPost('nidn'),
            'nama_dosen' => $this->request->getPost('nama_dosen')
        ]);

        return redirect()->to(site_url('admin/dosen'))
            ->with('success', 'Data dosen berhasil diubah');
    }

    public function hapusDosen($id)
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}
        $this->dosenModel->hapusDosen($id);

        return redirect()->to(site_url('admin/dosen'))
            ->with('success', 'Data dosen berhasil dihapus');
    }


    /*
    ======================================================
                        LOKASI
    ======================================================
    */

    public function lokasi()
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $search = $this->request->getGet('search');
        $kabupaten = $this->request->getGet('kabupaten');
        $kecamatan = $this->request->getGet('kecamatan');

        $data = [
            'title' => 'Data Lokasi',
            'lokasi' => $this->lokasiModel->getLokasi($search, $kabupaten, $kecamatan),
            'kabupaten_list' => $this->lokasiModel->getKabupaten(),
            'kecamatan_list' => $this->lokasiModel->getKecamatan(),
            'search' => $search,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan
        ];

        return view('admin/lokasi', $data);
    }


    public function simpanLokasi()
    {
        $this->lokasiModel->tambahLokasi([

            'kabupaten' => $this->request->getPost('kabupaten'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa'      => $this->request->getPost('desa'),
            'dusun'     => $this->request->getPost('dusun'),
            'kuota'     => $this->request->getPost('kuota'),
            'status'    => $this->request->getPost('status')

        ]);

        return redirect()->to(site_url('admin/lokasi'))
            ->with('success', 'Data berhasil ditambahkan');
    }


    public function updateLokasi($id)
    {
        $this->lokasiModel->updateLokasi($id, [

            'kabupaten' => $this->request->getPost('kabupaten'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'desa'      => $this->request->getPost('desa'),
            'dusun'     => $this->request->getPost('dusun'),
            'kuota'     => $this->request->getPost('kuota'),
            'status'    => $this->request->getPost('status') ]);

        return redirect()->to(site_url('admin/lokasi'))
            ->with('success', 'Data berhasil diubah');
    }

    public function hapusLokasi($id)
    {
        $this->lokasiModel->hapusLokasi($id);

        return redirect()->to(site_url('admin/lokasi'))
            ->with('success', 'Data berhasil dihapus');
    }
        /*
    ======================================================
                    PLOTTING KELOMPOK
    ======================================================
    */

    public function plotting()
    {
        if (!session()->get('login')) {
    return redirect()->to('/login');
}

if (session()->get('role') != 'admin') {
    return redirect()->to('/login');
}

        $data = [
            'title'      => 'Plotting Kelompok',
            'kelompok'   => $this->kelompokModel->getKelompokLengkap(),
            'mahasiswa'  => $this->mahasiswaModel ->getBelumKelompok(),
            'dosen'      => $this->dosenModel->getDosen(),
            'lokasi'     => $this->lokasiModel->getLokasi(),
           
        ];
foreach ($data['kelompok'] as &$k) {
    $k['jml_mhs'] = $this->kelompokModel
                         ->jumlahMahasiswaKelompok($k['id']);
}
        return view('admin/plotting', $data);
    }

 
public function simpan_kelompok()
{
    $this->kelompokModel->insert([
        'nama_kelompok' => $this->request->getPost('nama_kelompok'),
        'id_dpl'        => $this->request->getPost('id_dpl'),
        'id_lokasi'     => $this->request->getPost('id_lokasi'),
        'catatan_dpl'   => ''
    ]);

    return redirect()->to('/admin/plotting')
                     ->with('success','Kelompok berhasil ditambahkan.');
}
 

    public function update_kelompok($id)
    {
        $this->kelompokModel->update($id, [

            'nama_kelompok' => $this->request->getPost('nama_kelompok'),
            'id_dpl'        => $this->request->getPost('id_dpl'),
            'id_lokasi'     => $this->request->getPost('id_lokasi')

        ]);

        return redirect()->to('/admin/plotting')
            ->with('success', 'Kelompok berhasil diperbarui.');
    }

    public function hapus_kelompok($id)
    {
        // keluarkan seluruh anggota
        $this->mahasiswaModel
            ->where('id_kelompok', $id)
            ->set(['id_kelompok' => null])
            ->update();

        $this->kelompokModel->delete($id);

        return redirect()->to('/admin/plotting')
            ->with('success', 'Kelompok berhasil dihapus.');
    }

  public function simpan_penempatan()
{
    $idMahasiswa = $this->request->getPost('id_mahasiswa');
    $idKelompok  = $this->request->getPost('id_kelompok');

    $this->mahasiswaModel->update($idMahasiswa, [
        'id_kelompok' => $idKelompok
    ]);

    return redirect()
        ->to('admin/detail_kelompok/' . $idKelompok)
        ->with('success', 'Mahasiswa berhasil ditambahkan.');
}

    public function hapus_anggota($id)
    {
        $mahasiswa = $this->mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->back()
                ->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $kelompok = $mahasiswa['id_kelompok'];

        $this->mahasiswaModel->update($id, [
            'id_kelompok' => null
        ]);

        return redirect()->to('/admin/detail_kelompok/' . $kelompok)
            ->with('success', 'Anggota berhasil dikeluarkan.');
    }
public function detail_kelompok($id)
{
    $kelompok = $this->kelompokModel->getDetailKelompok($id);

    if (!$kelompok) {
        return redirect()->to('/admin/plotting')
            ->with('error', 'Kelompok tidak ditemukan.');
    }

    $data = [
        'title'      => 'Detail Kelompok',
        'kelompok'   => $kelompok,
        'mahasiswa'  => $this->mahasiswaModel->getByKelompok($id)
    ];

    return view('admin/detail_kelompok', $data);
}

}