<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card collapsed-card">
			<div class="card-header light-blue">
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Data Mapel</h3>
                  </button>
                </div>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="row">
				<div class="form-group col-sm-3">
					<label for="name_mapel">Nama Mapel</label>
					<input type="text" name="name_mapel" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="kode_mapel">Kode Mapel</label>
					<input type="text" name="kode_mapel" class="form-control form-control-sm" required>
				</div>
				<div class="form-group col-sm-3">
					<label for="simpan-data"></label>
					<input type="submit" name="simpan-data" class="btn btn-success form-control" value="Tambah Data Mapel">
				</div>		
				</div>
			</form>
			</div>
		</div>
	</div>
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