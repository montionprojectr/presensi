<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">JURNAL GURU</h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table tabl-sm table-striped table-bordered">
					<thead>
			          <tr>
			            <th>ID Jurnal</th>
			            <th>Rombel</th>
			            <th>Kode Mapel</th>
			            <th>Nama Mapel</th>
			            <th>Hari dan Tanggal</th>
			            <th>Wkt Kehadiran</th>   
			            <th>Hadir</th>
			            <th>Alpa</th>
			            <th>Ijin</th>
			            <th>Sakit</th> 
			            <th>Option</th>
			          </tr>
			        </thead>
			        <tbody>
			        	<?php 
				          $query = mysqli_query($koneksi, "select * from tb_jurnal_kelas x inner join tb_user y on y.id_user = x.id_user inner join tb_mapel z on z.kode_mapel = x.kode_mapel where x.id_user = '".$user['id_user']."'");
				          while ($data = mysqli_fetch_array($query)) { 
				            $in = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws(' - ', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_rombel = '".$data['id_rombel']."'");
				            $dt = mysqli_fetch_array($in);
				            ?>
				            <tr>
				              <td><?= $data['id_jurnal']; ?></td>
				              <td><?= $dt['kelas']; ?></td>
				              <td><?= $data['kode_mapel'] ?></td>
				              <td><?= $data['name_mapel'] ?></td>
				              <td><?= $data['hari_dantgl'] ?></td>
				              <td><?= $data['time_mulai']." - ".$data['time_akhir']; ?></td>
				              <td><?= $data['hadir'] ?></td>
				              <td><?= $data['alpa'] ?></td>
				              <td><?= $data['ijin'] ?></td>
				              <td><?= $data['sakit'] ?></td>
				              <td><a href="?page=jurnal_guru_detail&id_jur=<?= $data['id_jurnal']; ?>" class="btn btn-danger">Detail</a></td>
				            </tr>
				          <?php }
				          ?>
			        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>