<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Mata Pelajaran</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>ID Mapel</th>
							<th>Kode Mapel</th>
							<th>Nama Mapel</th>
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
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>