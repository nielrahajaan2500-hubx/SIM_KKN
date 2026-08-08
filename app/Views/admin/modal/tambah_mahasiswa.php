<div class="modal fade" id="modalTambahMahasiswa" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/simpanMahasiswa') ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">

                        <i class="bi bi-person-plus-fill"></i>

                        Tambah Mahasiswa

                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            NIM
                        </label>

                        <input type="text" name="nim" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Mahasiswa
                        </label>

                        <input type="text" name="nama_mahasiswa" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Program Studi
                        </label>

                        <select name="prodi" class="form-select" required>

                            <option value="">-- Pilih Program Studi --</option>

                            <option value="Manajemen">
                                Manajemen
                            </option>

                            <option value="Teknik Informatika">
                                Teknik Informatika
                            </option>

                            <option value="Teknik Sipil">
                                Teknik Sipil
                            </option>

                            <option value="Teknik Geomatika">
                                Teknik Geomatika
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                        <i class="bi bi-x-circle"></i>

                        Batal

                    </button>

                    <button type="submit" class="btn btn-success">

                        <i class="bi bi-save"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>