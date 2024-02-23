<?php 

$id_jurnal = $_GET['id_jurnal'];
$query = mysqli_query($koneksi, "select * from tb_jurnal_kelas where id_jurnal = '".$id_jurnal."'");
$dt = mysqli_fetch_array($query);

?>
<form action="" method="post">
<div class="row mt-3">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> EDIT DATA ABSENSI</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
			      <label>Kelas / Rombel</label>
			      <select class="form-control-sm select2" style="width: 100%;" id="select-kelas" name="id_rombel">
			        <?php 
			      $query = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_rombel = '".$dt['id_rombel']."'");
			      $no=1;
			      while ($data = mysqli_fetch_array($query)) {
			      	?>
				      <option value="<?= $data['id_rombel']; ?>"><?= "KELAS ".$data['kelas']; ?></option>
				      <?php 
			      }
			      ?>
			      </select>
			    </div>
			    <div class="form-group">
		            <label for="nama_lengkap">Nama Guru</label>
		            <input type="email" class="form-control form-control-sm" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" readonly>
		            <input type="text" name="id_user" value="<?= $user['id_user'] ?>" hidden>
		        </div>
		        <div class="form-group">
		          <label>Nama Mapel</label>
		          <select class="form-control-sm select2" style="width: 100%;" name="kode_mapel" required>
		            <option selected="selected">--Pilih Data Mapel--</option>
		            <?php 
		          $query_mpl = mysqli_query($koneksi, "select * from tb_mapel");
		          $no=1;
		          while ($mpl = mysqli_fetch_array($query_mpl)) {
		          	if ($mpl['kode_mapel'] == $dt['kode_mapel']) {
		          		$select = 'selected';
		          	}else{
		          		$select = '';
		          	}
		          ?>
		          <option value="<?= $mpl['kode_mapel']; ?>" <?= $select; ?>><?= $no++.", ".$mpl['name_mapel']; ?></option>
		          <?php 
		          }
		         ?>
		          </select>
		        </div>
		        <div class="row form-group">
		        	<div class="col-sm-4">
		        	<label for="hari_dantgl">Hari & Tgl</label>
		        	<input type="date" class="form-control form-control-sm" name="hari_dantgl" value="<?= $dt['hari_dantgl']; ?>" required>		
		        	</div>
		        </div>
		        <div class="row mb-3">
		          <label for="inputText" class="col-sm-2 col-form-label">Waktu Kehadiran</label>
		          <div class="col-sm-4">
		            <div class="input-group mb-3">
		              <span class="input-group-text" id="basic-addon1">Mulai</span>
		              <input type="time" class="form-control" name="time_mulai" value="<?= $dt['time_mulai']; ?>" aria-describedby="basic-addon1" required>
		            </div>
		            <div class="input-group mb-3">
		              <span class="input-group-text" id="basic-addon1">Akhir</span>
		              <input type="time" class="form-control" name="time_akhir" value="<?= $dt['time_akhir']; ?>" aria-describedby="basic-addon1" required>
		            </div>
		          </div>
		        </div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> EDIT PRESENSI DATA SISWA</h3>
			</div>
			<div class="card-body">
				<table class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col">No</th>
					        <th scope="col">Name</th>
					        <th scope="col">Kehadiran</th>
						</tr>
					</thead>
					<tbody>
						<?php 
					      $query = mysqli_query($koneksi, "select id_siswa, nis, nisn, name_siswa, w.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_siswa w inner join tb_kel_jur_rombel x on x.id_rombel = w.id_rombel inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where w.id_rombel = '".$dt['id_rombel']."'");
					      $no=1;
					      while($data = mysqli_fetch_array($query)) { 
					      
					      ?>
					      <tr>
					        <th scope="row"><?= $no++; ?></th>
					        <td><?= $data['name_siswa']; ?> <input type="text" name="id_siswa[]" value="<?= $data['id_siswa']; ?>" hidden></td>
					        <td>
					          <select class="form-control form-control-sm select2" name="kehadiran[]">
					          	<?php 
					          	$sqlj = mysqli_query($koneksi, "select * from tb_jurnal_siswa where id_jurnal = '".$dt['id_jurnal']."' and id_siswa = '".$data['id_siswa']."'");
					          	$jurnal = mysqli_fetch_array($sqlj);

					          	$array = array('Hadir' => 'hadir' , 'Alpa' => 'alpa', 'Ijin' => 'ijin', 'Sakit' => 'sakit' );

					          	foreach ($array as $key => $value) {
					          		if ($value == $jurnal['kehadiran']) {
					          			$select = 'selected';
					          		}else{
					          			$select = '';
					          		}
					          		echo "<option value='".$value."' ".$select.">".$key."</option>";
					          	}
					          	?>
					            <!-- <option value="hadir">Hadir</option>
					            <option value="alpa">Alpa</option>
					            <option value="ijin">Ijin</option>
					            <option value="sakit">Sakit</option> -->
					          </select>
					        </td>
					      </tr>
					      <?php
					      }
					      ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="form-group text-center">
			<input type="submit" class="btn btn-success" name="simpan-edit" value="SIMPAN PERUBAHAN PRESENSI" style="width: 50%;">
			<a href="?page=jurnal_guru_detail&id_jur=<?= $dt['id_jurnal']; ?>" class="btn btn-primary">Kembali</a>
		</div>
	</div>
