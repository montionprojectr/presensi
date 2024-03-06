<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database"></i> Data Jurusan</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table tabl-sm table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
				            <th scope="col">ID Jurusan</th>
				            <th scope="col">Name Jurusan</th>
				            <th scope="col">Singkat Jurusan</th>
				            <th scope="col">Option</th>
						</tr>
					</thead>
					<tbody>
						<?php 
			        	$query = mysqli_query($koneksi, "select * from tb_jurusan");
			        	$no=1;
			        	while ($data = mysqli_fetch_array($query)) { ?>
			        		<tr>
			        			<td><?= $no++; ?></td>
			        			<td><?= $data['id_jurusan']; ?></td>
			        			<td><?= $data['name_jurusan']; ?></td>
			        			<td><?= $data['singkat_jurusan']; ?></td>
			        			<td><a href="?page=edit-jurusan&id_jurusan=<?= $data['id_jurusan'] ?>" class="btn btn-tool">Edit</a> || <a href="?page=data-jurusan&hapus=<?= $data['id_jurusan']; ?>" class="btn text-danger" onclick="return confirm('Anda yakin mau menghapus jurusan <?= $data['name_jurusan']; ?> ini ?')">Hapus</a></td>
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
	$id_jurusan = $_GET['hapus'];

	$sql = mysqli_query($koneksi, "delete from tb_jurusan where id_jurusan = '".$id_jurusan."'");

	if ($sql) {
		echo "<script>
		alert('Data berhasil dihapus');
		document.location.href = '?page=data-jurusan';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal dihapus');
		document.location.href = '?page=data-jurusan';
		</script>";
	}
}
?>