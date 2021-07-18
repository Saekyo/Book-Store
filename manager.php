<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <title>Manager</title>
</head>

<body>
    <!-- --NAVBAR-- -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="position: fixed; width: 280px; float: left; height: 100vh;">
        <a href="manager.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="margin-left: auto;">
            <span class="fs-4">Book Store</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="manager.php">
                    Home
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Report
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?menu=cetak_faktur">Print Invoice</a></li>
                    <li><a class="dropdown-item" href="?menu=semua_penjualan">All Sales</a></li>
                    <li><a class="dropdown-item" href="?menu=penjualan_pertanggal">Sales By Date</a></li>
                    <li><a class="dropdown-item" href="?menu=data_buku">All Book Data</a></li>
                    <li><a class="dropdown-item" href="?menu=filter_penulis">Book Author Filter</a></li>
                    <li><a class="dropdown-item" href="?menu=buku_sering_terjual">Frequently Sold Book</a></li>
                    <li><a class="dropdown-item" href="?menu=buku_tidak_terjual">Book That Never Sold</a></li>
                    <li><a class="dropdown-item" href="?menu=pasok_buku">Book Supply</a></li>
                    <li><a class="dropdown-item" href="?menu=filter_buku">Book Supply Filter</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="?menu=profil">Profile</a></li>
                </ul>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

                <strong>Manager</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="?menu=ubah_pass">Ubah Password</a></li>
                <li><a class="dropdown-item" href="?menu=tambah_akun">Tambah Akun</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" onclick="return confirm('Are you sure want to logout?');" href="logout.php">Logout</a>
            </ul>
        </div>
    </div>

    <br>

    <?php
    switch (@$_GET['menu']) {
        case 'cetak_faktur';
            include 'cetak_faktur.php';
            break;

        case 'semua_penjualan';
            include 'semua_penjualan.php';
            break;

        case 'penjualan_pertanggal';
            include 'penjualan_pertanggal.php';
            break;

        case 'data_buku';
            include 'data_buku.php';
            break;

        case 'filter_penulis';
            include 'filter_penulis.php';
            break;

        case 'buku_sering_terjual';
            include 'buku_sering_terjual.php';
            break;

        case 'buku_tidak_terjual';
            include 'buku_tidak_terjual.php';
            break;

        case 'pasok_buku';
            include 'pasok_buku.php';
            break;

        case 'filter_buku';
            include 'filter_buku.php';
            break;

        case 'profil';
            include 'profil.php';
            break;

        case 'ubah_pass';
            include 'ubah_pass.php';
            break;

        case 'tambah_akun';
            include 'tambah_akun.php';
            break;

            break;
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>