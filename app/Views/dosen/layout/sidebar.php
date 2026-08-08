<div class="sidebar">

    <div class="logo">
        SIM KKN
    </div>

    <ul>

        <li>
            <a href="<?= site_url('dosen') ?>"
               class="<?= (uri_string() == 'dosen') ? 'active' : '' ?>">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="<?= site_url('dosen/monitoring') ?>"
               class="<?= (uri_string() == 'dosen/monitoring') ? 'active' : '' ?>">
                <i class="bi bi-people-fill"></i>
                Monitoring Kelompok
            </a>
        </li>

        <li>
            <a href="<?= site_url('logout') ?>"
               onclick="return confirm('Yakin ingin logout?')">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </li>

    </ul>

</div>