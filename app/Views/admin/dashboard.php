<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('admin/layout/topbar') ?>

    <div class="container-fluid mt-4">

        <div class="row">

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6>Total Mahasiswa</h6>
                        <h2><?= $jumlahMahasiswa ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6>Total Dosen Pembimbing</h6>
                        <h2><?= $jumlahDosen ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6>Total Kelompok</h6>
                        <h2><?= $jumlahKelompok ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h6>Lokasi KKN</h6>
                        <h2><?= $jumlahLokasi ?></h2>
                    </div>
                </div>
            </div>

        </div>

        <div class="card shadow-sm mt-4">

            <div class="card-body" style="height:420px">


                <h4>Dashboard Admin SIM KKN</h4>

                <hr>

                <p>
                    Selamat datang di <strong>Sistem Informasi Manajemen Kuliah Kerja Nyata (SIM KKN)</strong>.
                </p>

                <p>
                    Melalui halaman ini Administrator dapat mengelola data:
                </p>

                <ul>
                    <li>Mahasiswa KKN</li>
                    <li>Dosen Pembimbing Lapangan (DPL)</li>
                    <li>Lokasi KKN</li>
                    <li>Plotting Kelompok</li>
                </ul>

                <p>
                    Silakan pilih menu pada sidebar untuk mulai mengelola data.
                </p>

            </div>

        </div>

    </div>

</div>

<?= $this->include('admin/layout/footer') ?>