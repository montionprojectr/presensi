<?php
// Load file koneksi.php
include "pages-config.php";

// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$id_rombel = $_POST['id_rombel'];
	$nama_file_baru = $_POST['namafile'];
    $path = 'tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$nis = $row['A']; // Ambil data nis
		$nisn = $row['B']; // Ambil data nisn
		$name_siswa = $row['C']; // Ambil data name_kelas

		// Cek jika semua data tidak diisi
		if($nis == "" && $nisn == "" && $name_siswa == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = mysqli_query($koneksi, "insert into tb_siswa(id_siswa, nis, nisn, name_siswa, id_rombel) values('','" . $nis . "','" . $nisn . "','" . $name_siswa . "','" . $id_rombel . "')");
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}
echo "<script>
	alert('Data Berhasil disimpan');
	document.location.href = 'pages-admin.php?page=data-siswa';
</script>";

// header('location: pages-admin.php?page=data-kelas');  Redirect ke halaman awal

?>