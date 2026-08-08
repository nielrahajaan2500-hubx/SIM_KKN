<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('admin/layout/topbar') ?>

    <div class="container-fluid py-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    Daftar Dosen Pembimbing (DPL)
                </h4>
            </div>

            <div class="card-body">

                <?php if(session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?= session()->getFlashdata('success') ?>
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <form action="<?= site_url('admin/dosen') ?>" method="get">

                    <div class="row mb-4">

                        <div class="col-md-4">

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari NIDN / Nama Dosen..." value="<?= esc($search ?? '') ?>">

                        </div>

                        <div class="col-md-2">

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="bi bi-search"></i>
                                Cari

                            </button>

                        </div>

                        <div class="col-md-3">

                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalTambahDosen">

                                <i class="bi bi-plus-circle"></i>
                                Tambah

                            </button>

                        </div>


                    </div>

            </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary text-center">

                        <tr>

                            <th width="60">No</th>
                            <th width="180">NIDN</th>
                            <th>Nama Dosen</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($dosen)): ?>

                        <?php $no = 1; ?>

                        <?php foreach($dosen as $d): ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++ ?>
                            </td>

                            <td>
                                <?= esc($d['nidn']) ?>
                            </td>

                            <td>
                                <?= esc($d['nama_dosen']) ?>
                            </td>

                            <td class="text-center">

                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalEditDosen<?= $d['id'] ?>">

                                    <i class="bi bi-pencil-square"></i>

                                </button>
                                <a href="<?= site_url('admin/hapusDosen/'.$d['id']) ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data dosen ini?')">

                                    <i class="bi bi-trash"></i>

                                </a>
                            </td>

                        </tr>
                        <?= view('admin/modal/edit_dosen', ['d' => $d]) ?>
                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>

                            <td colspan="4" class="text-center text-muted">

                                Data dosen tidak ditemukan.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</div>
<?= $this->include('admin/modal/tambah_dosen') ?>

<?= $this->include('admin/layout/footer') ?>