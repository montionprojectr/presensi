<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database-fill-up"></i> Report Jurnal Siswa</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-sm">Generation Laporan</a>
					</div>
					<div class="col-sm-12 mt-2">
					<table id="example1" class="table table-sm table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Periode</th>
								<th>Kelas</th>
								<th>Waktu Proses</th>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no=1;
							$sql = mysqli_query($koneksi, "select * from tb_generet_tgl group by id_generet desc");
							while ($dt = mysqli_fetch_array($sql)) { ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $dt['tgl_awal']."/".$dt['tgl_akhir']; ?></td>
									<td><?php 
									$sq = mysqli_query($koneksi, "select * from view_tbkelas where id_rombel = '".$dt['id_rombel']."'");
									$q =mysqli_fetch_object($sq);
									echo $q->name_kelas." ".$q->singkat_jurusan." ".$q->rombel;
								?></td>
									<td><?= $dt['waktu_proses']; ?></td>
									<td><a href="export/export_contoh.php?id_rombel=<?= $dt['id_rombel']; ?>&id_generet=<?= $dt['id_generet']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-file-excel"></i> Excel</a> || <a href="?page=report-jurnal-siswa&id_rombel=<?= $dt['id_rombel']; ?>&id_generet=<?= $dt['id_generet']; ?>" class="btn light-blue">View <i class="fa fa-eye"></i></a> || <a href="?page=jurnal-siswa&delete=<?= $dt['id_generet']; ?>" class="btn btn-danger" onclick="return confirm('Yakin mau di Hapus?')">X</a></td>
								</tr>
							<?php }
							?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-sm">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Generetion Laporan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <form action="" method="post">
    <div class="modal-body">
      	<?php 
      	$sqlf = mysqli_query($koneksi, "select * from tb_format_th");
      	$f = mysqli_fetch_array($sqlf);
      	?>
      	<div class="form-group">
      		<label>Pilih Kelas</label>
      		<select class="form-control select2" name="id_rombel">
      			<option>== Kelas ==</option>
      			<?php 
      			$sqlk = mysqli_query($koneksi, "select id_rombel, y.id_th_pelajaran, th_pelajaran, name_kelas, singkat_jurusan, rombel from tb_kelas x inner join tb_kel_jur_rombel y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = y.id_jurusan inner join tb_th_pelajaran w on w.id_th_pelajaran = y.id_th_pelajaran where th_pelajaran = '".$f['format_th']."'");
      			while ($dt = mysqli_fetch_array($sqlk)) {
      				echo "<option value='".$dt['id_rombel']."'>".$dt['name_kelas']." ".$dt['singkat_jurusan']." ".$dt['rombel']."</option>";
      			}
      			?>
      		</select>
      	</div>
      	<div class="form-group">
      		<label>Tanggal</label>
      		<div class="form-group">
      			<label>Awal</label>
      			<input type="date" name="tgl_awal" class="form-control">		
      		</div>
      		<div class="form-group">
      			<label>Akhir</label>
      			<input type="date" name="tgl_akhir" class="form-control">		
      		</div>
      	</div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary" name="generet">OK</button>
    </div>
      </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 
	if (isset($_POST['generet'])) {
		$id_rombel = $_POST['id_rombel'];
		$tgl_awal = $_POST['tgl_awal'];
		$tgl_akhir = $_POST['tgl_akhir'];
		$waktu_proses = date('y-m-d h:m:s');

		$insert = mysqli_query($koneksi, "insert into tb_generet_tgl(id_generet, tgl_awal, tgl_akhir, waktu_proses, id_rombel) values('','".$tgl_awal."','".$tgl_akhir."','".$waktu_proses."','".$id_rombel."')");
		if ($insert) {
			echo "<script>
			alert('DATA BERHASIL DISIMPAN');
			document.location.href = '?page=jurnal-siswa';
			</script>";
		}else{
			echo "<script>
			alert('DATA GAGAL DISIMPAN');
			document.location.href = '?page=jurnal-siswa';
			</script>";
		}
	}else if (isset($_GET['delete'])) {
		$id_generet = $_GET['delete'];

		$del = mysqli_query($koneksi, "delete from tb_generet_tgl where id_generet = '".$id_generet."'");
		if ($del) {
			echo "<script>
			alert('DATA BERHASIL DIHAPUS');
			document.location.href = '?page=jurnal-siswa';
			</script>";
		}else{
			echo "<script>
			alert('DATA GAGAL DIHAPUS');
			document.location.href = '?page=jurnal-siswa';
			</script>";
		}
	}
?>