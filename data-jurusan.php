<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card collapsed-card">
			<div class="card-header light-blue">
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Data Jurusan</h3>
                  </button>
                </div>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="row">
				<div class="form-group col-sm-3">
					<label for="name_jurusan">Nama Jurusan</label>
					<input type="text" name="name_jurusan" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="singkat_jurusan">Singkat Jurusan</label>
					<input type="text" name="singkat_jurusan" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="simpan-data"></label>
					<input type="submit" name="simpan-data" class="btn btn-success form-control" value="Tambah Data Jurusan">
				</div>		
				</div>
			</form>
			</div>
		</div>
	</div>
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
			        		</tr>
			        	<?php }
			        	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>