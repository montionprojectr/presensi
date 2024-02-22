<form action="proses-absensi.php" method="post">
<div class="row mt-3">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">INPUT DATA ABSENSI</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
          <label>Kelas / Rombel</label>
          <select class="form-control-sm select2" style="width: 100%;" id="select-kelas" name="id_rombel">
            <option selected="selected">--Pilih Data Kelas--</option>
            <?php 
          $query = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan");
          $no=1;
          while ($data = mysqli_fetch_array($query)) {
          ?>
          <option value="<?= $data['id_rombel']; ?>"><?= $no++.", KELAS ".$data['kelas']; ?></option>
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
          ?>
          <option value="<?= $mpl['kode_mapel']; ?>"><?= $no++.", ".$mpl['name_mapel']; ?></option>
          <?php 
          }
         ?>
          </select>
        </div>
        <div class="row form-group">
        	<div class="col-sm-4">
        	<label for="hari_dantgl">Hari & Tgl</label>
        	<input type="date" class="form-control form-control-sm" name="hari_dantgl" required>		
        	</div>
        </div>
         <div class="row mb-3">
          <label for="inputText" class="col-sm-2 col-form-label">Waktu Kehadiran</label>
          <div class="col-sm-4">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Mulai</span>
              <input type="time" class="form-control" name="time_mulai" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Akhir</span>
              <input type="time" class="form-control" name="time_akhir" aria-describedby="basic-addon1" required>
            </div>
          </div>
        </div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="row">
          <div class="col-sm-12" id="data-siswa">
            <!-- Table data siswa berdasarkan kelas yang dipilih dari file pages-guru-dsiswa.php -->
          </div>
        </div>
	</div>
</div>
</form>