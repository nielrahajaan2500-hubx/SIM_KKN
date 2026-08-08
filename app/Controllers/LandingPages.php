<?php

namespace App\Controllers;

class LandingPages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Sistem Informasi Pendaftaran dan Manajemen Program KKN'
        ];

        return view('landing/index', $data);
    }
}