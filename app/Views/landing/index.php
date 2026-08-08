<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIM KKN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f5f7fb;
        color: #333;
    }

    :root {
        --primary: #2563EB;
        --primary-hover: #1D4ED8;
    }

    /* ===================== NAVBAR ===================== */

    .navbar {
        background: #2563EB;
        padding: 15px 0;
    }

    .navbar-brand {
        color: #fff;
        font-weight: bold;
        font-size: 28px;
    }

    .navbar-brand:hover {
        color: white;
    }

    .nav-link {
        color: white;
        margin-left: 18px;
    }

    .nav-link:hover {
        color: #dbeafe;
    }

    .btn-login {

        border: 2px solid white;
        color: white;
        padding: 8px 22px;
        border-radius: 6px;
        text-decoration: none;
        transition: .3s;

    }

    .btn-login:hover {

        background: white;
        color: #2563EB;

    }

    /* ===================== HERO ===================== */

    .hero {

        padding: 80px 0;

    }

    .hero h1 {

        font-size: 54px;
        font-weight: 700;
        line-height: 1.3;

    }

    .hero p {

        margin-top: 25px;
        color: #666;
        font-size: 18px;

    }

    .btn-start {

        margin-top: 30px;
        background: #2563EB;
        color: white;
        padding: 14px 35px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;

    }

    .btn-start:hover {

        background: #1D4ED8;
        color: white;

    }

    .hero-image {

        background: white;
        border: 2px dashed #2563EB;
        height: 360px;

        display: flex;
        justify-content: center;
        align-items: center;

        border-radius: 15px;

        color: #2563EB;

    }

    /* ===================== TENTANG ===================== */

    section {

        padding: 80px 0;

    }

    .section-title {

        font-size: 34px;
        font-weight: bold;
        margin-bottom: 40px;

    }

    .about-card {

        background: white;

        border-radius: 15px;

        padding: 40px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);

    }

    /* ===================== DOKUMENTASI ===================== */

    .card-dokumentasi {

        background: white;

        border-radius: 12px;

        overflow: hidden;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

        transition: .3s;

    }

    .card-dokumentasi:hover {

        transform: translateY(-6px);

    }

    .image-placeholder {

        height: 220px;

        background: #dbeafe;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #2563EB;

        font-weight: bold;

    }

    .card-body {

        padding: 20px;

    }

    /* ===================== FOOTER ===================== */

    footer {

        background: #2563EB;

        color: white;

        text-align: center;

        padding: 25px;

        margin-top: 70px;

    }
    </style>

</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="#">
                SIM KKN
            </a>

            <button class="navbar-toggler bg-white" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#dokumentasi">Dokumentasi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>

                </ul>

                <a href="<?= base_url('login') ?>" class="btn-login">

                    Login

                </a>

            </div>

        </div>

    </nav>

    <!-- HERO -->

    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1>

                        Sistem Informasi
                        Pendaftaran dan
                        Manajemen Program KKN

                    </h1>

                    <p>

                        Platform digital untuk memudahkan proses pendaftaran,
                        pengelolaan kelompok,
                        monitoring kegiatan,
                        serta pelaporan Kuliah Kerja Nyata secara terintegrasi.

                    </p>

                    <a href="<?= base_url('login') ?>" class="btn-start">

                        Mulai Sekarang

                    </a>

                </div>

                <div class="col-lg-6">

                    <div class="hero-image">

                        HERO IMAGE

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- TENTANG -->

    <section id="tentang">

        <div class="container">

            <h2 class="section-title">

                Tentang Sistem

            </h2>

            <div class="about-card">

                SIM KKN merupakan sistem berbasis web yang digunakan oleh Admin LPPM,
                Dosen Pembimbing Lapangan, dan Mahasiswa untuk mengelola proses
                pendaftaran peserta, pembagian kelompok, penugasan dosen pembimbing,
                monitoring kegiatan KKN, hingga pelaporan akhir.

            </div>

        </div>

    </section>

    <!-- DOKUMENTASI -->

    <section id="dokumentasi">

        <div class="container">

            <h2 class="section-title">

                Dokumentasi KKN

            </h2>

            <div class="row">

                <div class="col-md-4">

                    <div class="card-dokumentasi">

                        <div class="image-placeholder">

                            FOTO KKN

                        </div>

                        <div class="card-body">

                            <h5>Pengabdian Masyarakat</h5>

                            <p>Kegiatan mahasiswa bersama masyarakat desa.</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card-dokumentasi">

                        <div class="image-placeholder">

                            FOTO KKN

                        </div>

                        <div class="card-body">

                            <h5>Edukasi</h5>

                            <p>Program penyuluhan dan pelatihan masyarakat.</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card-dokumentasi">

                        <div class="image-placeholder">

                            FOTO KKN

                        </div>

                        <div class="card-body">

                            <h5>Lingkungan</h5>

                            <p>Dokumentasi kegiatan penghijauan dan kebersihan.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- KONTAK -->

    <section id="kontak">

        <div class="container">

            <h2 class="section-title text-center">

                Kontak Kami

            </h2>

            <p class="text-center text-secondary mb-5">

                Hubungi kami apabila membutuhkan informasi lebih lanjut mengenai Program KKN.

            </p>

            <div class="row">

                <div class="col-lg-6">

                    <div class="about-card">

                        <h4 class="mb-4">Informasi Kontak</h4>

                        <p>
                            <strong>📍 Alamat</strong><br>
                            LPPM Universitas XYZ<br>
                            Jl. Contoh No.123, Kota ABC
                        </p>

                        <p>
                            <strong>📞 Telepon</strong><br>
                            (031) 12345678
                        </p>

                        <p>
                            <strong>📧 Email</strong><br>
                            lppm@universitas.ac.id
                        </p>

                        <p>
                            <strong>🕒 Jam Operasional</strong><br>
                            Senin - Jumat<br>
                            08.00 - 16.00 WIB
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="about-card">

                        <h4 class="mb-4">Kirim Pesan</h4>

                        <form>

                            <div class="mb-3">

                                <input type="text" class="form-control" placeholder="Nama Lengkap">

                            </div>

                            <div class="mb-3">

                                <input type="email" class="form-control" placeholder="Email">

                            </div>

                            <div class="mb-3">

                                <textarea class="form-control" rows="5" placeholder="Pesan"></textarea>

                            </div>

                            <button class="btn btn-primary w-100">

                                Kirim Pesan

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <footer>

        <div class="container">

            <h4>SIM KKN</h4>

            <p>

                Sistem Informasi Pendaftaran dan Manajemen Program Kuliah Kerja Nyata

            </p>

            <hr style="background:white;">

            <p>

                © 2026 SIM KKN | Universitas XYZ

            </p>

        </div>

    </footer>