<?= $this->include('mahasiswa/layout/header') ?>
<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('mahasiswa/layout/topbar') ?>

    <div class="container-fluid py-4">

        <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= session()->getFlashdata('success') ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>

        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <?= session()->getFlashdata('error') ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>

        <?php endif; ?>

        <div class="card shadow">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <h5 class="mb-0">

                    <i class="bi bi-file-earmark-text"></i>

                    Laporan KKN

                </h5>

                <?php if(!empty($mhs['id_kelompok'])): ?>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUpload">

                    <i class="bi bi-upload"></i>

                    Upload Laporan

                </button>

                <?php endif; ?>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary">

                            <tr>

                                <th width="60">No</th>

                                <th>Judul Laporan</th>

                                <th>Program Kerja</th>

                                <th>Foto</th>

                                <th>File</th>

                                <th>Status</th>

                                <th>Catatan DPL</th>

                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($laporan)): ?>

                            <?php $no=1; ?>

                            <?php foreach($laporan as $l): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($l['judul_laporan']) ?></td>

                                <td><?= esc($l['judul_proker']) ?></td>

                                <td class="text-center">

                                    <?php if(!empty($l['foto'])): ?>

                                    <a href="<?= base_url('uploads/foto/'.$l['foto']) ?>" target="_blank"
                                        class="btn btn-info btn-sm">

                                        <i class="bi bi-image"></i>

                                    </a>

                                    <?php else: ?>

                                    -

                                    <?php endif; ?>

                                </td>

                                <td class="text-center">

                                    <?php if(!empty($l['file_laporan'])): ?>

                                    <a href="<?= base_url('uploads/laporan/'.$l['file_laporan']) ?>" target="_blank"
                                        class="btn btn-success btn-sm">

                                        <i class="bi bi-download"></i>

                                    </a>

                                    <?php else: ?>

                                    -

                                    <?php endif; ?>

                                </td>

                                <td class="text-center">

                                    <?php

                                    $badge='secondary';

                                    if($l['status']=='Menunggu'){
                                        $badge='warning';
                                    }

                                    if($l['status']=='Disetujui'){
                                        $badge='success';
                                    }

                                    if($l['status']=='Revisi'){
                                        $badge='danger';
                                    }

                                ?>

                                    <span class="badge bg-<?= $badge ?>">

                                        <?= esc($l['status']) ?>

                                    </span>

                                </td>

                                <td>

                                    <?= !empty($l['catatan_dpl']) ? esc($l['catatan_dpl']) : '-' ?>

                                <td class="text-center">

                                    <?php if($l['status']=='Menunggu' || $l['status']=='Revisi'): ?>

                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $l['id'] ?>">

                                        <i class="bi bi-pencil"></i>

                                    </button>

                                    <a href="<?= site_url('mahasiswa/hapusLaporan/'.$l['id']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                    <?php else: ?>

                                    <span class="badge bg-success">
                                        Terkunci
                                    </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="8" class="text-center">

                                    Belum ada laporan.

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

<?= $this->include('mahasiswa/modal/tambah_laporan') ?>

<?= $this->include('mahasiswa/modal/edit_laporan') ?>

<?= $this->include('mahasiswa/layout/footer') ?>