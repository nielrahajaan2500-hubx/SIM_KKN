<?= $this->include('dosen/layout/header') ?>
<?= $this->include('dosen/layout/sidebar') ?>

<div class="main-content">

<?= $this->include('dosen/layout/topbar') ?>

<div class="container-fluid py-4">

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Kelompok Bimbingan

                            </h6>

                            <h2 class="fw-bold">

                                <?= $jumlahKelompok ?>

                            </h2>

                        </div>

                        <div class="text-primary">

                            <i class="bi bi-people-fill fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Program Kerja

                            </h6>

                            <h2 class="fw-bold">

                                <?= $jumlahProker ?>

                            </h2>

                        </div>

                        <div class="text-success">

                            <i class="bi bi-journal-check fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Laporan

                            </h6>

                            <h2 class="fw-bold">

                                <?= $jumlahLaporan ?>

                            </h2>

                        </div>

                        <div class="text-danger">

                            <i class="bi bi-file-earmark-text fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Dashboard Dosen Pembimbing

            </h5>

        </div>

        <div class="card-body">

            <div class="alert alert-info">

                <h6>

                    Selamat Datang

                </h6>

                <p class="mb-0">

                    Gunakan menu di sebelah kiri untuk memonitor kelompok KKN,
                    memverifikasi Program Kerja,
                    dan melakukan validasi Laporan Mahasiswa.

                </p>

            </div>

            <div class="row text-center">

                <div class="col-md-4">

                    <a href="<?= site_url('dosen/monitoring') ?>"
                        class="btn btn-outline-primary w-100">

                        <i class="bi bi-people"></i>

                        Monitoring Kelompok

                    </a>

                </div>

                <div class="col-md-4">

                    <a href="<?= site_url('dosen/monitoring') ?>"
                        class="btn btn-outline-success w-100">

                        <i class="bi bi-journal-check"></i>

                        Verifikasi Proker

                    </a>

                </div>

                <div class="col-md-4">

                    <a href="<?= site_url('dosen/monitoring') ?>"
                        class="btn btn-outline-danger w-100">

                        <i class="bi bi-file-earmark-text"></i>

                        Verifikasi Laporan

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

<?= $this->include('dosen/layout/footer') ?>