<?php 
if (isset($_GET['id_mapel'])) {
	$id_mapel = $_GET['id_mapel'];

	$sql = mysqli_query($koneksi, "select * from tb_mapel where id_mapel = '".$id_mapel."'");
	$res = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-3">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Mapel</h3>
			</div>
			<div class="card-body col-sm-6">
				<form action="" method="post">
					<div class="form-group">
						<label for="name_mapel">Nama Mapel</label>
						<input type="text" name="name_mapel" class="form-control form-control-sm" value="<?= $res['name_mapel']; ?>">
						<input type="text" name="id_mapel" class="form-control form-control-sm" value="<?= $res['id_mapel']; ?>" hidden>
					</div>
					<div class="form-group">
						<label for="kode_mapel">Kode Mapel</label>
						<input type="text" name="kode_mapel" class="form-control form-control-sm" value="<?= $res['kode_mapel']; ?>">
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
		$id_mapel = $_POST['id_mapel'];
		$name_mapel = $_POST['name_mapel'];
		$kode_mapel = $_POST['kode_mapel'];

		$up = mysqli_query($koneksi, "update tb_mapel set name_mapel = '".$name_mapel."', kode_mapel = '".$kode_mapel."' where id_mapel = '".$id_mapel."'");

		if ($up){
			echo "<script>
			alert('Data Perubahan Berhasil disimpan');
			document.location.href = '?page=data-mapel';
			</script>";
		}else{
			echo "<script>
			alert('Data Perubahan Gagal disimpan');
			document.location.href = '?page=data-mapel';
			</script>";
		}
	}

}
?>