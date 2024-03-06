<?php 
if (isset($_GET['id_jurusan'])) {
	$id_jurusan = $_GET['id_jurusan'];

	$sql = mysqli_query($koneksi, "select * from tb_jurusan where id_jurusan = '".$id_jurusan."'");
	$res = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-3">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Jurusan</h3>
			</div>
			<div class="card-body col-sm-6">
				<form action="" method="post">
					<div class="form-group">
						<label for="name_jurusan">Nama Jurusan</label>
						<input type="text" name="name_jurusan" class="form-control form-control-sm" value="<?= $res['name_jurusan']; ?>">
						<input type="text" name="id_jurusan" class="form-control form-control-sm" value="<?= $res['id_jurusan']; ?>" hidden>
					</div>
					<div class="form-group">
						<label for="singkat_jurusan">Singkat Jurusan</label>
						<input type="text" name="singkat_jurusan" class="form-control form-control-sm" value="<?= $res['singkat_jurusan']; ?>">
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
		$id_jurusan = $_POST['id_jurusan'];
		$name_jurusan = $_POST['name_jurusan'];
		$singkat_jurusan = $_POST['singkat_jurusan'];

		$up = mysqli_query($koneksi, "update tb_jurusan set name_jurusan = '".$name_jurusan."', singkat_jurusan = '".$singkat_jurusan."' where id_jurusan = '".$id_jurusan."'");

		if ($up){
			echo "<script>
			alert('Data Perubahan Berhasil disimpan');
			document.location.href = '?page=data-jurusan';
			</script>";
		}else{
			echo "<script>
			alert('Data Perubahan Gagal disimpan');
			document.location.href = '?page=data-jurusan';
			</script>";
		}
	}

}
?>