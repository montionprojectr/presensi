<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database-exclamation"></i> DETAIL DATA JURNAL GURU ID JURNAL : <?= $_GET['id_jurnal']; ?></h3>
        <a href="?page=jurnal-kelas" class="btn btn-primary float-right">Kembali</a>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
	            <th>Kelas Rombel</th>
	            <th>Kode Mapel</th>
	            <th>Nama Mapel</th>
	            <th>Guru</th>
	            <th>Hari dan Tanggal</th>
	            <th>Wkt Kehadiran</th>   
	            <th>Hadir</th>
	            <th>Apla</th>
	            <th>Ijin</th>
	            <th>Sakit</th>
	            <th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php 
          $query = mysqli_query($koneksi, "select * from tb_jurnal_kelas x inner join tb_user y on y.id_user = x.id_user inner join tb_mapel z on z.kode_mapel = x.kode_mapel where id_jurnal = '".$_GET['id_jurnal']."'");
          while ($data = mysqli_fetch_array($query)) { 
            $in = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws(' ', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_rombel = '".$data['id_rombel']."'");
            $dt = mysqli_fetch_array($in);
            ?>
            <tr>
              <td><?= $dt['kelas']; ?></td>
              <td><?= $data['kode_mapel'] ?></td>
              <td><?= $data['name_mapel'] ?></td>
              <td><?= $data['nama_depan']; ?></td>
              <td><?= $data['hari_dantgl'] ?></td>
              <td><?= $data['time_mulai']." - ".$data['time_akhir']; ?></td>
              <td><?= $data['hadir'] ?></td>
              <td>
                <ol class="list-group list-group-numbered">
                <?php 
                $sqlalp = mysqli_query($koneksi, "select * from tb_jurnal_siswa x inner join tb_siswa y on y.id_siswa = x.id_siswa where id_jurnal = '".$data['id_jurnal']."'"); 
                while ($alpa = mysqli_fetch_array($sqlalp)) {
                  if ($alpa['kehadiran'] == 'alpa') {
                   echo "<li>".$alpa['name_siswa']."</li>"; 
                  }else{
                    echo "";
                  }
                }
                ?>
                </ol>
              </td>
              <td>
                <ol class="list-group list-group-numbered">
                <?php 
                $sqlijn = mysqli_query($koneksi, "select * from tb_jurnal_siswa x inner join tb_siswa y on y.id_siswa = x.id_siswa where id_jurnal = '".$data['id_jurnal']."'"); 
                while ($ijin = mysqli_fetch_array($sqlijn)) {
                  if ($ijin['kehadiran'] == 'ijin') {
                   echo "<li>".$ijin['name_siswa'].", </li>"; 
                  }else{
                    echo "";
                  }
                }
                ?>
                </ol>
              </td>
              <td>
                <ol class="list-group list-group-numbered">
                <?php 
                $sqlskt = mysqli_query($koneksi, "select * from tb_jurnal_siswa x inner join tb_siswa y on y.id_siswa = x.id_siswa where id_jurnal = '".$data['id_jurnal']."'"); 
                while ($sakit = mysqli_fetch_array($sqlskt)) {
                  if ($sakit['kehadiran'] == 'sakit') {
                   echo "<li>".$sakit['name_siswa']."</li>"; 
                  }else{
                    echo "";
                  }
                }
                ?>
                </ol>
              </td>
              <td><?= $data['jumlah']." Siswa"; ?></td>
                <!-- Menentukan data alpa/ijin/sakit -->
            </tr>
          <?php }
          ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>