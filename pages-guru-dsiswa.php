<?php 
require_once('pages-config.php');

if (isset($_POST['id_rombel'])) {
  $id_rombel = $_POST['id_rombel'];
?>

  <div class="card-header bg-secondary">
    <h3 class="card-title">Data siswa /kelas</h3>
  </div>
  <div class="card-body" id="data-siswa">
    <table class="table table-sm table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Kehadiran</th>
        <!-- <th scope="col">Hadir</th>
        <th scope="col">Alpa</th>
        <th scope="col">Ijin</th>
        <th scope="col">Sakit</th> -->
      </tr>
    </thead>
    <tbody>
      <?php 
      $query = mysqli_query($koneksi, "select id_siswa, nis, nisn, name_siswa, w.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_siswa w inner join tb_kel_jur_rombel x on x.id_rombel = w.id_rombel inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where w.id_rombel = '".$id_rombel."'");
      $no=1;
      while($data = mysqli_fetch_array($query)) { 
      
      ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $data['name_siswa']; ?> <input type="text" name="id_siswa[]" value="<?= $data['id_siswa']; ?>" hidden></td>
        <td>
          <select class="form-control form-control-sm select2" name="kehadiran[]">
            <option value="hadir">Hadir</option>
            <option value="alpa">Alpa</option>
            <option value="ijin">Ijin</option>
            <option value="sakit">Sakit</option>
          </select>
        </td>
        <!-- <td>
          <div class="form-check">
            <input class="form-check-input bg-primary" type="radio" name="grid[<?= $no; ?>]" id="grid[<?= $no; ?>]" value="hadir" checked>
          </div>
        </td>
        <td>
          <div class="form-check">
            <input class="form-check-input bg-danger" type="radio" name="grid[<?= $no; ?>]" id="grid[<?= $no; ?>]" value="alpa">
          </div>
        </td>
        <td>
          <div class="form-check">
            <input class="form-check-input bg-warning" type="radio" name="grid[<?= $no; ?>]" id="grid[<?= $no; ?>]" value="ijin">
          </div>
        </td>
        <td>
          <div class="form-check">
            <input class="form-check-input bg-success" type="radio" name="grid[<?= $no; ?>]" id="grid[<?= $no; ?>]" value="sakit">
          </div>
        </td> -->
      </tr>
      <?php
      }
      ?>
    </tbody>
    </table>
    <div class="row mb-3">
      <div class="col-sm-10">
        <input type="submit" class="btn btn-primary" name="simpan_presensi" value="SIMPAN-PRESENSI">
      </div>
    </div>
  </div>

<?php 
}
?>