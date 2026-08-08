<div class="modal fade" id="modalTambahLokasi" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/simpanLokasi') ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        <i class="bi bi-geo-alt-fill"></i>
                        Tambah Lokasi KKN
                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Desa</label>
                        <input type="text" name="desa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dusun</label>
                        <input type="text" name="dusun" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kuota</label>
                        <input type="number" name="kuota" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-select" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="bi bi-save"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>