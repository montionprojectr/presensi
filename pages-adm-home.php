<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-arrow-up-square-fill"></i> UPDATE PRESENSI |  <?= $hr.", ".$tgl_skrang; ?></h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped">
					<thead class="card-header">
						<tr>
							<th>id jurnal</th>
							<th>kelas</th>
							<th>mapel</th>
							<th>guru</th>
							<th>hari & tgl</th>
							<th>wkt mulai</th>
							<th>wkt akhir</th>
							<th>hadir</th>
							<th>alpa</th>
							<th>ijin</th>
							<th>sakit</th>
							<th>jumlah</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "select id_jurnal, concat_ws(' - ', name_kelas, singkat_jurusan, rombel) as kelas , x.kode_mapel, name_mapel, nama_lengkap, hari_dantgl, time_mulai, time_akhir, hadir, alpa, ijin, sakit, jumlah from tb_jurnal_kelas x inner join tb_user y on y.id_user = x.id_user inner join tb_mapel z on z.kode_mapel = x.kode_mapel inner join tb_kel_jur_rombel a on a.id_rombel = x.id_rombel inner join tb_kelas b on b.id_kelas = a.id_kelas inner join tb_jurusan c on c.id_jurusan = a.id_jurusan where hari_dantgl = '".date('y-m-d')."' GROUP BY id_jurnal DESC");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_jurnal']; ?></td>
							<td><?= $data['kelas']; ?></td>
							<td><?= $data['name_mapel']; ?></td>
							<td><?= $data['nama_lengkap']; ?></td>
							<td><?= $data['hari_dantgl']; ?></td>
							<td><?= $data['time_mulai']; ?></td>
							<td><?= $data['time_akhir']; ?></td>
							<td><?= $data['hadir']; ?></td>
							<td><?= $data['alpa']; ?></td>
							<td><?= $data['ijin']; ?></td>
							<td><?= $data['sakit']; ?></td>
							<td><?= $data['jumlah']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>