<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="bi bi-database-fill-up"></i> Report Jurnal Kelas</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<select class="form-control form-control-sm select2" id="id_th_pelajaran">
			                <option value="">Pilih Th. Pelajaran</option>
			                <?php 
			                $sql_th = mysqli_query($koneksi, "select * from tb_th_pelajaran");
			                while ($dth = mysqli_fetch_array($sql_th)) { ?>
			                  <option value="<?= $dth['id_th_pelajaran']; ?>">Th. Pelajaran - <?= $dth['th_pelajaran']; ?></option>
			                <?php }
			                ?>
			              </select>
					</div>
					<div class="col-sm-3">
						<select class="form-control form-control-sm select2" id="id_kelas">
		                <option value="">Pilih Kelas</option>
		                <?php 
		                $sql_kelas = mysqli_query($koneksi, "select * from tb_kelas");
		                while ($dtkel = mysqli_fetch_array($sql_kelas)) { ?>
		                  <option value="<?= $dtkel['id_kelas']; ?>">KELAS - <?= $dtkel['name_kelas']; ?></option>
		                <?php }
		                ?>
		              </select>
					</div>
					<div class="col-sm-3">
						<select class="form-control form-control-sm select2" id="id_rombel">
			                <option value="">Pilih Rombel</option>
			                <!-- Tampilan dari pages-adm-jurnal-dkelasa.php -->
			              </select>
					</div>
					<div class="col-sm-3">
						<input type="date" name="date" id="date_day" class="form-control form-control-sm">
					</div>
					<div class="col-sm-12">
						<button class="btn btn-success m-2 col-sm-12"><i class="fa fa-file-excel"></i> Excel</button>
					</div>
					<div class="col-sm-12">
						<div id="data-jurnal" class="mt-3">
							<!-- Tampilan dari pages-adm-jurnal-dkelasb.php -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>