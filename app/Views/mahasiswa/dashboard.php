<?= $this->include('mahasiswa/layout/header') ?>
<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('mahasiswa/layout/topbar') ?>

    <div class="content">

        <!-- Selamat Datang -->
        <div class="card mb-4">
            <div class="card-body">
                <h4>Selamat Datang, <?= esc($mhs['nama_mahasiswa']) ?></h4>

                <small class="text-muted">
                    Selamat datang di Sistem Informasi Kuliah Kerja Nyata (SIM KKN).
                    Silakan gunakan menu di sebelah kiri untuk melihat informasi KKN,
                    mengelola program kerja, mengunggah laporan, dan dokumentasi.
                </small>
            </div>
        </div>

        <!-- Statistik -->
        <div class="row mb-4">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <small class="text-muted">Status Pendaftaran</small>

                        <h5 class="mt-2 text-success">
                            Terdaftar
                        </h5>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <small class="text-muted">
                            Kelompok KKN
                        </small>

                        <h5 class="mt-2">

                            <?= esc($mhs['nama_kelompok'] ?? '-') ?>

                        </h5>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <small class="text-muted">
                            Program Kerja
                        </small>

                        <h5 class="mt-2">

                            <?= $jumlah_proker ?>

                            Program

                        </h5>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <small class="text-muted">
                            Laporan
                        </small>

                        <h5 class="mt-2">

                            <?= $jumlah_laporan ?>

                        </h5>

                    </div>
                </div>
            </div>

        </div>

        <!-- Jadwal -->

        <div class="card mb-4">

            <div class="card-header">

                <b>Jadwal KKN</b>

            </div>

            <div class="card-body p-0">

                <table class="table table-bordered mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="20%">Tanggal</th>

                            <th>Kegiatan</th>

                            <th width="20%">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>2026-08-01</td>

                            <td>Pembekalan KKN</td>

                            <td>Selesai</td>

                        </tr>

                        <tr>

                            <td>2026-08-10</td>

                            <td>Penerjunan ke Lokasi</td>

                            <td>Mendatang</td>

                        </tr>

                        <tr>

                            <td>2026-09-15</td>

                            <td>Penarikan KKN</td>

                            <td>Mendatang</td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pengumuman -->

        <div class="card">

            <div class="card-header">

                <b>Pengumuman Terbaru</b>

            </div>

            <div class="card-body">

                <h6>

                    Jadwal Pembekalan KKN Periode 2026

                </h6>

                <small class="text-muted">

                    Diposting: 20 Juli 2026

                </small>

                <br><br>

                <button class="btn btn-outline-primary btn-sm">

                    Read More

                </button>

            </div>

        </div>

    </div>

</div>

<?= $this->include('mahasiswa/layout/footer') ?>