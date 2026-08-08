<div class="modal fade" id="modalUpload" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="<?= site_url('mahasiswa/simpanLaporan') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title">

                        <i class="bi bi-upload"></i>

                        Upload Laporan KKN

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

                            Judul Laporan

                        </label>

                        <input
                            type="text"
                            name="judul_laporan"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Program Kerja

                        </label>

                        <select
                            name="id_proker"
                            class="form-select"
                            required>

                            <option value="">

                                -- Pilih Program Kerja --

                            </option>

                            <?php foreach($proker as $p): ?>

                                <option value="<?= $p['id'] ?>">

                                    <?= esc($p['judul_proker']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            class="form-control"
                            required></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Foto Kegiatan

                        </label>

                        <input
                            type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            File Laporan

                        </label>

                        <input
                            type="file"
                            name="file_laporan"
                            class="form-control"
                            accept=".pdf,.doc,.docx"
                            required>

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
                        class="btn btn-primary">

                        <i class="bi bi-save"></i>

                        Upload

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>