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