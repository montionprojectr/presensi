<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Siswa</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>ID Siswa</th>
							<th>Nis</th>
							<th>NISN</th>
							<th>Nama Lengkap</th>
							<th>Kelas//Rombel</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = mysqli_query($koneksi, "SELECT x.id_siswa, nis, nisn, name_siswa, y.id_rombel, name_kelas, singkat_jurusan, rombel FROM tb_siswa X
INNER JOIN tb_kel_jur_rombel Y ON y.id_rombel = x.id_rombel
INNER JOIN tb_kelas z ON z.id_kelas = y.id_kelas
INNER JOIN tb_jurusan a ON a.id_jurusan = y.id_jurusan");
					while ($dt = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?= $dt['id_siswa'] ?></td>
							<td><?= $dt['nis'] ?></td>
							<td><?= $dt['nisn'] ?></td>
							<td><?= $dt['name_siswa'] ?></td>
							<td><?= $dt['name_kelas']." ".$dt['singkat_jurusan']." ".$dt['rombel']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>