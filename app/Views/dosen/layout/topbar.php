<div class="topbar">

    <div>
        <h3><?= $title ?? 'Dashboard Dosen' ?></h3>
    </div>

    <div class="user">
        Selamat Datang,
        <strong><?= session()->get('nama'); ?></strong>
    </div>

</div>