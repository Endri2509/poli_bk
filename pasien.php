
<?php
session_start();

// Cek apakah user belum login
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect ke halaman login jika belum login
    exit();
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Poliklinik</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

     <!-- Left navbar links -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/ic2.png" alt="icon" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">POLIKLINIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php if (isset($_SESSION['username'])) : ?>
        <div class="info">
            <a class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
    <?php endif; ?>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pasien.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pasien</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="dokter.php?page=dokter" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dokter</p>
                </a>
            </li>
              <li class="nav-item">
                <a href="poli.php?page=poli" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Poli</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="obat.php?page=obat" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Obat</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">pasien</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">pasien</h5>
              </div>
              <div class="card-body">
  <!-- Kode php untuk menghubungkan form dengan database -->
 <form class="form row" method="POST" action="" name="myForm" onsubmit="return(validate());">
    <!-- Kode php untuk menghubungkan form dengan database -->
    <?php
    include('koneksi.php');
    $nama = '';
    $alamat = '';
    $no_ktp = '';
    $no_hp = '';
    $no_rm = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, 
        "SELECT * FROM pasien 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $nama = $row['nama'];
            $alamat = $row['alamat'];
            $no_ktp = $row['no_ktp'];
            $no_hp = $row['no_hp'];
            $no_hp = $row['no_rm'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <?php
    }
    ?>
    <div>
        <label class="form-label fw-bold">
            Nama
        </label>
        <input type="text" class="form-control my-2" name="nama" value="<?php echo $nama ?>" style="width: 800px;">
        <label class="form-label fw-bold">
            Alamat
        </label>
        <input type="text" class="form-control my-2" name="alamat" value="<?php echo $alamat ?>">
        <label class="form-label fw-bold">
            No KTP
        </label>
        <input type="text" class="form-control my-2" name="no_ktp" value="<?php echo $no_ktp ?>">
        <label class="form-label fw-bold">
            No HP
        </label>
        <input type="text" class="form-control my-2" name="no_hp" value="<?php echo $no_hp ?>">
        <label class="form-label fw-bold">
            No RM
        </label>
        <input type="text" class="form-control my-2" name="no_rm" value="<?php echo $no_rm ?>">
        <button type="submit" class="btn btn-primary rounded-pill px-3" name="simpan">Simpan</button>
    </div>
</form>

<!-- Table-->
<div class="table-responsive">
    <table class="table table-hover">
        <!--thead atau baris judul-->
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor KTP</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">No Rekam Medis(RM)</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <!--tbody berisi isi tabel sesuai dengan judul atau head-->
        <tbody>
            <!-- Kode PHP untuk menampilkan semua isi dari tabel urut
            berdasarkan status dan tanggal awal-->
            <?php
            $result = mysqli_query(
                $mysqli,"SELECT * FROM pasien ORDER BY nama DESC"
            );
            $no = 1;
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_ktp'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['no_rm'] ?></td>
                    <td>
                        <a class="btn btn-success rounded-pill px-3" 
                        href="pasien.php?page=pasien&id=<?php echo $data['id'] ?>">Ubah
                        </a>
                        <a class="btn btn-danger rounded-pill px-3" 
                        href="pasien.php?page=pasien&id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include('koneksi.php');
if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE pasien SET 
                                        nama = '" . $_POST['nama'] . "',
                                        alamat = '" . $_POST['alamat'] . "',
                                        no_ktp = '" . $_POST['no_ktp'] . "',
                                        no_hp = '" . $_POST['no_hp'] . "',
                                        no_rm = '" . $_POST['no_rm'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO pasien(nama, alamat, no_ktp, no_hp, no_rm) 
                                        VALUES ( 
                                            '" . $_POST['nama'] . "',
                                            '" . $_POST['alamat'] . "',
                                            '" . $_POST['no_ktp'] . "',
                                            '" . $_POST['no_hp'] . "',
                                            '" . $_POST['no_rm'] . "'
                                            )");
    }

    echo "<script> 
            document.location='pasien.php';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM pasien WHERE id = '" . $_GET['id'] . "'");
    }

    echo "<script> 
            document.location='pasien.php';
            </script>";
}
?>

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Kelola Admin</h5>
      <p>Buat akun Admin disini</p>
    </div>

    <div>
    <li class="sidebar-item">
          <a href="register.php">
            <i><b>Tambah Admin</b></i> 
          </a>
      </li>
    </div>
    <div>
    <li class="sidebar-item">
          <a href="logout.php">
            <i><b>Logout</b></i> 
          </a>
      </li>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
