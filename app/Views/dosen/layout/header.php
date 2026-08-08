<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?? 'SIM KKN' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/dosen.css') ?>">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#eef2f7;
            font-family:'Segoe UI',sans-serif;
        }

        /* Sidebar */

        .sidebar{

            position:fixed;

            left:0;
            top:0;

            width:270px;
            height:100vh;

            background:#0d6efd;

            color:white;

            overflow:auto;

            z-index:1000;

        }

        .logo{

            font-size:26px;

            font-weight:bold;

            text-align:center;

            padding:28px 0;

            border-bottom:1px solid rgba(255,255,255,.15);

        }

        .sidebar ul{

            list-style:none;

            padding:0;

            margin:30px 0;

        }

        .sidebar ul li{

            margin-bottom:8px;

        }

        .sidebar ul li a{

            display:block;

            color:white;

            text-decoration:none;

            padding:14px 30px;

            transition:.3s;

            font-size:18px;

        }

        .sidebar ul li a i{

            margin-right:12px;

        }

        .sidebar ul li a:hover{

            background:rgba(255,255,255,.15);

        }

        .sidebar ul li a.active{

            background:rgba(255,255,255,.2);

        }

        /* Main */

        .main-content{

            margin-left:270px;

            min-height:100vh;

        }

        /* Topbar */

        .topbar{

            height:90px;

            background:white;

            display:flex;

            justify-content:space-between;

            align-items:center;

            padding:0 40px;

            box-shadow:0 2px 10px rgba(0,0,0,.08);

        }

        .topbar h3{

            margin:0;

            font-size:24px;

            font-weight:bold;

        }

        .topbar .user{

            font-size:18px;

            font-weight:600;

        }

        /* Card */

        .card{

            border:none;

            border-radius:12px;

        }

        .card-header{

            font-size:20px;

            font-weight:600;

        }

        .table th{

            vertical-align:middle;

        }

        .table td{

            vertical-align:middle;

        }

        .badge{

            font-size:13px;

        }

        .btn{

            border-radius:8px;

        }

    </style>

</head>

<body></body>