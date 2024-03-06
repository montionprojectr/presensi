<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ANDA BERADA PADA TAMPILAN Th. PELAJARAN : <?= $d['format_th']; ?></h3>
			</div>
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> INPUTData Siswa</h3>
			</div>
			<div class="card-header bg-warning">
				<h3 class="card-title"><b class="text-danger">*</b>Pilih Kelas terlebih dahulu sebelum upload data siswa</h3>
			</div>
			<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group col-sm-6">
					<label for>Pilih Kelas / Rombel</label>
					<select class="form-control form-control-sm select2" name="id_rombel" required>
						<option value="">--Pilih--</option>
					<?php 
					$sql = mysqli_query($koneksi, "select id_rombel, x.id_kelas, name_kelas, x.id_jurusan, name_jurusan, rombel, concat_ws('-', name_kelas, singkat_jurusan, rombel) as kelas from tb_kel_jur_rombel x inner join tb_kelas y on y.id_kelas = x.id_kelas inner join tb_jurusan z on z.id_jurusan = x.id_jurusan where id_th_pelajaran = '".$th['id_th_pelajaran']."'");
					while ($kls = mysqli_fetch_array($sql)) { ?>
						<option value="<?= $kls['id_rombel']; ?>"><?= "KELAS | ".$kls['kelas'] ?></option>
					<?php }
					?>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<label for="file"><a href="vendor/formatdatasiswa.xlsx">Download Berkas format excel</a></label>
					<hr class="mb-0 mt-0">
					<label for="file">Telusuri format excel hasil download yg sudah terisi data siswa</label>
					<input type="file" name="file" class="form-control form-control-sm" required>
				</div>
				<div class="form-group">
					<input type="submit" name="preview" class="btn btn-success" value="Preview Data Siswa">
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php
// Jika user telah mengklik tombol Preview
if (isset($_POST['preview'])) {
    $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
    $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';
    $id_rombel = $_POST['id_rombel'];

    // Cek apakah terdapat file data.xlsx pada folder tmp
    if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
        unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
    $tmp_file = $_FILES['file']['tmp_name'];

    // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
    if ($ext == "xlsx") {
        // Upload file yang dipilih ke folder tmp
        // dan rename file tersebut menjadi data{tglsekarang}.xlsx
        // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
        // Contoh nama file setelah di rename : data20210814192500.xlsx
        move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah tag form untuk proses import data ke database
        echo "<form method='post' action='import-data-siswa.php'>";

        // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
        echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";
        echo "<input type='hidden' name='id_rombel' value='" . $id_rombel . "'>";

        // Buat sebuah div untuk alert validasi kosong
        echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
				Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";

        echo "<table class='table table-bordered table-striped card-body' cellpadding='5'>
				<tr>
					<th colspan='5' class='text-center'>Preview Data</th>
				</tr>
				<tr>
					<th>No</th>
					<th>NIS</th>
					<th>Nisn</th>
					<th>Name Siswa</th>
				</tr>";

        $numrow = 1;
        $kosong = 0;
        $no=1;
        foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $nis = $row['A']; // Ambil data NIS
            $nisn = $row['B']; // Ambil data nama
            $name_siswa = $row['C']; // Ambil data jenis kelamin

            // Cek jika semua data tidak diisi
            if ($nis == "" && $nisn == "" && $name_siswa == "")
                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Validasi apakah semua data telah diisi
                $nis_td = (!empty($nis)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                $nisn_td = (!empty($nisn)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                $name_siswa_td = (!empty($name_siswa)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah

                // Jika salah satu data ada yang kosong
                if ($nis == "" or $nisn == "" or $name_siswa == "") {
                    $kosong++; // Tambah 1 variabel $kosong
                }

                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td" . $nis_td . ">" . $nis . "</td>";
                echo "<td" . $nisn_td . ">" . $nisn . "</td>";
                echo "<td" . $name_siswa_td . ">" . $name_siswa . "</td>";
                echo "</tr>";
            }

            $numrow++; // Tambah 1 setiap kali looping
        }

        echo "</table>";

        // Cek apakah variabel kosong lebih dari 0
        // Jika lebih dari 0, berarti ada data yang masih kosong
        if ($kosong > 0) {
?>
            <script>
                $(document).ready(function() {
                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                    $("#kosong").show(); // Munculkan alert validasi kosong
                });
            </script>
<?php
        } else { // Jika semua data sudah diisi
            echo "<hr>";

            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-success'>Import Data Siswa</button>";
        }

        echo "</form>";
    } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div style='color: red;margin-bottom: 10px;'>
				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
            </div>";
    }
}
?>
