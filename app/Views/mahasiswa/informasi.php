<?= $this->include('mahasiswa/layout/header') ?>
<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('mahasiswa/layout/topbar') ?>

    <div class="container-fluid py-4">

        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">

                <h5 class="mb-0">

                    <i class="bi bi-geo-alt-fill"></i>

                    Informasi Penempatan KKN

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-borderless">

                    <tr>

                        <td width="220"><b>Nama</b></td>

                        <td><?= esc($mhs['nama_mahasiswa'] ?? '-') ?></td>

                    </tr>

                    <tr>

                        <td><b>NIM</b></td>

                        <td><?= esc($mhs['nim'] ?? '-') ?></td>

                    </tr>

                    <tr>

                        <td><b>Program Studi</b></td>

                        <td><?= esc($mhs['prodi'] ?? '-') ?></td>

                    </tr>

                    <tr>

                        <td><b>Kelompok</b></td>

                        <td><?= esc($mhs['nama_kelompok'] ?? '-') ?>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Dosen Pembimbing</b></td>

                        <td><?= esc($mhs['nama_dosen'] ?? '-') ?>
                        </td>

                    </tr>

                    <tr>

                        <td><b>Desa</b></td>

                        <td><?= esc($mhs['desa'] ?? '-') ?></td>

                    </tr>
                    <tr>
                        <td><b>Dusun</b></td>
                        <td><?= esc($mhs['dusun'] ?? '-') ?></td>
                    </tr>
                    <tr>

                        <td><b>Kecamatan</b></td>

                        <td><?= esc($mhs['kecamatan'] ?? '-') ?></td>

                    </tr>
                    <tr>
                        <td><b>Kabupaten</b></td>
                        <td><?= esc($mhs['kabupaten'] ?? '-') ?></td>
                    </tr>

                </table>

            </div>

        </div>



        <div class="card shadow">

            <div class="card-header bg-success text-white">

                <h5 class="mb-0">

                    <i class="bi bi-people-fill"></i>

                    Anggota Kelompok

                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-light">

                            <tr>

                                <th width="60">No</th>

                                <th>NIM</th>

                                <th>Nama Mahasiswa</th>

                                <th>Program Studi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($anggota)): ?>

                            <?php $no=1; foreach($anggota as $a): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($a['nim'] ?? '-') ?></td>

                                <td><?= esc($a['nama_mahasiswa'] ?? '-') ?></td>

                                <td><?= esc($a['prodi'] ?? '-') ?></td>

                            </tr>

                            <?php endforeach ?>

                            <?php else: ?>

                            <tr>

                                <td colspan="4" class="text-center">

                                    Belum ada anggota kelompok.

                                </td>

                            </tr>

                            <?php endif ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->include('mahasiswa/layout/footer') ?>