</div>
</form>

<?php 
if (isset($_POST['simpan-edit'])) {
	$id_rombel = $_POST['id_rombel'];
	$id_user = $_POST['id_user'];
	$kode_mapel = $_POST['kode_mapel'];
	$hari_dantgl = $_POST['hari_dantgl'];
	$time_mulai = $_POST['time_mulai'];
	$time_akhir = $_POST['time_akhir'];

	$id_siswa = $_POST['id_siswa'];
	$kehadiran = $_POST['kehadiran'];
	$count = count($id_siswa);

	for ($i=0; $i < $count ; $i++) { 
		// $querya = mysqli_query($koneksi, "insert into tb_jurnal_siswa(id_jurnal_siswa, id_jurnal, id_siswa, kehadiran) values('','".$kode."','".$id_siswa[$i]."','".$kehadiran[$i]."')");
		$querya = mysqli_query($koneksi, "update tb_jurnal_siswa set kehadiran = '".$kehadiran[$i]."' where id_siswa = '".$id_siswa[$i]."' and id_jurnal = '".$dt['id_jurnal']."'");
	}

	$array = array_count_values($kehadiran);

		//mengetahui jumlah hadir
		if (isset($array['hadir']) == true) {
			$hadir = $array['hadir'];
		}else if(isset($array['hadir']) == false){
			$hadir = 0;
		}

		//mengetahui jumlah alpa
		if (isset($array['alpa']) == true) {
			$alpa = $array['alpa'];
		}else if(isset($array['alpa']) == false){
			$alpa = 0;
		}

		//mengetahui jumlah ijin
		if (isset($array['ijin']) == true) {
			$ijin = $array['ijin'];
		}else if (isset($array['ijin']) == false) {
			$ijin = 0;
		}

		//mengetahui jumlah sakit
		if (isset($array['sakit']) == true) {
			$sakit = $array['sakit'];
		}else if (isset($array['sakit']) == false) {
			$sakit = 0;
		}

		//insert tb_jurnal_kelas
		// $query = mysqli_query($koneksi, "insert into tb_jurnal_kelas(id_jurnal, id_rombel, id_user, kode_mapel, hari_dantgl, time_mulai, time_akhir, hadir, alpa, ijin, sakit, jumlah) values('".$kode."','".$id_rombel."','".$id_user."','".$kode_mapel."','".$hari_dantgl."','".$time_mulai."','".$time_akhir."','".$hadir."','".$alpa."','".$ijin."','".$sakit."','".$count."')");

		$query = mysqli_query($koneksi, "update tb_jurnal_kelas set kode_mapel = '".$kode_mapel."', hari_dantgl = '".$hari_dantgl."', time_mulai = '".$time_mulai."', time_akhir = '".$time_akhir."', hadir = '".$hadir."', alpa = '".$alpa."', ijin = '".$ijin."', sakit = '".$sakit."', jumlah = '".$count."' where id_jurnal = '".$dt['id_jurnal']."'");

		if ($query && $querya) {
			echo "<script>
			alert('DATA BERHASIL DISIMPAN');
			document.location.href = 'index.php?page=jurnal_guru';
			</script>";
		}


}
?>