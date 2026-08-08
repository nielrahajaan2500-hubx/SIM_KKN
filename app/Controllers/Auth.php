<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MahasiswaModel;
use App\Models\DosenModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $mahasiswaModel;
    protected $dosenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
    }

    /*
    ============================================
                    LOGIN PAGE
    ============================================
    */

    public function index()
    {
        return view('auth/login', [
            'title' => 'Login SIM KKN'
        ]);
    }

    /*
    ============================================
                    PROSES LOGIN
    ============================================
    */

    public function login()
    {
        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password'));
        if ($username == '' || $password == '') {

            return redirect()->back()
                             ->with('error', 'Username dan Password wajib diisi.');

        }

        /*
        ============================================
                    LOGIN ADMIN
        ============================================
        */

        $user = $this->userModel->login($username, $password);

        if ($user && $user['role'] == 'admin') {

            session()->set([

                'login'    => true,

                'id'       => $user['id'],

                'nama'     => $user['nama'],

                'username' => $user['username'],

                'role'     => 'admin'

            ]);

            return redirect()->to('/admin');
        }

        /*
        ============================================
                LOGIN MAHASISWA
        ============================================
        */

        $mahasiswa = $this->mahasiswaModel
                          ->loginMahasiswa($username, $password);

        if ($mahasiswa) {

            session()->set([

                'login' => true,

                'id' => $mahasiswa['id'],

                'nama' => $mahasiswa['nama_mahasiswa'],

                'username' => $mahasiswa['nim'],

                'nim' => $mahasiswa['nim'],

                'role' => 'mahasiswa'

            ]);

            return redirect()->to('/mahasiswa');
        }

        /*
        ============================================
                    LOGIN DOSEN
        ============================================
        */

        $dosen = $this->dosenModel
                      ->loginDosen($username, $password);

        if ($dosen) {

            session()->set([

                'login' => true,

                'id' => $dosen['id'],

                'nama' => $dosen['nama_dosen'],

                'username' => $dosen['nidn'],

                'nidn' => $dosen['nidn'],

                'role' => 'dosen'

            ]);

            return redirect()->to('/dosen');
        }

        return redirect()->back()
                         ->with(
                             'error',
                             'Username atau Password salah.'
                         );
    }

    /*
    ============================================
                    LOGOUT
    ============================================
    */

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}