<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('admin/layout/topbar') ?>

    <div class="container-fluid py-4">

        <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= session()->getFlashdata('success') ?>

            <button class="btn-close" data-bs-dismiss="alert"></button>

        </div>

        <?php endif; ?>

        <div class="row mb-4">

            <div class="col-lg-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary text-white">

                        <h4 class="mb-0">

                            Detail Kelompok

                        </h4>

                    </div>

                    <div class="card-body">

                        <table class="table table-borderless">

                            <tr>

                                <th width="180">

                                    Nama Kelompok

                                </th>

                                <td>

                                    <?= esc($kelompok['nama_kelompok']) ?>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Dosen Pembimbing

                                </th>

                                <td>

                                    <?= esc($kelompok['nama_dosen']) ?>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Lokasi

                                </th>

                                <td>

                                    <?= esc($kelompok['desa']) ?>

                                    -

                                    <?= esc($kelompok['kecamatan']) ?>

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Jumlah Anggota

                                </th>

                                <td>

                                    <?= count($mahasiswa) ?>

                                    Mahasiswa

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-header bg-success text-white">

                <div class="d-flex justify-content-between">

                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">
                            Daftar Anggota
                        </h4>
                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-primary text-center">

                                <tr>
                            

                                    <th width="60">

                                        No

                                    </th>

                                    <th>

                                        NIM

                                    </th>

                                    <th>

                                        Nama Mahasiswa

                                    </th>

                                    <th>

                                        Program Studi

                                    </th>

                                    <th width="120">

                                        Aksi

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if(!empty($mahasiswa)): ?>

                                <?php $no=1; ?>

                                <?php foreach($mahasiswa as $m): ?>

                                <tr>

                                    <td class="text-center">

                                        <?= $no++ ?>

                                    </td>

                                    <td>

                                        <?= esc($m['nim']) ?>

                                    </td>

                                    <td>

                                        <?= esc($m['nama_mahasiswa']) ?>

                                    </td>

                                    <td>

                                        <?= esc($m['prodi']) ?>

                                    </td>

                                    <td class="text-center">

                                        <a href="<?= site_url('admin/hapus_anggota/'.$m['id']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Keluarkan mahasiswa ini?')">

                                            <i class="bi bi-person-dash-fill"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach; ?>

                                <?php else: ?>

                                <tr>

                                    <td colspan="5" class="text-center text-muted">

                                        Belum ada anggota.

                                    </td>

                                </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        <a href="<?= site_url('admin/plotting') ?>" class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?= $this->include('admin/layout/footer') ?>