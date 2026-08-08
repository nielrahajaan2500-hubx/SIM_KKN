<form action="<?= site_url('admin/simpan_kelompok') ?>" method="post">

<?= csrf_field() ?>

<div class="mb-3">
    <label>Nama Kelompok</label>
    <input type="text"
           name="nama_kelompok"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label>Dosen Pembimbing</label>

    <select name="id_dpl" class="form-select">

        <?php foreach($dosen as $d): ?>

        <option value="<?= $d['id'] ?>">
            <?= $d['nama_dosen'] ?>
        </option>

        <?php endforeach; ?>

    </select>

</div>

<div class="mb-3">

    <label>Lokasi KKN</label>

    <select name="id_lokasi" class="form-select">

        <?php foreach($lokasi as $l): ?>

        <option value="<?= $l['id'] ?>">
            <?= $l['desa'] ?> - <?= $l['kecamatan'] ?>
        </option>

        <?php endforeach; ?>

    </select>

</div>

<button class="btn btn-primary">
    Simpan
</button>

<a href="<?= site_url('admin/plotting') ?>"
   class="btn btn-secondary">
    Kembali
</a>

</form>