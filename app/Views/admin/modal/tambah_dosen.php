<div class="modal fade" id="modalTambahDosen" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/simpanDosen') ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        <i class="bi bi-person-plus-fill"></i>
                        Tambah Dosen
                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">NIDN</label>

                        <input type="text"
                               name="nidn"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">Nama Dosen</label>

                        <input type="text"
                               name="nama_dosen"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        <i class="bi bi-x-circle"></i>
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