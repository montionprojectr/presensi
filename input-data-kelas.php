<div class="row mt-3">
	<div class="col-sm-12">
		<form action="" method="post">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ANDA BERADA PADA TAMPILAN Th. PELAJARAN : <?= $d['format_th']; ?></h3>
			</div>
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> INPUTData Kelas</h3>
			</div>
			<div class="card-body">
				<div class="form-group col-sm-3">
					<input type="text" name="id_th_pelajaran" value="<?= $th['id_th_pelajaran']; ?>" hidden>
					<label for="id_kelas">Kelas</label>
					<select class="form-control form-control-sm select2" name="id_kelas" required>
						<option value="">--Pilih--</option>
					<?php 
					$sql = mysqli_query($koneksi, "select * from tb_kelas");
					while ($kls = mysqli_fetch_array($sql)) { ?>
						<option value="<?= $kls['id_kelas']; ?>"><?= $kls['name_kelas'] ?></option>
					<?php }
					?>
					</select>
				</div>
				<div class="form-group col-sm-4">
					<label for="id_jurusan">Jurusan</label>
					<select class="form-control form-control-sm select2" name="id_jurusan" required>
						<option value="">--Pilih--</option>
					<?php 
					$sqljur = mysqli_query($koneksi, "select * from tb_jurusan");
					while ($jur = mysqli_fetch_array($sqljur)) { ?>
						<option value="<?= $jur['id_jurusan']; ?>"><?= $jur['singkat_jurusan']." | ".$jur['name_jurusan']; ?></option>
					<?php }
					?>
					</select>
				</div>
				<div class="form-group col-sm-3">
					<label for="rombel">Rombel</label>
					<select class="form-control form-control-sm select2" name="rombel" required>
						<option value="">--Pilih--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="simpan-data" class="btn btn-success" value="Tambah Data Kelas">
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?php 
if (isset($_POST['simpan-data'])) {
	$id_kelas = $_POST['id_kelas'];
	$id_jurusan = $_POST['id_jurusan'];
	$rombel = $_POST['rombel'];
	$id_th_pelajaran = $_POST['id_th_pelajaran'];

	$sql_cek = mysqli_query($koneksi, "select * from tb_kel_jur_rombel where id_th_pelajaran = '".$id_th_pelajaran."' and id_kelas = '".$id_kelas."' and id_jurusan = '".$id_jurusan."' and rombel = '".$rombel."'");
	
	if (mysqli_num_rows($sql_cek) > 0) {
		echo "<script>
		alert('Data Kelas Sudah ada di DATABASE.');
		document.location.href = '?page=input-data-kelas';
		</script>";
	}else{

		$insert = mysqli_query($koneksi, "insert into tb_kel_jur_rombel (id_rombel, id_kelas, id_jurusan, id_th_pelajaran, rombel) values('','".$id_kelas."','".$id_jurusan."','".$th['id_th_pelajaran']."','".$rombel."')");

		if ($insert) {

		echo "<script>
		alert('Data Kelas Berhasil di SIMPAN.');
		document.location.href = '?page=data-kelas';
		</script>";

		}else{
			echo "<script>
			alert('Data Kelas GAGAL disimpan.');
			document.location.href = '?page=input-data-kelas';
			</script>";
		}

	}

}
?>