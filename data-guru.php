<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database"></i> Data Guru</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">No Urut</th>
							<th scope="col">ID User</th>
				            <th scope="col">NIPY</th>
				            <th scope="col">Nama Depan</th>
				            <th scope="col">Nama Belakang</th>
				            <th scope="col">Option</th>
						</tr>
					</thead>
					<tbody>
						<?php 
			        	$query = mysqli_query($koneksi, "select * from tb_user x inner join tb_rolsuser y on y.id_user = x.id_user where id_level != '1' ");
			        	$no=1;
			        	while ($data = mysqli_fetch_array($query)) { ?>
			        		<tr>
			        			<td><?= $no++; ?></td>
			        			<td><?= $data['id_user']; ?></td>
			        			<td><?= $data['nipy']; ?></td>
			        			<td><?= $data['nama_depan']; ?></td>
			        			<td><?= $data['nama_lengkap']; ?></td>
			        			<td><a href="?page=data-guru&edit=<?= $data['id_user']; ?>" class="btn btn-tool">Edit</a> || <a href="?page=data-guru&hapus=<?= $data['id_user']; ?>" class="btn text-danger" onclick="return confirm('Anda yakin mau menghapus akun <?= $data['nama_lengkap']; ?> ini ?')">Hapus</a></td>
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
if (isset($_GET['edit'])) {
	$id_user = $_GET['edit'];

	echo "<script>
	alert('Data Berhasil diedit');
	document.location.href = '?page=data-guru';
	</script>";
}else if(isset($_GET['hapus'])){
	$id_user = $_GET['hapus'];

	$sql = mysqli_query($koneksi, "delete from tb_user where id_user = '".$id_user."'");

	if ($sql) {
		echo "<script>
		alert('Data berhasil dihapus');
		document.location.href = '?page=data-guru';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal dihapus');
		document.location.href = '?page=data-guru';
		</script>";
	}
}
?>