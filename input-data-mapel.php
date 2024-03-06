<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card collapsed-card">
			<div class="card-header light-blue">
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Data Mapel</h3>
                  </button>
                </div>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="row">
				<div class="form-group col-sm-3">
					<label for="name_mapel">Nama Mapel</label>
					<input type="text" name="name_mapel" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="kode_mapel">Kode Mapel</label>
					<input type="text" name="kode_mapel" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="simpan-data"></label>
					<input type="submit" name="simpan-data" class="btn btn-success form-control" value="Tambah Data Mapel">
				</div>		
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['simpan-data'])) {
	$name_mapel = $_POST['name_mapel'];
	$kode_mapel = $_POST['kode_mapel'];

	$sql = mysqli_query($koneksi, "insert into tb_mapel(id_mapel, name_mapel, kode_mapel) values('','".$name_mapel."','".$kode_mapel."')");
	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '?page=data-mapel';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '?page=input-data-mapel';
		</script>";
	}
}
?>