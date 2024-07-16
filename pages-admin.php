<?php 
session_start();
require_once('pages-config.php');
// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


if (isset($_SESSION['login']) != "login") {
  header("Location: pages-login.php");
  exit();
}

$query = mysqli_query($koneksi, "select * from tb_user where id_user = '".$_SESSION['id_user']."'");
$user = mysqli_fetch_array($query);
date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia

$tgl_skrang = date('d-m-Y'); //kombinasi jam dan tanggal
$hari = array ( 1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );

// Misal hari ini adalah sabtu
//date('N'); //Hasil 6
$hr = $hari[ date('N') ]; // Sama seperti echo $hari[6], hasil: Sabtu

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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
  <style type="text/css">
    .lemonchiff{
      background-color: #FFFACD;
    }
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light lemonchiff">
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
          <a href="#" class="dropdown-item">
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
    <a href="?page=page-adm-home" class="brand-link">
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
          <a href="?page=adm-my-profile" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="?page=page-adm-home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="?page=adm-setelan" class="nav-link">
              <i class="nav-icon bi bi-gear-fill"></i>
              <p>
                Setelan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                INPUTData
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=input-data-kelas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Kelas</p>
                </a>  
              </li>
              <li class="nav-item">
                <a href="?page=input-data-jurusan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Jurusan</p>
                </a>  
              </li> 
              <li class="nav-item">
                <a href="?page=input-data-mapel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Mapel</p>
                </a>  
              </li> 
              <li class="nav-item">
                <a href="?page=input-data-guru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Guru</p>
                </a>  
              </li>
              <li class="nav-item">
                <a href="?page=input-data-siswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Siswa</p>
                </a>  
              </li>               
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                MASTERData
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=data-kelas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-jurusan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-mapel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mapel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-guru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-siswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                REPORT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=jurnal-kelas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Kelas</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="?page=jurnal-guru" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Guru</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="?page=jurnal-siswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal siswa</p>
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
    <div class="content-header bg-warning">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Dashboard Administrator</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=page-adm-home">Home</a></li>
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
            case 'page-adm-home':
              require_once('pages-adm-home.php');
              break;
            case 'data-kelas':
              require_once('data-kelas.php');
              break;
            case 'r-kelas':
              require_once('data-kelas-r.php');
              break;
            case 'data-jurusan':
              require_once('data-jurusan.php');
              break;
            case 'data-mapel':
              require_once('data-mapel.php');
              break;
            case 'data-guru':
              require_once('data-guru.php');
              break;
            case 'data-siswa':
              require_once('data-siswa.php');
              break;
            case 'jurnal-kelas':
              require_once('pages-adm-jurnal-kelas.php');
              break;
            case 'jurnal-siswa':
              require_once('pages-adm-jurnal-siswa.php');
              break;
            case 'report-jurnal-siswa':
              require_once('pages-adm-report-jurnal-siswa.php');
              break;
            case 'adm_jurnal_kelas_detail':
              require_once('pages-adm-jurnal-kelas-detail.php');
              break;
            case 'adm-setelan':
              require_once('pages-adm-setelan.php');
              break;
            case 'input-data-kelas':
              require_once('input-data-kelas.php');
              break;
            case 'input-data-jurusan':
              require_once('input-data-jurusan.php');
              break;
            case 'input-data-mapel':
              require_once('input-data-mapel.php');
              break;
            case 'input-data-guru':
              require_once('input-data-guru.php');
              break;
            case 'input-data-siswa':
              require_once('input-data-siswa.php');
              break;
            case 'edit-guru':
              require_once('edit-guru.php');
              break;
            case 'edit-jurusan':
              require_once('edit-jurusan.php');
              break;
            case 'edit-mapel':
              require_once('edit-mapel.php');
              break;
            case 'edit-siswa':
              require_once('edit-siswa.php');
              break;
            case 'adm-edit-jurnal-kelas':
              require_once('pages-adm-jurnal-kelas-detail-edit.php');
              break;
            
            default:
              require_once('pages-adm-default.php');
              break;
          }
        }else{
          require_once('pages-adm-home.php');
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

    $("#id_kelas").change(function(){
    var id_kelas = $("#id_kelas").val();
      $.ajax({
        type: 'POST',
          url: "pages-adm-jurnal-dkelasa.php",
          data: {id_kelas: id_kelas},
          cache: false,
          success: function(msg){
            $("#id_rombel").html(msg);
          }
      });
    });

    $("#id_rombel, #date_day, #id_th_pelajaran").change(function(){
    var id_rombel = $("#id_rombel").val();
    var date_day = $("#date_day").val();
    var id_th_pelajaran = $("#id_th_pelajaran").val();
      $.ajax({
        type: 'POST',
          url: "pages-adm-jurnal-dkelasb.php",
          data: {id_rombel: id_rombel, date_day: date_day, id_th_pelajaran: id_th_pelajaran },
          cache: false,
          success: function(msg){
            $("#data-jurnal").html(msg);
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
  });
</script>
  <script>
      $(document).ready(function() {
          // Sembunyikan alert validasi kosong
          $("#kosong").hide();
      });
    </script>

<script>
    $("button").click(function(){
      $("#mtable").table2excel();
    });
</script>
</body>
</html>
