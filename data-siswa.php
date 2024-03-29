<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database"></i> Data Siswa</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>ID Siswa</th>
							<th>Nis</th>
							<th>NISN</th>
							<th>Nama Lengkap</th>
							<th>Kelas | Rombel</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = mysqli_query($koneksi, "select x.id_siswa, nis, nisn, name_siswa, y.id_rombel, name_kelas, singkat_jurusan, rombel from tb_siswa x inner join tb_kel_jur_rombel y on y.id_rombel = x.id_rombel inner join tb_kelas z on z.id_kelas = y.id_kelas inner join tb_jurusan a on a.id_jurusan = y.id_jurusan inner join tb_th_pelajaran b on b.id_th_pelajaran = y.id_th_pelajaran where th_pelajaran = '".$d['format_th']."'");
					while ($dt = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?= $dt['id_siswa'] ?></td>
							<td><?= $dt['nis'] ?></td>
							<td><?= $dt['nisn'] ?></td>
							<td><?= $dt['name_siswa'] ?></td>
							<td><?= $dt['name_kelas']." ".$dt['singkat_jurusan']." ".$dt['rombel']; ?></td>
							<td><a href="?page=edit-siswa&id_siswa=<?= $dt['id_siswa']; ?>" class="btn btn-tool">Edit</a> || <a href="?page=data-siswa&hapus=<?= $dt['id_siswa']; ?>" class="btn text-danger" onclick="return confirm('Anda yakin mau menghapus siswa atas nama : <?= $dt['name_siswa']; ?> ini ?')">Hapus</a></td>
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
	$id_siswa = $_GET['hapus'];

	$sql = mysqli_query($koneksi, "delete from tb_siswa where id_siswa = '".$id_siswa."'");

	if ($sql) {
		echo "<script>
		alert('Data berhasil dihapus');
		document.location.href = '?page=data-siswa';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal dihapus');
		document.location.href = '?page=data-siswa';
		</script>";
	}
}
?>