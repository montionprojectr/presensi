<?php 
if (isset($_GET['id_siswa'])) {
	$id_siswa = $_GET['id_siswa'];

	$sql = mysqli_query($koneksi, "select * from tb_siswa where id_siswa = '".$id_siswa."'");
	$res = mysqli_fetch_array($sql);

	$sqlf = mysqli_query($koneksi, "select * from tb_format_th");
	$f = mysqli_fetch_array($sqlf);

	$sqlth = mysqli_query($koneksi, "select * from tb_th_pelajaran where th_pelajaran = '".$f['format_th']."'");
	$th = mysqli_fetch_array($sqlth);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-3">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Siswa</h3>
			</div>
			<div class="card-body col-sm-6">
				<form action="" method="post">
					<div class="form-group">
						<label for="nis">Nis</label>
						<input type="text" name="nis" class="form-control form-control-sm" value="<?= $res['nis']; ?>">
						<input type="text" name="id_siswa" class="form-control form-control-sm" value="<?= $res['id_siswa']; ?>" hidden>
					</div>
					<div class="form-group">
						<label for="nisn">Nisn</label>
						<input type="text" name="nisn" class="form-control form-control-sm" value="<?= $res['nisn']; ?>">
					</div>
					<div class="form-group">
						<label for="name_siswa">Nama Siswa</label>
						<input type="text" name="name_siswa" class="form-control form-control-sm" value="<?= $res['name_siswa']; ?>">
					</div>
					<div class="form-group">
						<label for="nama_depan">ROMBEL /ID ROMBEL</label>
						<select class="form-control form-control-sm select2" name="id_rombel">
							<?php 
							$rom = mysqli_query($koneksi, "select id_th_pelajaran, x.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_th_pelajaran = '".$th['id_th_pelajaran']."'");
							while ($dt = mysqli_fetch_array($rom)) {
								if ($dt['id_rombel'] == $res['id_rombel']) {
									$select = 'selected';
								}else{
									$select = '';
								}
								echo "<option value='".$dt['id_rombel']."' ".$select.">".$dt['kelas']."</option>";
							}
							?>
						</select>
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
		$id_siswa = $_POST['id_siswa'];
		$nis = $_POST['nis'];
		$nisn = $_POST['nisn'];
		$name_siswa = $_POST['name_siswa'];
		$id_rombel = $_POST['id_rombel'];

		$up = mysqli_query($koneksi, "update tb_siswa set nis = '".$nis."', nisn = '".$nisn."', name_siswa = '".$name_siswa."', id_rombel = '".$id_rombel."' where id_siswa = '".$id_siswa."'");

		if ($up){
			echo "<script>
			alert('Data Perubahan Berhasil disimpan');
			document.location.href = '?page=data-siswa';
			</script>";
		}else{
			echo "<script>
			alert('Data Perubahan Gagal disimpan');
			document.location.href = '?page=data-siswa';
			</script>";
		}
	}

}
?>