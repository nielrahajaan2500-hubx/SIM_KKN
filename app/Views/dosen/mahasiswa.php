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

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= session()->getFlashdata('error') ?>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- INFORMASI KELOMPOK -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Informasi Kelompok</h5>
            </div>

            <div class="card-body">

                <table class="table table-borderless">

                    <tr>
                        <th width="220">Nama Kelompok</th>
                        <td><?= esc($kelompok['nama_kelompok']) ?></td>
                    </tr>

                    <tr>
                        <th>Dosen Pembimbing</th>
                        <td><?= esc($kelompok['nama_dosen']) ?></td>
                    </tr>

                    <tr>
                        <th>Lokasi</th>
                        <td>
                            <?= esc($kelompok['desa']) ?>,
                            <?= esc($kelompok['kecamatan']) ?>,
                            <?= esc($kelompok['kabupaten']) ?>
                        </td>
                    </tr>

                </table>

            </div>
        </div>

        <!-- ANGGOTA -->
        <div class="card shadow mb-4">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Anggota Kelompok</h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead class="table-success">

                        <tr>

                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($anggota)): ?>

                        <?php $no=1; foreach($anggota as $a): ?>

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

        <!-- PROGRAM KERJA -->
        <div class="card shadow mb-4">

            <div class="card-header bg-warning">
                <h5 class="mb-0">Program Kerja</h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead class="table-warning">

                        <tr>
                            <th>No</th>
                            <th>Judul Program</th>
                            <th>Bidang</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($proker)): ?>

                        <?php $no=1; foreach($proker as $p): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= esc($p['judul_proker']) ?></td>

                            <td><?= esc($p['bidang']) ?></td>

                            <td><?= esc($p['status']) ?></td>
                            <td>

                                <a href="<?= site_url('dosen/detailProker/'.$p['id']) ?>" class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a href="<?= site_url('dosen/approveProker/'.$p['id']) ?>"
                                    class="btn btn-success btn-sm">

                                    Setujui

                                </a>

                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tolak<?= $p['id'] ?>">

                                    Tolak

                                </button>

                            </td>

                            <td>

                                <a href="<?= site_url('dosen/detailProker/'.$p['id']) ?>"
                                    class="btn btn-primary btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>

                            <td colspan="5" class="text-center">

                                Belum ada Program Kerja.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>
                <?php foreach($proker as $p): ?>

                <div class="modal fade" id="tolak<?= $p['id'] ?>">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <form action="<?= site_url('dosen/tolakProker/'.$p['id']) ?>" method="post">

                                <div class="modal-header">

                                    <h5>Tolak Program Kerja</h5>

                                </div>

                                <div class="modal-body">

                                    <label>Catatan DPL</label>

                                    <textarea name="catatan_dpl" class="form-control" rows="4"></textarea>

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

            </div>

        </div>

        <!-- LAPORAN -->
        <div class="card shadow mb-4">

            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Laporan Kelompok</h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead class="table-info">

                        <tr>

                            <th>No</th>
                            <th>Judul Laporan</th>
                            <th>Program Kerja</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(!empty($laporan)): ?>

                        <?php $no=1; foreach($laporan as $l): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= esc($l['judul_laporan']) ?></td>

                            <td><?= esc($l['judul_proker']) ?></td>

                            <td><?= esc($l['status']) ?></td>

                            <td>

                                <a href="<?= site_url('dosen/detailLaporan/'.$l['id']) ?>" class="btn btn-info btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>

                            <td colspan="5" class="text-center">

                                Belum ada laporan.

                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>
                <?php foreach($laporanM as $l): ?>

                <div class="modal fade" id="verifikasi<?= $l['id'] ?>">

                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <form action="<?= site_url('dosen/updateVerifikasi/'.$l['id']) ?>" method="post">

                                <div class="modal-header">

                                    <h5>Verifikasi Laporan</h5>

                                </div>

                                <div class="modal-body">

                                    <label>Catatan DPL</label>

                                    <textarea name="catatan_dpl" class="form-control"
                                        rows="4"><?= $l['catatan_dpl'] ?></textarea>

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
<div class="card mt-4 shadow">

<div class="card-header bg-secondary text-white">

Catatan DPL

</div>

<div class="card-body">

<form
action="<?= site_url('dosen/simpanCatatan/'.$kelompok['id']) ?>"
method="post">

<textarea
name="catatan_dpl"
class="form-control"
rows="5"><?= $kelompok['catatan_dpl'] ?></textarea>

<button
class="btn btn-primary mt-3">

Simpan Catatan

</button>

</form>

</div>

</div>
        </div>

        <a href="<?= site_url('dosen/monitoring') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

</div>

<?= $this->include('dosen/layout/footer') ?>