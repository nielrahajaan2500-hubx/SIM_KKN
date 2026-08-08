<?= $this->include('admin/layout/header') ?>
<?= $this->include('admin/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('admin/layout/topbar') ?>

    <div class="container-fluid py-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    Data Lokasi KKN
                </h4>
            </div>

            <div class="card-body">

                <?php if(session()->getFlashdata('success')) : ?>

                <div class="alert alert-success alert-dismissible fade show">

                    <?= session()->getFlashdata('success') ?>

                    <button class="btn-close" data-bs-dismiss="alert"></button>

                </div>

                <?php endif; ?>

                <form action="<?= site_url('admin/lokasi') ?>" method="get">

                    <div class="row g-3 align-items-center mb-4">

                        <div class="col-lg-3">

                            <input type="text" name="search" class="form-control" placeholder="Cari Desa / Kecamatan..."
                                value="<?= esc($search ?? '') ?>">

                        </div>

                        <div class="col-lg-2">

                            <select name="kabupaten" class="form-select">

                                <option value="">Semua Kabupaten</option>

                                <?php foreach($kabupaten_list as $k): ?>

                                <option value="<?= $k['kabupaten'] ?>"
                                    <?= (($kabupaten ?? '') == $k['kabupaten']) ? 'selected' : '' ?>>

                                    <?= esc($k['kabupaten']) ?>

                                </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-lg-2">

                            <select name="kecamatan" class="form-select">

                                <option value="">Semua Kecamatan</option>

                                <?php foreach($kecamatan_list as $k): ?>

                                <option value="<?= $k['kecamatan'] ?>"
                                    <?= (($kecamatan ?? '') == $k['kecamatan']) ? 'selected' : '' ?>>

                                    <?= esc($k['kecamatan']) ?>

                                </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="col-lg-1">

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="bi bi-search"></i>

                            </button>

                        </div>

                        <div class="col-lg-2">

                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalTambahLokasi">

                                <i class="bi bi-plus-circle"></i>
                                Tambah

                            </button>

                        </div>
                        <div class="col-lg-2">


                        </div>

                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary text-center">

                            <tr>

                                <th width="60">No</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Dusun</th>
                                <th width="90">Kuota</th>
                                <th width="100">Status</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($lokasi)): ?>

                            <?php $no = 1; ?>

                            <?php foreach($lokasi as $l): ?>

                            <tr>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td><?= esc($l['kabupaten']) ?></td>

                                <td><?= esc($l['kecamatan']) ?></td>

                                <td><?= esc($l['desa']) ?></td>

                                <td><?= esc($l['dusun']) ?></td>

                                <td class="text-center">
                                    <?= esc($l['kuota'] ?? 20) ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge <?= ($l['status']=='Aktif') ? 'bg-success' : 'bg-danger' ?>">
                                        <?= esc($l['status']) ?>
                                    </span>
                                </td>

                                <td class="text-center">

                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalEditLokasi<?= $l['id'] ?>">

                                        <i class="bi bi-pencil-square"></i>

                                    </button>

                                    <a href="<?= site_url('admin/hapusLokasi/'.$l['id']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus lokasi ini?')">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </td>

                            </tr>
                            <?= view('admin/modal/edit_lokasi', ['l'=>$l]) ?>
                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="8" class="text-center text-muted">

                                    Data lokasi tidak ditemukan.

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
<?= $this->include('admin/modal/tambah_lokasi') ?>

<?= $this->include('admin/layout/footer') ?>