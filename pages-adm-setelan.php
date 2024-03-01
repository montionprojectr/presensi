<div class="row mt-3">
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> SETELAN Th. Pelajaran</h3>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="format">Format Tampilan Tahun Pelajaran</label>
					<select class="form-control form-control-sm select2" name="format" id="format">
					<?php 
					$sql = mysqli_query($koneksi, "select * from tb_th_pelajaran");
					while ($dt = mysqli_fetch_array($sql)) { 
						if($dt['th_pelajaran'] == $d['format_th']) {
							$select = 'selected';
						}else{
							$select = '';
						}
						?>
						<option value="<?= $dt['th_pelajaran']; ?>" <?= $select; ?>><?= $dt['th_pelajaran']; ?></option>
					<?php }
					?>
					</select>
				</div>
				<div class="form-group">
					<textarea class="form-control form-control-sm" readonly>FORMAT tahun ini akan mengubah seluruh tampilan halaman berada pada tahun pelajaran yang dipilih (<?= $d['format_th']; ?>).</textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success">
				</div>
				</form>			
			</div>
		</div>
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> Create New Account for User Admin</h3>
			</div>
			<div class="card-body">
			<div class="row">
				<div class="col-sm-4">
					<form action="" method="post">
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" name="user" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" name="pwd" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" name="nipy" placeholder="nipy" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" name="nama_depan" placeholder="nama_depan" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-sm" name="nama_lengkap" placeholder="nama_lengkap" required>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success" name="admin" value="SIMPAN">
						</div>
					</form>	
				</div>
				<div class="col-sm-8">
					<table class="table table-sm text-sm">
						<thead>
							<th>Username</th>
							<th>Pwd</th>
							<th>Nipy</th>
							<th>Nama_dpn</th>
							<th>Name_lkp</th>
						</thead>
						<tbody>
						<?php 
						$sql = mysqli_query($koneksi, "select * from tb_user x inner join tb_rolsuser y on y.id_user = x.id_user where id_level != '2'");
						while ($res = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $res['username']; ?></td>
								<td><input type="password" class="form-control-sm" value="<?= $res['password']; ?>" readonly></td>
								<td><?= $res['nipy']; ?></td>
								<td><?= $res['nama_depan']; ?></td>
								<td><?= $res['nama_lengkap']; ?></td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		
	</div>
</div>

<?php 
if (isset($_POST['submit'])) {
	$format = $_POST['format'];

	$query = mysqli_query($koneksi, "update tb_format_th set format_th = '".$format."' where id = '1'");

	if ($query) {
		echo "<script>
		alert('Tahun berhasil disimpan');
		document.location.href = '?page=adm-setelan';
		</script>";
	}
}else if (isset($_POST['admin'])) {
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	$nipy = $_POST['nipy'];
	$nama_dpn = $_POST['nama_depan'];
	$nama_lkp = $_POST['nama_lengkap'];

	$sql = mysqli_query($koneksi, "insert into tb_user(id_user, username, password, nipy, nama_depan, nama_lengkap) values('','".$user."','".$pwd."','".$nipy."','".$nama_dpn."','".$nama_lkp."')");

	if ($sql) {
		$cekuser = mysqli_query($koneksi, "select * from tb_user where username = '".$user."' and password = '".$pwd."'");
		$dcek = mysqli_fetch_array($cekuser);
		$sqlrol = mysqli_query($koneksi, "insert into tb_rolsuser(id_rols, id_user, id_level) values('','".$dcek['id_user']."','1')");	

		if ($sqlrol) {
			echo "<script>
			alert('Data berhasil disimpan');
			document.location.href = '?page=adm-setelan';
			</script>";
		}

	}else{
		echo "<script>
		alert('Data gagal disimpan');
		document.location.href = '?page=adm-setelan';
		</script>";
	}
}
?>