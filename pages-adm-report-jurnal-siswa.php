<?php 
if (isset($_GET['id_rombel'])) {
	$id = $_GET['id_rombel'];
	$idg = $_GET['id_generet'];

	$sql = mysqli_query($koneksi, "select id_rombel, y.id_th_pelajaran, th_pelajaran, name_kelas, singkat_jurusan, rombel from tb_kelas x inner join tb_kel_jur_rombel y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = y.id_jurusan inner join tb_th_pelajaran w on w.id_th_pelajaran = y.id_th_pelajaran where id_rombel = '".$id."'");
	$data= mysqli_fetch_array($sql);
	$sqlg = mysqli_query($koneksi, "select * from tb_generet_tgl where id_generet = '".$idg."'");
	$dg = mysqli_fetch_array($sqlg);
	
	date_default_timezone_set('Asia/Jakarta');
	// echo date('D, Y-m-d H:i:s');

	$daftar_hari = array(
	 'Sunday' => 'Minggu',
	 'Monday' => 'Senin',
	 'Tuesday' => 'Selasa',
	 'Wednesday' => 'Rabu',
	 'Thursday' => 'Kamis',
	 'Friday' => 'Jumat',
	 'Saturday' => 'Sabtu'
	);
	// $date="2012/05/03";
	// $namahari = date('l', strtotime($date));

	// echo $daftar_hari[$namahari];
	$tawal = $dg['tgl_awal'];
	$takhir = $dg['tgl_akhir'];
	//code start
	$period = new DatePeriod(
	     new DateTime($tawal),
	     new DateInterval('P1D'),
	     new DateTime($takhir)
	);
?>
<div class="row mt-2">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h2 class="card-title">Report Jurnal Siswa Kelas <?= $data['name_kelas']." ".$data['singkat_jurusan']." ".$data['rombel']; ?> </h2>
			</div>
			<div class="card-body">
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">NIS</th>
							<th rowspan="2">Nama</th>
							<?php
							foreach ($period as $key => $value) {
								$val[] = array();
								echo "<th class='text-sm' rowspan='2'>";
							    $hari = $value->format('Y-m-d');
							    $date = date('l', strtotime($hari));
							    echo $daftar_hari[$date].", ".$hari;
							    echo "</th>";     
							}
							?>
							<th colspan="3">Total</th>
						</tr>
						<tr>
							<th>H</th>
							<th>A</th>
							<th>I</th>
							<th>S</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						
						$no=1;
						$sqls = mysqli_query($koneksi, "select id_siswa, nis, nisn, name_siswa, w.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_siswa w inner join tb_kel_jur_rombel x on x.id_rombel = w.id_rombel inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where w.id_rombel ='".$id."'");
						while ($data = mysqli_fetch_array($sqls)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['nis']; ?></td>
								<td><?= $data['name_siswa']; ?></td>
								<?php 
								foreach ($period as $k => $v) {
									$h = $v->format('Y-m-d');
									?>
									<td>
										<?php 
										$sqli = mysqli_query($koneksi, "select * from tb_jurnal_harian x inner join tb_siswa y on y.id_siswa = x.id_siswa where x.id_siswa = '".$data['id_siswa']."' and id_rombel = '".$data['id_rombel']."'");
										while ($ds = mysqli_fetch_array($sqli)) {
											if ($data['id_siswa'] == $ds['id_siswa']) {
												if ($h == $ds['hari_dantgl']) {
													if ($ds['kehadiran'] == 'hadir') {
														echo 'H';

													}else if($ds['kehadiran'] == 'alpa'){
														echo "A";
													}else if ($ds['kehadiran'] == 'ijin') {
														echo "I";
													}else if ($ds['kehadiran'] == 'sakit') {
														echo "S";
													}
												}else{
													echo "";
												}
											}
										}
										?>
									</td>
								<?php }

								$sqt = mysqli_query($koneksi, "select count(if(kehadiran = 'hadir', kehadiran, null)) as hadir, 
count(if(kehadiran = 'alpa', kehadiran, null)) as alpa,
count(if(kehadiran = 'ijin', kehadiran, null)) as ijin,
count(if(kehadiran = 'sakit', kehadiran, null)) as sakit from tb_jurnal_harian x inner join tb_siswa y on y.id_siswa = x.id_siswa where x.id_siswa = '".$data['id_siswa']."' and id_rombel = '".$data['id_rombel']."'");
								$t = mysqli_fetch_object($sqt);
								?>
								<td><?= $t->hadir; ?></td>
								<td><?= $t->alpa; ?></td>
								<td><?= $t->ijin; ?></td>
								<td><?= $t->sakit; ?></td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>