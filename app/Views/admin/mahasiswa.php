<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('admin/layout/topbar') ?>

    <div class="container-fluid py-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h3 class="fw-bold mb-0">
                        Data Mahasiswa
                    </h3>

                </div>

                <form action="<?= site_url('admin/mahasiswa') ?>" method="get">

                    <div class="row g-3 mb-4">

                        <div class="col-md-3">

                            <input type="text" name="search" class="form-control" placeholder="Cari NIM / Nama..."
                                value="<?= esc($search ?? '') ?>">

                        </div>

                        <div class="col-md-3">

                            <select name="prodi" class="form-select">

                                <option value="">Semua Prodi</option>

                                <option value="Manajemen" <?= (($prodi ?? '')=='Manajemen')?'selected':''; ?>>
                                    Manajemen
                                </option>

                                <option value="Teknik Informatika"
                                    <?= (($prodi ?? '')=='Teknik Informatika')?'selected':''; ?>>
                                    Teknik Informatika
                                </option>

                                <option value="Teknik Sipil" <?= (($prodi ?? '')=='Teknik Sipil')?'selected':''; ?>>
                                    Teknik Sipil
                                </option>

                                <option value="Teknik Geomatika"
                                    <?= (($prodi ?? '')=='Teknik Geomatika')?'selected':''; ?>>
                                    Teknik Geomatika
                                </option>

                            </select>

                        </div>

                        <div class="col-md-2">

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search"></i>
                                Cari
                            </button>

                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalTambahMahasiswa">

                                <i class="bi bi-plus-circle"></i>
                                Tambah

                            </button>
                        </div>

                    </div>

                </form>

                <?php if(session()->getFlashdata('success')) : ?>

                <div class="alert alert-success alert-dismissible fade show">

                    <?= session()->getFlashdata('success') ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                </div>

                <?php endif; ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary text-center">

                            <tr>

                                <th width="60">No</th>
                                <th width="150">NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th width="220">Program Studi</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($mahasiswa)): ?>

                            <?php $no = 1; ?>

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

                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalEditMahasiswa<?= $m['id'] ?>">

                                        <i class="bi bi-pencil-square"></i>

                                    </button>
                                    <a href="<?= site_url('admin/hapusMahasiswa/'.$m['id']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </td>

                            </tr>
                            <?= view('admin/modal/edit_mahasiswa', ['m' => $m]) ?>
                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="5" class="text-center text-muted">

                                    Tidak ada data mahasiswa.

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
<?= $this->include('admin/modal/tambah_mahasiswa') ?>
<?= $this->include('admin/layout/footer') ?>