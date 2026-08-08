<?= $this->include('dosen/layout/header') ?>
<?= $this->include('dosen/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('dosen/layout/topbar') ?>

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>

                <i class="bi bi-people-fill"></i>

                Detail Monitoring Kelompok

            </h3>

            <a href="<?= site_url('dosen/monitoring') ?>" class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

        </div>

        <?php if(session()->getFlashdata('success')): ?>

        <div class="alert alert-success">

            <?= session()->getFlashdata('success') ?>

        </div>

        <?php endif; ?>

        <!-- =============================
        INFORMASI KELOMPOK
============================= -->

        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">

                <h5 class="mb-0">

                    Informasi Kelompok

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">

                        <strong>Nama Kelompok</strong>

                        <p><?= esc($kelompok['nama_kelompok']) ?></p>

                    </div>

                    <div class="col-md-4">

                        <strong>Dosen Pembimbing</strong>

                        <p><?= esc($kelompok['nama_dosen']) ?></p>

                    </div>

                    <div class="col-md-4">

                        <strong>Lokasi</strong>

                        <p>

                            <?= esc($kelompok['desa']) ?>

                            <?= esc($kelompok['kecamatan']) ?>

                            <?= esc($kelompok['kabupaten']) ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>



        <!-- =============================
        ANGGOTA
============================= -->

        <div class="card shadow mb-4">

            <div class="card-header bg-success text-white">

                <h5 class="mb-0">

                    Anggota Kelompok

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead class="table-success text-center">

                            <tr>

                                <th>No</th>

                                <th>NIM</th>

                                <th>Nama Mahasiswa</th>

                                <th>Program Studi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($anggota)): ?>

                            <?php $no=1; ?>

                            <?php foreach($anggota as $a): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($a['nim']) ?></td>

                                <td><?= esc($a['nama_mahasiswa']) ?></td>

                                <td><?= esc($a['prodi']) ?></td>

                            </tr>

                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="4" class="text-center">

                                    Belum ada anggota.

                                </td>

                            </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        <!-- =============================
        PROGRAM KERJA
============================= -->

        <div class="card shadow mb-4">

            <div class="card-header bg-warning">

                <h5 class="mb-0">

                    Program Kerja

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead class="table-warning text-center">

                            <tr>

                                <th>No</th>

                                <th>Judul</th>

                                <th>Bidang</th>

                                <th>Tanggal</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($proker)): ?>

                            <?php $no=1; ?>

                            <?php foreach($proker as $p): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($p['judul_proker']) ?></td>

                                <td><?= esc($p['bidang']) ?></td>

                                <td>

                                    <?= date('d-m-Y',strtotime($p['tanggal_mulai'])) ?>

                                    <br>

                                    s/d

                                    <br>

                                    <?= date('d-m-Y',strtotime($p['tanggal_selesai'])) ?>

                                </td>

                                <td>

                                    <?php if($p['status']=='Disetujui'): ?>

                                    <span class="badge bg-success">

                                        Disetujui

                                    </span>

                                    <?php elseif($p['status']=='Menunggu'): ?>

                                    <span class="badge bg-warning text-dark">

                                        Menunggu

                                    </span>

                                    <?php else: ?>

                                    <span class="badge bg-danger">

                                        Ditolak

                                    </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <a href="<?= site_url('dosen/detailProker/'.$p['id']) ?>"
                                        class="btn btn-info btn-sm">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <a href="<?= site_url('dosen/approveProker/'.$p['id']) ?>"
                                        class="btn btn-success btn-sm">

                                        <i class="bi bi-check-lg"></i>

                                    </a>

                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#tolak<?= $p['id'] ?>">

                                        <i class="bi bi-x-lg"></i>

                                    </button>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="6" class="text-center">

                                    Belum ada Program Kerja.

                                </td>

                            </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        <!-- =============================
      MODAL TOLAK PROKER
