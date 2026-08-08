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

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                Detail Laporan

            </h5>

        </div>

        <div class="card-body">

            <table class="table table-borderless">

                <tr>

                    <th width="220">Kelompok</th>

                    <td><?= esc($laporan['nama_kelompok']) ?></td>

                </tr>

                <tr>

                    <th>Program Kerja</th>

                    <td><?= esc($laporan['judul_proker']) ?></td>

                </tr>

                <tr>

                    <th>Judul Laporan</th>

                    <td><?= esc($laporan['judul_laporan']) ?></td>

                </tr>

                <tr>

                    <th>Deskripsi</th>

                    <td><?= nl2br(esc($laporan['deskripsi'])) ?></td>

                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        <?php

                        $badge='secondary';

                        if($laporan['status']=='Menunggu') $badge='warning';
                        if($laporan['status']=='Disetujui') $badge='success';
                        if($laporan['status']=='Ditolak') $badge='danger';

                        ?>

                        <span class="badge bg-<?= $badge ?>">

                            <?= esc($laporan['status']) ?>

                        </span>

                    </td>

                </tr>

                <tr>

                    <th>Foto Kegiatan</th>

                    <td>

                        <?php if(!empty($laporan['foto'])): ?>

                            <img src="<?= base_url('uploads/foto/'.$laporan['foto']) ?>"
                                 class="img-fluid rounded shadow"
                                 style="max-width:400px;">

                        <?php else: ?>

                            <span class="text-muted">

                                Tidak ada foto.

                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

                <tr>

                    <th>File Laporan</th>

                    <td>

                        <?php if(!empty($laporan['file_laporan'])): ?>

                            <a href="<?= base_url('uploads/laporan/'.$laporan['file_laporan']) ?>"
                               target="_blank"
                               class="btn btn-success">

                                <i class="bi bi-download"></i>

                                Download Laporan

                            </a>

                        <?php else: ?>

                            <span class="text-muted">

                                Tidak ada file.

                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            </table>

            <hr>

            <form method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">

                        Catatan DPL

                    </label>

                    <textarea
                        name="catatan_dpl"
                        rows="5"
                        class="form-control"><?= esc($laporan['catatan_dpl']) ?></textarea>

                </div>

                <a href="<?= site_url('dosen/monitoring') ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

                <?php if($laporan['status']=='Menunggu'): ?>

                    <button
                        formaction="<?= site_url('dosen/approveLaporan/'.$laporan['id']) ?>"
                        class="btn btn-success">

                        <i class="bi bi-check-circle"></i>

                        Setujui

                    </button>

                    <button
                        formaction="<?= site_url('dosen/tolakLaporan/'.$laporan['id']) ?>"
                        class="btn btn-danger">

                        <i class="bi bi-x-circle"></i>

                        Revisi

                    </button>

                <?php endif; ?>

            </form>

        </div>

    </div>

</div>

</div>

<?= $this->include('dosen/layout/footer') ?>