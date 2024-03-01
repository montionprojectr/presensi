<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card collapsed-card">
			<div class="card-header light-blue">
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Data Jurusan</h3>
                  </button>
                </div>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="row">
				<div class="form-group col-sm-3">
					<label for="name_jurusan">Nama Jurusan</label>
					<input type="text" name="name_jurusan" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="singkat_jurusan">Singkat Jurusan</label>
					<input type="text" name="singkat_jurusan" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="simpan-data"></label>
					<input type="submit" name="simpan-data" class="btn btn-success form-control" value="Tambah Data Jurusan">
				</div>		
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['simpan-data'])) {
	$name_jurusan = $_POST['name_jurusan'];
	$singkat_jurusan = $_POST['singkat_jurusan'];

	$sql = mysqli_query($koneksi, "insert into tb_jurusan(id_jurusan, name_jurusan, singkat_jurusan) values('','".$name_jurusan."','".$singkat_jurusan."')");
	if ($sql) {
		echo "<script>
		alert('Data berhasil disimpan');
		document.location.href = '?page=data-jurusan';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal disimpan');
		document.location.href = '?page=data-jurusan';
		</script>";
	}
}
?>