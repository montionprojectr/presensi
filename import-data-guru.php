<?php
// Load file koneksi.php
include "pages-config.php";

// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
    $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana
    $maxim = $_POST['maxim'];

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$username = $row['A']; // Ambil data nis
		$password = $row['B']; // Ambil data nisn
		$nipy = $row['C']; // Ambil data name_kelas
		$nama_depan = $row['D'];
		$nama_lengkap = $row['E'];

		// Cek jika semua data tidak diisi
		if($username == "" && $password == "" && $nipy == "" && $nama_depan == "" && $nama_lengkap == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = mysqli_query($koneksi, "insert into tb_user(id_user, username, password, nipy, nama_depan, nama_lengkap) values('','".$username."','".$password."','" .$nipy."','".$nama_depan."', '".$nama_lengkap."')");

			if ($query) {
				$cekuser = mysqli_query($koneksi, "select * from tb_user where username = '".$username."' and password = '".$password."'");
				$dcek = mysqli_fetch_array($cekuser);
				$sqlrol = mysqli_query($koneksi, "insert into tb_rolsuser(id_rols, id_user, id_level) values('','".$dcek['id_user']."','2')");	
			}
			
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

echo "<script>
	alert('Data Berhasil disimpan');
	document.location.href = 'pages-admin.php?page=data-guru';
</script>";
// header('location: pages-admin.php?page=data-guru');  Redirect ke halaman awal

?>