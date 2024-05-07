<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">Detail Kelas | Data Siswa</h3>
			</div>
			<div class="card-header light-blue">
				<h3 class="card-title"><a href="export-data-siswa.php?idrombel=<?= $_GET['idrm']; ?>" target="_blank" class="btn btn-success"><i class="bi bi-file-excel-fill"></i> Export to Excel</a></h3>
			</div>
			<div class="card-body">
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
				            <th scope="col">ID Siswa</th>
				            <th scope="col">NIS</th>
				            <th scope="col">NISN</th>
				            <th scope="col">NAMA</th>
				            <th scope="col">IDROMBEL</th>
				            <th scope="col">KELAS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
			        	$query = mysqli_query($koneksi, "select id_siswa, nis, nisn, name_siswa, w.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_siswa w inner join tb_kel_jur_rombel x on x.id_rombel = w.id_rombel inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where w.id_rombel = '".$_GET['idrm']."'");
			        	$no=1;
			        	while ($data = mysqli_fetch_array($query)) { ?>
			        		<tr>
			        			<td><?= $no++; ?></td>
			        			<td><?= $data['id_siswa']; ?></td>
			        			<td><?= $data['nis']; ?></td>
			        			<td><?= $data['nisn']; ?></td>
			        			<td><?= $data['name_siswa']; ?></td>
			        			<td><?= $data['id_rombel']; ?></td>
			        			<td><?= $data['kelas']; ?></td>
			        		</tr>
			        	<?php }
			        	?>
					</tbody>
				</table>
			</div>		
		</div>
	</div>
</div>