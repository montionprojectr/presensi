<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database"></i> Data Kelas</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">No</th>
				            <th scope="col">Kelas</th>
				            <th scope="col">Jurusan</th>
				            <th scope="col">Rombel</th>
				            <th scope="col">Status Kelas</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				        	$query = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan");
				        	$no=1;
				        	while ($data = mysqli_fetch_array($query)) { ?>
				        		<tr>
				        			<td><?= $no++; ?></td>
				        			<td><?= $data['name_kelas']; ?></td>
				        			<td><?= $data['name_jurusan']; ?></td>
				        			<td><?= $data['rombel']; ?></td>
				        			<td><a href="?page=r-kelas&idrm=<?= $data['id_rombel']; ?>" class="text-primary btn btn-light"><?= $data['kelas']; ?></a></td>
				        		</tr>
				        	<?php }
				        	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>