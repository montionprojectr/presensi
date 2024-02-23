<?php 
$format = mysqli_query($koneksi, "select * from tb_format_th where id = '1'");
$d = mysqli_fetch_array($format);
?>
<div class="row mt-3">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> SETELAN</h3>
			</div>
			<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="format">Format Tampilan Tahun Pelajaran</label>
					<select class="form-control form-control-sm select2" name="format" id="format">
					<?php 
					$sql = mysqli_query($koneksi, "select * from tb_th_pelajaran");
					while ($dt = mysqli_fetch_array($sql)) { 
						if($dt['th_pelajaran'] == $d['format_th']) {
							$select = 'selected';
						}else{
							$select = '';
						}
						?>
						<option value="<?= $dt['th_pelajaran']; ?>" <?= $select; ?>><?= $dt['th_pelajaran']; ?></option>
					<?php }
					?>
					</select>
				</div>
				<div class="form-group">
					<textarea class="form-control form-control-sm" readonly>FORMAT tahun ini akan mengubah seluruh tampilan halaman berada pada tahun pelajaran yang dipilih (<?= $d['format_th']; ?>).</textarea>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success">
				</div>
				</form>			
			</div>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['submit'])) {
	$format = $_POST['format'];

	$query = mysqli_query($koneksi, "update tb_format_th set format_th = '".$format."' where id = '1'");

	if ($query) {
		echo "<script>
		alert('Tahun berhasil disimpan');
		document.location.href = '?page=adm-setelan';
		</script>";
	}
}
?>