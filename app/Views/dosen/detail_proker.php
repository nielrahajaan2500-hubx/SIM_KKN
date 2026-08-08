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
                Detail Program Kerja
            </h5>

        </div>

        <div class="card-body">

            <table class="table table-borderless">

                <tr>
                    <th width="220">Kelompok</th>
                    <td><?= esc($proker['nama_kelompok']) ?></td>
                </tr>

                <tr>
                    <th>Judul Program Kerja</th>
                    <td><?= esc($proker['judul_proker']) ?></td>
                </tr>

                <tr>
                    <th>Bidang</th>
                    <td><?= esc($proker['bidang']) ?></td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td><?= nl2br(esc($proker['deskripsi'])) ?></td>
                </tr>

                <tr>
                    <th>Tanggal Mulai</th>
                    <td><?= date('d-m-Y', strtotime($proker['tanggal_mulai'])) ?></td>
                </tr>

                <tr>
                    <th>Tanggal Selesai</th>
                    <td><?= date('d-m-Y', strtotime($proker['tanggal_selesai'])) ?></td>
                </tr>

                <tr>
                    <th>Status</th>

                    <td>

                        <?php

                        $badge='secondary';

                        if($proker['status']=='Menunggu') $badge='warning';
                        if($proker['status']=='Disetujui') $badge='success';
                        if($proker['status']=='Ditolak') $badge='danger';

                        ?>

                        <span class="badge bg-<?= $badge ?>">

                            <?= esc($proker['status']) ?>

                        </span>

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
                        class="form-control"
                        rows="5"><?= esc($proker['catatan_dpl']) ?></textarea>

                </div>

                <a href="<?= site_url('dosen/monitoring') ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

                <?php if($proker['status']=='Menunggu'): ?>

       <form action="<?= site_url('dosen/approveProker/'.$p['id']) ?>" method="post">
    <?= csrf_field() ?>
    <button class="btn btn-success btn-sm">
        Setujui
    </button>
</form>

                    <button
                        formaction="<?= site_url('dosen/tolakProker/'.$proker['id']) ?>"
                        class="btn btn-danger">

                        <i class="bi bi-x-circle"></i>

                        Tolak

                    </button>

                <?php endif; ?>

            </form>

        </div>

    </div>

</div>

</div>

<?= $this->include('dosen/layout/footer') ?>