<?php 
require_once('pages-config.php');

$id_rombel = $_POST['id_rombel'];
$date_day = $_POST['date_day'];
$id_th_pelajaran = $_POST['id_th_pelajaran'];
?>
<button id="table" class="mb-2"><i class="fa fas-excel"></i> Excel</button>

<table class="table table-sm table-striped table-bordered">
<thead>
  <tr>
    <th>ID Jurnal</th>
    <th>Rombel</th>
    <th>Kode Mapel</th>
    <th>Mapel</th>
    <th>Guru</th>
    <th>Hari & Tanggal</th>
    <th>Wkt Kehadiran</th>
    <th>Hadir</th>
    <th>Alpa</th>
    <th>Ijin</th>
    <th>Sakit</th>
    <th>Jumlah</th>   
    <th>Option</th> 
  </tr>
</thead>
<tbody>
 <?php
$query = mysqli_query($koneksi, "select id_jurnal, concat_ws(' - ', name_kelas, singkat_jurusan, rombel) as kelas , x.kode_mapel, name_mapel, nama_lengkap, hari_dantgl, concat_ws(' - ', time_mulai, time_akhir) as wkt_kehadiran, hadir, alpa, ijin, sakit, jumlah from tb_jurnal_kelas x inner join tb_user y on y.id_user = x.id_user inner join tb_mapel z on z.kode_mapel = x.kode_mapel inner join tb_kel_jur_rombel a on a.id_rombel = x.id_rombel inner join tb_kelas b on b.id_kelas = a.id_kelas inner join tb_jurusan c on c.id_jurusan = a.id_jurusan where x.id_rombel = '".$id_rombel."' and hari_dantgl = '".$date_day."' and id_th_pelajaran = '".$id_th_pelajaran."' group by id_jurnal asc");
while ($data = mysqli_fetch_array($query)) { ?>
	<tr>
		<td><?= $data['id_jurnal']; ?></td>
		<td><?= $data['kelas']; ?></td>
		<td><?= $data['kode_mapel']; ?></td>
		<td><?= $data['name_mapel']; ?></td>
		<td><?= $data['nama_lengkap'] ?></td>
		<td><?= $data['hari_dantgl']; ?></td>
		<td><?= $data['wkt_kehadiran']; ?></td>
		<td><?= $data['hadir']; ?></td>
		<td><?= $data['alpa']; ?></td>
		<td><?= $data['ijin']; ?></td>
		<td><?= $data['sakit']; ?></td> 
		<td><?= $data['jumlah']; ?></td> 
		<td><a href="?page=adm_jurnal_kelas_detail&id_jurnal=<?= $data['id_jurnal']; ?>" class="btn btn-danger">Detail</a></td>  
	</tr>
<?php }
?>
</tbody>
</table>