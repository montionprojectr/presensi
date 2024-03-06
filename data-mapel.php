<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database"></i> Data Mata Pelajaran</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>ID Mapel</th>
							<th>Kode Mapel</th>
							<th>Nama Mapel</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "select * from tb_mapel");
					while ($dt = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $dt['id_mapel']; ?></td>
							<td><?= $dt['kode_mapel']; ?></td>
							<td><?= $dt['name_mapel']; ?></td>
							<td><a href="?page=edit-mapel&id_mapel=<?= $dt['id_mapel']; ?>" class="btn btn-tool">Edit</a> || <a href="?page=data-mapel&hapus=<?= $dt['id_mapel']; ?>" class="btn text-danger" onclick="return confirm('Anda yakin mau menghapus mapel <?= $dt['name_mapel']; ?> ini ?')">Hapus</a></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
if(isset($_GET['hapus'])){
	$id_mapel = $_GET['hapus'];

	$sql = mysqli_query($koneksi, "delete from tb_mapel where id_mapel = '".$id_mapel."'");

	if ($sql) {
		echo "<script>
		alert('Data berhasil dihapus');
		document.location.href = '?page=data-mapel';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal dihapus');
		document.location.href = '?page=data-mapel';
		</script>";
	}
}
?>