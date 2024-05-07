<?php 
session_start();
require_once('pages-config.php');

if (isset($_SESSION['login']) != "login") {
  header("Location: pages-login.php");
  exit();
}

$query = mysqli_query($koneksi, "select * from tb_user where id_user = '".$_SESSION['id_user']."'");
$user = mysqli_fetch_array($query);
$format = mysqli_query($koneksi, "select * from tb_format_th where id = '1'");
$d = mysqli_fetch_array($format);
$sql_th = mysqli_query($koneksi, "select * from tb_th_pelajaran where th_pelajaran = '".$d['format_th']."'");
  $th = mysqli_fetch_array($sql_th);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PRESENSI KELAS | SMK SAPRA1</title>
  <link rel="icon" href="dist/img/logo_sapra1.png" type="image/x-icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .cb{
      background-color: #6495ED;
    }
    .gainsboro{
      background-color: #DCDCDC;
    }
    .azure{
      background-color: #F0FFFF;
    }
    .light-blue{
      background-color: #ADD8E6;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="bi bi-person-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">User</span>
          <div class="dropdown-divider"></div> -->
          <a href="?page=guru-my-profile" class="dropdown-item">
            <i class="bi bi-person-circle mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="pages-logout.php" class="dropdown-item">
            <i class="bi bi-box-arrow-in-right mr-2"></i> Sign-out
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?page=default" class="brand-link">
      <img src="dist/img/logo_sapra1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Abasensi SMK Sapra 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/kosong.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="?page=guru-my-profile" class="d-block"><?= $user['nama_lengkap']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="?page=default" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=jurnal_guru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Guru</p>
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
    <div class="content-header azure">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Dashboard</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php 
        if (isset($_GET['page'])) {
          $pages = $_GET['page'];
          switch ($pages) {
            case 'default':
               require_once('pages-guru-home.php');
               break;
            case 'jurnal_guru':
              require_once('pages-guru-jurnal.php');
              break;
            case 'jurnal_guru_detail':
              require_once('pages-guru-jurnal-detail.php');
              break;
            case 'edit-jurnal':
              require_once('pages-guru-jurnal-edit.php');
              break;
            case 'guru-my-profile':
              require_once('pages-guru-my-profile.php');
              break;
            // case 'proses-absensi':
            //   require_once('proses-absensi.php');
            //   break;
             
             default:
               require_once('pages-guru-default.php');
               break;
           }
        }else{
          require_once('pages-guru-home.php');
        }
        ?>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="https://github.com/montionprojectr" target="_blank">Montionprojectr</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

  });
</script>

<script src="plugins/jquery/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  // $.ajax({
  //     type: 'POST',
  //     url: "data-kelas-r.php",
  //     cache: false, 
  //     success: function(msg){
  //       $("#contoh").html(msg);
  //     }
  // });

  $("#select-kelas").change(function(){
  var id_rombel = $("#select-kelas").val();
    $.ajax({
      type: 'POST',
        url: "pages-guru-dsiswa.php",
        data: {id_rombel: id_rombel},
        cache: false,
        success: function(msg){
          $("#data-siswa").html(msg);
        }
    });
  });

});
</script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
