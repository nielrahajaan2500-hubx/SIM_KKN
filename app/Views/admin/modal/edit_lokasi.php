<div class="modal fade"
     id="modalEditLokasi<?= $l['id'] ?>"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/updateLokasi/'.$l['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">

                        <i class="bi bi-pencil-square"></i>

                        Edit Lokasi KKN

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">Kabupaten</label>

                        <input
                            type="text"
                            name="kabupaten"
                            class="form-control"
                            value="<?= esc($l['kabupaten']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Kecamatan</label>

                        <input
                            type="text"
                            name="kecamatan"
                            class="form-control"
                            value="<?= esc($l['kecamatan']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Desa</label>

                        <input
                            type="text"
                            name="desa"
                            class="form-control"
                            value="<?= esc($l['desa']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Dusun</label>

                        <input
                            type="text"
                            name="dusun"
                            class="form-control"
                            value="<?= esc($l['dusun']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Kuota</label>

                        <input
                            type="number"
                            name="kuota"
                            class="form-control"
                            value="<?= esc($l['kuota']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Status</label>

                        <select
                            name="status"
                            class="form-select"
                            required>

                            <option value="Aktif"
                                <?= $l['status'] == 'Aktif' ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="Non Aktif"
                                <?= $l['status'] == 'Non Aktif' ? 'selected' : '' ?>>
                                Non Aktif
                            </option>

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
                        class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>