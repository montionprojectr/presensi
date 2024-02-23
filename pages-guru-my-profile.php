<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-person-fill"></i> My Profile</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead class="card-header">
						<tr>
							<th>ID User</th>
							<th>Username</th>
							<th>Password</th>
							<th>NIPY</th>
							<th style="width: 40%;">Nama Lengkap</th>
							<th>Nama Depan</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sqli = mysqli_query($koneksi, "select * from tb_user where id_user = '".$user['id_user']."'");
					while ($dt = mysqli_fetch_array($sqli)) { ?>
						<tr>
							<td><?= $dt['id_user']; ?></td>
							<td><input type="text" class="form-control form-control-sm" value="<?= $dt['username']; ?>" readonly></td>
							<td><input type="password" class="form-control form-control-sm" value="<?= $dt['password']; ?>" readonly></td>
							<td><input type="text" class="form-control form-control-sm" value="<?= $dt['nipy']; ?>" readonly></td>
							<td><input type="text" class="form-control form-control-sm" value="<?= $dt['nama_lengkap']; ?>" readonly></td>
							<td><input type="text" class="form-control form-control-sm" value="<?= $dt['nama_depan']; ?>" readonly></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>