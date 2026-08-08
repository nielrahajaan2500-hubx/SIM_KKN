<?= $this->include('mahasiswa/layout/header') ?>

<?= $this->include('mahasiswa/layout/sidebar') ?>

<div class="main-content">

<?= $this->include('mahasiswa/layout/topbar') ?>

<div class="container-fluid mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h4>
                <i class="bi bi-pencil-square"></i>
                Edit Program Kerja
            </h4>

        </div>

        <div class="card-body">

            <form action="<?= site_url('mahasiswa/updateProker/'.$proker['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">

                    <label class="form-label">

                        Judul Program Kerja

                    </label>

                    <input
                        type="text"
                        name="judul_proker"
                        class="form-control"
                        value="<?= esc($proker['judul_proker']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Bidang

                    </label>

                    <input
                        type="text"
                        name="bidang"
                        class="form-control"
                        value="<?= esc($proker['bidang']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Deskripsi

                    </label>

                    <textarea
                        name="deskripsi"
                        rows="5"
                        class="form-control"
                        required><?= esc($proker['deskripsi']) ?></textarea>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <label class="form-label">

                            Tanggal Mulai

                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="<?= esc($proker['tanggal_mulai']) ?>"
                            required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">

                            Tanggal Selesai

                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            class="form-control"
                            value="<?= esc($proker['tanggal_selesai']) ?>"
                            required>

                    </div>

                </div>

                <hr>

                <a href="<?= site_url('mahasiswa/proker') ?>"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-warning">

                    <i class="bi bi-save"></i>

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

</div>

<?= $this->include('mahasiswa/layout/footer') ?>