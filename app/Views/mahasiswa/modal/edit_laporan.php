<?php foreach($laporan as $l): ?>

<div class="modal fade"
     id="edit<?= $l['id'] ?>"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= site_url('mahasiswa/updateLaporan/'.$l['id']) ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">

                        <i class="bi bi-pencil-square"></i>

                        Edit Laporan

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Judul Laporan

                        </label>

                        <input
                            type="text"
                            name="judul_laporan"
                            class="form-control"
                            value="<?= esc($l['judul_laporan']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            class="form-control"
                            required><?= esc($l['deskripsi']) ?></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Foto Saat Ini

                        </label>

                        <br>

                        <?php if(!empty($l['foto'])): ?>

                            <img
                                src="<?= base_url('uploads/foto/'.$l['foto']) ?>"
                                class="img-thumbnail"
                                width="180">

                        <?php else: ?>

                            <span class="text-muted">

                                Belum ada foto.

                            </span>

                        <?php endif; ?>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Ganti Foto

                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Ganti File Laporan

                        </label>

                        <input
                            type="file"
                            name="file_laporan"
                            class="form-control"
                            accept=".pdf,.doc,.docx">

                    </div>

                    <?php if(!empty($l['catatan_dpl'])): ?>

                    <div class="alert alert-warning">

                        <strong>

                            Catatan DPL :

                        </strong>

                        <br>

                        <?= esc($l['catatan_dpl']) ?>

                    </div>

                    <?php endif; ?>

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
                        class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php endforeach; ?>