<?= $this->include('dosen/layout/header') ?>
<?= $this->include('dosen/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('dosen/layout/topbar') ?>

    <div class="container-fluid py-4">

        <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= session()->getFlashdata('success') ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <?= session()->getFlashdata('error') ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

        <?php endif; ?>

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h5 class="mb-0">

                    <i class="bi bi-people-fill"></i>

                    Monitoring Kelompok KKN

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary">

                            <tr>

                                <th>No</th>

                                <th>Kelompok</th>

                                <th>Nama Mahasiswa</th>

                                <th>Program Studi</th>

                                <th>Lokasi KKN</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no=1; ?>

                            <?php foreach($kelompok as $k): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($k['nama_kelompok']) ?></td>

                                <td><?= esc($k['nama_mahasiswa']) ?></td>

                                <td><?= esc($k['prodi']) ?></td>

                                <td><?= esc($k['desa']) ?></td>

                                <td>

                                    <span class="badge bg-success">

                                        Berjalan

                                    </span>

                                </td>

                                <td>

                                    <a href="<?= site_url('dosen/detailKelompok/'.$k['id']) ?>"
                                        class="btn btn-info btn-sm">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                        </tbody>



                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->include('dosen/layout/footer') ?>