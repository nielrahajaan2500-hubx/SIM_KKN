<div class="modal fade" id="modalEditMahasiswa<?= $m['id'] ?>" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="<?= site_url('admin/updateMahasiswa/'.$m['id']) ?>" method="post">

                <?= csrf_field() ?>

                <div class="modal-header bg-warning">

                    <h5 class="modal-title">

                        <i class="bi bi-pencil-square"></i>

                        Edit Mahasiswa

                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>NIM</label>

                        <input
                            type="text"
                            name="nim"
                            class="form-control"
                            value="<?= esc($m['nim']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Nama Mahasiswa</label>

                        <input
                            type="text"
                            name="nama_mahasiswa"
                            class="form-control"
                            value="<?= esc($m['nama_mahasiswa']) ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Program Studi</label>

                        <select
                            name="prodi"
                            class="form-select">

                            <option value="Manajemen"
                                <?= $m['prodi']=='Manajemen'?'selected':'' ?>>
                                Manajemen
                            </option>

                            <option value="Teknik Informatika"
                                <?= $m['prodi']=='Teknik Informatika'?'selected':'' ?>>
                                Teknik Informatika
                            </option>

                            <option value="Teknik Sipil"
                                <?= $m['prodi']=='Teknik Sipil'?'selected':'' ?>>
                                Teknik Sipil
                            </option>

                            <option value="Teknik Geomatika"
                                <?= $m['prodi']=='Teknik Geomatika'?'selected':'' ?>>
                                Teknik Geomatika
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

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>