============================= -->

        <?php foreach($proker as $p): ?>

        <div class="modal fade" id="tolak<?= $p['id'] ?>">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form action="<?= site_url('dosen/tolakProker/'.$p['id']) ?>" method="post">

                        <?= csrf_field() ?>

                        <div class="modal-header bg-danger text-white">

                            <h5>

                                Tolak Program Kerja

                            </h5>

                            <button class="btn-close btn-close-white" data-bs-dismiss="modal">
                            </button>

                        </div>

                        <div class="modal-body">

                            <label>

                                Catatan DPL

                            </label>

                            <textarea name="catatan_dpl" rows="5" class="form-control"></textarea>

                        </div>

                        <div class="modal-footer">

                            <button class="btn btn-danger">

                                Kirim Revisi

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

        <!-- ====== LANJUTKAN DENGAN PART 2 ====== -->
        <!-- ===========================
        LAPORAN KELOMPOK
=========================== -->

        <div class="card shadow mb-4">

            <div class="card-header bg-info text-white">

                <h5 class="mb-0">

                    <i class="bi bi-file-earmark-text"></i>

                    Laporan Kelompok

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-info text-center">

                            <tr>

                                <th>No</th>

                                <th>Judul Laporan</th>

                                <th>Program Kerja</th>

                                <th>Tanggal Upload</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($laporanM)): ?>

                            <?php $no=1; ?>

                            <?php foreach($laporanM as $l): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($l['judul_laporan']) ?></td>

                                <td><?= esc($l['judul_proker']) ?></td>

                                <td><?= date('d-m-Y',strtotime($l['tanggal_upload'])) ?></td>

                                <td>

                                    <?php if($l['status']=='Disetujui'): ?>

                                    <span class="badge bg-success">

                                        Disetujui

                                    </span>

                                    <?php elseif($l['status']=='Menunggu'): ?>

                                    <span class="badge bg-warning text-dark">

                                        Menunggu

                                    </span>

                                    <?php else: ?>

                                    <span class="badge bg-danger">

                                        Revisi

                                    </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <?php if($l['foto']): ?>

                                    <a href="<?= base_url('uploads/foto/'.$l['foto']) ?>" target="_blank"
                                        class="btn btn-info btn-sm">

                                        <i class="bi bi-image"></i>

                                    </a>

                                    <?php endif; ?>

                                    <?php if($l['file_laporan']): ?>

                                    <a href="<?= base_url('uploads/laporan/'.$l['file_laporan']) ?>" target="_blank"
                                        class="btn btn-success btn-sm">

                                        <i class="bi bi-file-earmark-pdf"></i>

                                    </a>

                                    <?php endif; ?>

                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#verifikasi<?= $l['id'] ?>">

                                        <i class="bi bi-check-circle"></i>

                                    </button>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="6" class="text-center">

                                    Belum ada laporan.

                                </td>

                            </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        <!-- ===========================
      MODAL VERIFIKASI
=========================== -->

        <?php foreach($laporanM as $l): ?>

        <div class="modal fade" id="verifikasi<?= $l['id'] ?>">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <form action="<?= site_url('dosen/updateVerifikasi/'.$l['id']) ?>" method="post">

                        <?= csrf_field() ?>

                        <div class="modal-header bg-primary text-white">

                            <h5>

                                Verifikasi Laporan

                            </h5>

                            <button class="btn-close btn-close-white" data-bs-dismiss="modal">
                            </button>

                        </div>

                        <div class="modal-body">

                            <div class="mb-3">

                                <label>

                                    Judul Laporan

                                </label>

                                <input type="text" class="form-control" value="<?= esc($l['judul_laporan']) ?>"
                                    readonly>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Status Saat Ini

                                </label>

                                <input type="text" class="form-control" value="<?= esc($l['status']) ?>" readonly>

                            </div>

                            <div class="mb-3">

                                <label>

                                    Catatan DPL

                                </label>

                                <textarea name="catatan_dpl" rows="5"
                                    class="form-control"><?= esc($l['catatan_dpl']) ?></textarea>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button name="status" value="Revisi" class="btn btn-danger">

                                Revisi

                            </button>

                            <button name="status" value="Disetujui" class="btn btn-success">

                                Setujui

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

<?= $this->include('dosen/layout/footer') ?>