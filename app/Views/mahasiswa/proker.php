<?= $this->include('mahasiswa/layout/header') ?>
<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

<?= $this->include('mahasiswa/layout/topbar') ?>

<div class="container-fluid py-4">

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                <i class="bi bi-journal-text"></i>
                Program Kerja Kelompok
            </h5>

            <?php if(!empty($mhs['id_kelompok'])) : ?>
                <button
                    class="btn btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTambah">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Program Kerja

                </button>
            <?php endif; ?>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Nama Kelompok
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= esc($mhs['nama_kelompok'] ?? 'Belum Ada Kelompok') ?>"
                        readonly>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary text-center">

                        <tr>

                            <th width="50">No</th>
                            <th>Judul Program Kerja</th>
                            <th>Bidang</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Catatan DPL</th>
                            <th width="180">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if(!empty($proker)) : ?>

                        <?php $no=1; foreach($proker as $p) : ?>

                        <tr>

                            <td class="text-center"><?= $no++ ?></td>

                            <td><?= esc($p['judul_proker']) ?></td>

                            <td><?= esc($p['bidang']) ?></td>

                            <td class="text-center">
                                <?= date('d-m-Y', strtotime($p['tanggal_mulai'])) ?>
                            </td>

                            <td class="text-center">
                                <?= date('d-m-Y', strtotime($p['tanggal_selesai'])) ?>
                            </td>

                            <td class="text-center">

                                <?php

                                    $badge='secondary';

                                    if($p['status']=='Menunggu'){
                                        $badge='warning';
                                    }

                                    if($p['status']=='Disetujui'){
                                        $badge='success';
                                    }

                                    if($p['status']=='Ditolak'){
                                        $badge='danger';
                                    }

                                ?>

                                <span class="badge bg-<?= $badge ?>">
                                    <?= esc($p['status']) ?>
                                </span>

                            </td>

                            <td>

                                <?= !empty($p['catatan_dpl']) ? esc($p['catatan_dpl']) : '-' ?>

                            </td>

                            <td class="text-center">
<?php if($p['status'] == 'Menunggu' || $p['status'] == 'Ditolak'): ?>

    <a href="<?= site_url('mahasiswa/editProker/'.$p['id']) ?>"
       class="btn btn-warning btn-sm">
        <i class="bi bi-pencil"></i>
    </a>

    <a href="<?= site_url('mahasiswa/hapusProker/'.$p['id']) ?>"
       class="btn btn-danger btn-sm"
       onclick="returns confirm('Yakin ingin menghapus program kerja ini?')">
        <i class="bi bi-trash"></i>
    </a>

<?php else: ?>

    <span class="badge bg-secondary">
        Terkunci
    </span>

<?php endif; ?>
                

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>

                            <td colspan="8" class="text-center">

                                Belum ada Program Kerja.

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

<?= $this->include('mahasiswa/modal/tambah_proker') ?>

<?= $this->include('mahasiswa/layout/footer') ?>