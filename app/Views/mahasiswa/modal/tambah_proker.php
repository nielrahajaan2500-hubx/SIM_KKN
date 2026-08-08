<?= $this->include('mahasiswa/layout/header') ?>
<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

    <?= $this->include('mahasiswa/layout/topbar') ?>

    <div class="container-fluid">

        <!-- isi halaman proker -->

        <table class="table table-bordered">
            ...
        </table>

    </div>

    <!-- Tempel modal di sini -->
    <div class="modal fade" id="modalTambah" tabindex="-1">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form action="<?= site_url('mahasiswa/simpanProker') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="modal-header bg-success text-white">

                        <h5 class="modal-title">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Program Kerja
                        </h5>

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Judul Program Kerja</label>
                            <input type="text" name="judul_proker" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bidang</label>
                            <input type="text" name="bidang" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="form-control" required></textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" required>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button class="btn btn-success">
                            <i class="bi bi-save"></i>
                            Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <?= $this->include('mahasiswa/layout/footer') ?>