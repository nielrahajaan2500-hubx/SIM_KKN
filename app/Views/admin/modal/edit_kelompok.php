<div class="modal fade" id="modalEditKelompok<?= $k['id'] ?>" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/update_kelompok/'.$k['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">

                        <i class="bi bi-pencil-square"></i>

                        Edit Kelompok

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Kelompok

                        </label>

                        <input type="text" name="nama_kelompok" class="form-control"
                            value="<?= esc($k['nama_kelompok']) ?>" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Dosen Pembimbing

                        </label>

                        <select name="id_dpl" class="form-select" required>

                            <?php foreach($dosen as $d): ?>

                            <option value="<?= $d['id'] ?>" <?= ($k['id_dpl']==$d['id']) ? 'selected' : '' ?>>

                                <?= esc($d['nama_dosen']) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Lokasi

                        </label>

                        <select name="id_lokasi" class="form-select" required>

                            <?php foreach($lokasi as $l): ?>

                            <option value="<?= $l['id'] ?>" <?= ($k['id_lokasi']==$l['id']) ? 'selected' : '' ?>>

                                <?= esc($l['desa']) ?> -
                                <?= esc($l['kecamatan']) ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit" class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>