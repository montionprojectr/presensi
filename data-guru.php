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
							<th scope="col">ID User</th>
				            <th scope="col">NIPY</th>
				            <th scope="col">Nama Depan</th>
				            <th scope="col">Nama Belakang</th>
				            <th scope="col">Option</th>
						</tr>
					</thead>
					<tbody>
						<?php 
			        	$query = mysqli_query($koneksi, "select * from tb_user");
			        	$no=1;
			        	while ($data = mysqli_fetch_array($query)) { ?>
			        		<tr>
			        			<td><?= $data['id_user']; ?></td>
			        			<td><?= $data['nipy']; ?></td>
			        			<td><?= $data['nama_depan']; ?></td>
			        			<td><?= $data['nama_lengkap']; ?></td>
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