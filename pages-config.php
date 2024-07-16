<?php 
 
$koneksi = mysqli_connect("localhost","root","","db_absensi");

// $koneksi = mysqli_connect("localhost","smkm2925_absensi","absensi123456789","smkm2925_presensi");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>