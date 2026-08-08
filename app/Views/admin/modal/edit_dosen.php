<div class="modal fade"
     id="modalEditDosen<?= $d['id'] ?>"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/updateDosen/'.$d['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">

                        <i class="bi bi-pencil-square"></i>

                        Edit Dosen

                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            NIDN
                        </label>

                        <input type="text"
                               name="nidn"
                               class="form-control"
                               value="<?= esc($d['nidn']) ?>"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Dosen
                        </label>

                        <input type="text"
                               name="nama_dosen"
                               class="form-control"
                               value="<?= esc($d['nama_dosen']) ?>"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button type="submit"
                            class="btn btn-warning">

                        <i class="bi bi-save"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>