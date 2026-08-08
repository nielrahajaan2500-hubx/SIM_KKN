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

<!-- ================= TAMBAH KELOMPOK ================= -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">

        <h4 class="mb-0">
            Tambah Kelompok Baru
        </h4>

    </div>

    <div class="card-body">

        <form action="<?= site_url('admin/simpan_kelompok') ?>" method="post">

            <?= csrf_field() ?>

            <div class="row g-3">

                <div class="col-md-3">

                    <label class="form-label">
                        Nama Kelompok
                    </label>

                    <input
                        type="text"
                        name="nama_kelompok"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Dosen Pembimbing
                    </label>

                    <select
                        name="id_dpl"
                        class="form-select"
                        required>

                        <option value="">Pilih DPL</option>

                        <?php foreach($dosen as $d): ?>

                        <option value="<?= $d['id'] ?>">
                            <?= esc($d['nama_dosen']) ?>
                        </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-3">

                    <label class="form-label">
                        Lokasi KKN
                    </label>

                    <select
                        name="id_lokasi"
                        class="form-select"
                        required>

                        <option value="">Pilih Lokasi</option>

                        <?php foreach($lokasi as $l): ?>

                        <option value="<?= $l['id'] ?>">
                            <?= esc($l['desa']) ?> - <?= esc($l['kecamatan']) ?>
                        </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-3 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        <i class="bi bi-save"></i>

                        Simpan Kelompok

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<!-- ================= PLOT MAHASISWA ================= -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-success text-white">

        <h4 class="mb-0">
            Plot Mahasiswa ke Kelompok
        </h4>

    </div>

    <div class="card-body">

        <form action="<?= site_url('admin/simpan_penempatan') ?>" method="post">

            <?= csrf_field() ?>

            <div class="row g-3">

                <div class="col-md-5">

                    <label class="form-label">
                        Mahasiswa
                    </label>

                    <select
                        name="id_mahasiswa"
                        class="form-select"
                        required>

                        <option value="">-- Pilih Mahasiswa --</option>

                        <?php foreach($mahasiswa as $m): ?>

                        <option value="<?= $m['id'] ?>">
                            <?= esc($m['nim']) ?> - <?= esc($m['nama_mahasiswa']) ?>
                        </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-5">

                    <label class="form-label">
                        Kelompok
                    </label>

                    <select
                        name="id_kelompok"
                        class="form-select"
                        required>

                        <option value="">-- Pilih Kelompok --</option>

                        <?php foreach($kelompok as $k): ?>

                        <option value="<?= $k['id'] ?>">
                            <?= esc($k['nama_kelompok']) ?>
                        </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button
                        type="submit"
                        class="btn btn-success w-100">

                        <i class="bi bi-diagram-3"></i>

                        Plot

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<!-- ================= DAFTAR KELOMPOK ================= -->

<div class="card shadow-sm">

    <div class="card-header bg-info text-white">

        <h4 class="mb-0">
            Daftar Plotting Kelompok
        </h4>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary text-center">

                    <tr>

                        <th width="60">No</th>
                        <th>Nama Kelompok</th>
                        <th>DPL</th>
                        <th>Lokasi</th>
                        <th width="120">Anggota</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($kelompok)): ?>

                    <?php $no=1; ?>

                    <?php foreach($kelompok as $k): ?>

                    <tr>

                        <td class="text-center">
                            <?= $no++ ?>
                        </td>

                        <td>
                            <?= esc($k['nama_kelompok']) ?>
                        </td>

                        <td>
                            <?= esc($k['nama_dosen']) ?>
                        </td>

                        <td>
                            <?= esc($k['desa']) ?>
                        </td>

                        <td class="text-center">

                            <a
                                href="<?= site_url('admin/detail_kelompok/'.$k['id']) ?>"
                                class="btn btn-info btn-sm">

                                <i class="bi bi-people-fill"></i>

                                <?= $k['jml_mhs'] ?>

                            </a>

                        </td>

                        <td class="text-center">

           <button
    type="button"
    class="btn btn-warning btn-sm"
    data-bs-toggle="modal"
    data-bs-target="#modalEditKelompok<?= $k['id'] ?>">

    <i class="bi bi-pencil-square"></i>

</button>

                            <a
                                href="<?= site_url('admin/hapus_kelompok/'.$k['id']) ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus kelompok ini?')">

                                <i class="bi bi-trash"></i>

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>
<?php foreach($kelompok as $k): ?>

    <?= view('admin/modal/edit_kelompok', [
        'k'      => $k,
        'dosen'  => $dosen,
        'lokasi' => $lokasi
    ]) ?>

<?php endforeach; ?>
                    <?php else: ?>

                    <tr>

                        <td colspan="6" class="text-center text-muted">

                            Belum ada data kelompok.

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

<?= $this->include('admin/layout/footer') ?>