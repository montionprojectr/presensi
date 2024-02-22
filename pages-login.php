<?php 
session_start();
require_once('pages-config.php');

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ABSENSI | SMK SAPRA1</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Absensi SMK </b>SAPRA 1 PETARUKAN</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
              <?php 
              if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = mysqli_query($koneksi, "select * from tb_user where username = '".$username."' and password = '".$password."'");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                  $data = mysqli_fetch_array($query);
                  $cek = mysqli_query($koneksi, "select * from tb_rolsuser where id_user = '".$data['id_user']."'");
                  $rol = mysqli_fetch_array($cek);
                  $lv = mysqli_query($koneksi, "select * from tb_leveluser where id_level = '".$rol['id_level']."'");
                  $dlv = mysqli_fetch_array($lv);

                  if ($rol['id_level'] == '1') {
                    $_SESSION['name_level'] = $dlv['name_level'];
                    $_SESSION['id_user'] = $data['id_user'];
                    $_SESSION['login'] = 'login';
                      echo "<script>
                    alert('Anda login ke halaman admin.');
                    document.location.href = 'pages-admin.php';
                    </script>";
                  }else if($rol['id_level'] == '2'){
                    $_SESSION['name_level'] = $dlv['name_level'];
                    $_SESSION['id_user'] = $data['id_user'];
                    $_SESSION['login'] = 'login';
                    echo "<script>
                    alert('Anda login ke halaman guru.');
                    document.location.href = 'index.php';
                    </script>";
                  }
                  
                }else{
                  echo "<script>
                    alert('Maaf data akun tidak ada di database.');
                    document.location.href = 'index.php';
                    </script>";
                }

                // if ($username == 'admin' && $password == 'admin') {
                //   echo "<script>
                //     alert('Salamat Login anda berhasil.');
                //     document.location.href = 'index.php';
                //     </script>";
                //   }
              }
              ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
