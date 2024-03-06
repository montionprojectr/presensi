<?php 
if (isset($_GET['id_user'])) {
	$id_user = $_GET['id_user'];

	$sql = mysqli_query($koneksi, "select * from tb_user where id_user = '".$id_user."'");
	$res = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-3">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Guru</h3>
			</div>
			<div class="card-body col-sm-6">
				<form action="" method="post">
					<div class="form-group">
						<label for="Username">Username</label>
						<input type="text" name="username" class="form-control form-control-sm" value="<?= $res['username']; ?>">
						<input type="text" name="id_user" class="form-control form-control-sm" value="<?= $res['id_user']; ?>" hidden>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control form-control-sm" value="<?= $res['password']; ?>">
					</div>
					<div class="form-group">
						<label for="nipy">NIPY</label>
						<input type="text" name="nipy" class="form-control form-control-sm" value="<?= $res['nipy']; ?>">
					</div>
					<div class="form-group">
						<label for="nama_depan">Nama Depan</label>
						<input type="text" name="nama_depan" class="form-control form-control-sm" value="<?= $res['nama_depan']; ?>">
					</div>
					<div class="form-group">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" class="form-control form-control-sm" value="<?= $res['nama_lengkap']; ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit" name="simpan-perubahan">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_POST['simpan-perubahan'])) {
		$id_user = $_POST['id_user'];
		$user = $_POST['username'];
		$pwd = $_POST['password'];
		$nipy = $_POST['nipy'];
		$nama_depan = $_POST['nama_depan'];
		$nama_lengkap = $_POST['nama_lengkap'];

		$up = mysqli_query($koneksi, "update tb_user set username = '".$user."', password = '".$pwd."', nipy = '".$nipy."', nama_depan = '".$nama_depan."', nama_lengkap = '".$nama_lengkap."' where id_user = '".$id_user."'");

		if ($up){
			echo "<script>
			alert('Data Perubahan Berhasil disimpan');
			document.location.href = '?page=data-guru';
			</script>";
		}else{
			echo "<script>
			alert('Data Perubahan Gagal disimpan');
			document.location.href = '?page=data-guru';
			</script>";
		}
	}

}
?>