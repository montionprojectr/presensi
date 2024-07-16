<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database-fill-up"></i> Report Jurnal Siswa</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
					<form action="?page=jurnal-siswa" method="post">
						<select class="form-control form-control-sm select2" id="id_th_pelajaran" name="id_th_pelajaran">
			                <option value="">Pilih Th. Pelajaran</option>
			                <?php 
			                $sql_th = mysqli_query($koneksi, "select * from tb_th_pelajaran");
			                while ($dth = mysqli_fetch_array($sql_th)) { ?>
			                  <option value="<?= $dth['id_th_pelajaran']; ?>">Th. Pelajaran - <?= $dth['th_pelajaran']; ?></option>
			                <?php }
			                ?>
			              </select>
			              <button type="submit" class="btn btn-success mt-2">Tampilkan Data</button>
			          </form>
					</div>
					<div class="col-sm-8">
						<?php 
						if (isset($_POST['id_th_pelajaran'])) {
							$id = $_POST['id_th_pelajaran'];

							$query = mysqli_query($koneksi, "select y.id_th_pelajaran, th_pelajaran, name_kelas, singkat_jurusan, rombel from tb_kelas x inner join tb_kel_jur_rombel y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = y.id_jurusan inner join tb_th_pelajaran w on w.id_th_pelajaran = y.id_th_pelajaran where y.id_jurusan = '".$id."'");
							while ($dt = mysqli_fetch_array($query)) {
								// echo "Tahun Pelajaran ". $dt['th_pelajaran'];
								echo "<button class='btn light-blue m-2'>".$dt['name_kelas']." ".$dt['singkat_jurusan']." ".$dt['rombel']."</button>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>