<?php
include('pages-config.php');
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'nis');
$sheet->setCellValue('B1', 'nisn');
$sheet->setCellValue('C1', 'name_siswa');
 
$data = mysqli_query($koneksi,"select * from tb_siswa where id_rombel = '".$_GET['idrombel']."'");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $d['nis']);
    $sheet->setCellValue('B'.$i, $d['nisn']);
    $sheet->setCellValue('C'.$i, $d['name_siswa']);
    $i++;
}

$query = mysqli_query($koneksi, "select x.id_rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas  from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_rombel = '".$_GET['idrombel']."'");
$dt = mysqli_fetch_array($query);

$writer = new Xlsx($spreadsheet);
$writer->save('tmp/data-siswa-'.$dt['kelas'].'.xlsx');
// echo "<script>window.location = 'tmp/data-siswa-".$dt['kelas'].".xlsx'</script>";

header("location: tmp/data-siswa-".$dt['kelas'].".xlsx");
 
?>