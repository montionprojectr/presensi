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
			        			<td><a href="" class="btn btn-tool">Edit</a> || <a href="" class="btn text-danger">Hapus</a></td>
			        		</tr>
			        	<?php }
			        	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>