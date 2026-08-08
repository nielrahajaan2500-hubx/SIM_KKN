<?php

/** @var string $title */

helper('url');

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
    :root {
        --primary: #2563EB;
        --primary-hover: #1D4ED8;
    }

    body {
        background: #F5F7FB;
        font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
    }

    .login-header {
        background: var(--primary);
        color: white;
        text-align: center;
        padding: 25px;
    }

    .login-header h3 {
        margin: 0;
        font-weight: bold;
    }

    .form-control {
        height: 48px;
        border-radius: 8px;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .20);
    }

    .btn-login {
        width: 100%;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
    }

    .btn-login:hover {
        background: var(--primary-hover);
        color: white;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        text-decoration: none;
        color: var(--primary);
        font-weight: 600;
    }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5 col-lg-4">

                <div class="card login-card">

                    <div class="login-header">

                        <h3>

                            SIM KKN

                        </h3>

                        <p class="mb-0">

                            Silakan login untuk melanjutkan

                        </p>

                    </div>

                    <div class="card-body p-4">

                        <?php if(session()->getFlashdata('success')): ?>

                        <div class="alert alert-success alert-dismissible fade show">

                            <?= session()->getFlashdata('success') ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                        </div>

                        <?php endif; ?>

                        <?php if(session()->getFlashdata('error')): ?>

                        <div class="alert alert-danger alert-dismissible fade show">

                            <?= session()->getFlashdata('error') ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                        </div>

                        <?php endif; ?>

                        <form action="<?= site_url('login/process') ?>" method="post">

                            <?= csrf_field() ?>

                            <div class="mb-3">

                                <label class="form-label">

                                    Username

                                </label>

                                <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                                    required autocomplete="username">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Password

                                </label>

                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required autocomplete="current-password">

                            </div>

                            <button type="submit" class="btn btn-login">

                                <i class="bi bi-box-arrow-in-right"></i>

                                Login

                            </button>

                        </form>

                        <a href="<?= site_url('/') ?>" class="back-link">

                            <i class="bi bi-arrow-left"></i>

                            Kembali ke Landing Page

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>