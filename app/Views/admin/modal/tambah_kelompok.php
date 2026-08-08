<div class="modal fade" id="modalTambahKelompok" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/tambah_kelompok') ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Kelompok

                    </h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Kelompok

                        </label>

                        <input
                            type="text"
                            name="nama_kelompok"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Dosen Pembimbing

                        </label>

                        <select
                            name="id_dpl"
                            class="form-select"
                            required>

                            <option value="">-- Pilih DPL --</option>

                            <?php foreach($dosen as $d): ?>

                            <option value="<?= $d['id'] ?>">

                                <?= esc($d['nama_dosen']) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Lokasi

                        </label>

                        <select
                            name="id_lokasi"
                            class="form-select"
                            required>

                            <option value="">-- Pilih Lokasi --</option>

                            <?php foreach($lokasi as $l): ?>

                            <option value="<?= $l['id'] ?>">

                                <?= esc($l['desa']) ?>
                                -
                                <?= esc($l['kecamatan']) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="bi bi-save"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>