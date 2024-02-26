<div class="row mt-3">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">ANDA BERADA PADA TAMPILAH Th. PELAJARAN : <?= $d['format_th']; ?></h3>
			</div>
			<div class="card-header light-blue">
				<h3 class="card-title"><i class="fas fa-edit"></i> INPUTData Guru</h3>
			</div>
			<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="file"><a href="vendor/formatdataguru.xlsx">Download Berkas Format Excel</a></label>
					<hr class="mt-0 mb-0">
					<label for="file">Telusuri format excel hasil download yg sudah terisi data guru</label>
					<input type="file" name="file" class="form-control form-control-sm" >
				</div>
				<div class="form-group">
					<input type="submit" name="preview" class="btn btn-success" value="Preview Data Guru">
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
    
    $sqlmax = mysqli_query($koneksi, "select max(id_user) as maxim from tb_user");
    $max = mysqli_fetch_array($sqlmax);
    $maxim= $max['maxim'] + 1;

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
        echo "<form method='post' action='import-data-guru.php'>";

        // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
        echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";
        echo "<input type='hidden' name='maxim' value='" . $maxim . "'>";

        // Buat sebuah div untuk alert validasi kosong
        echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
				Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";

        echo "<table class='table table-bordered table-striped card-body' cellpadding='6'>
				<tr>
					<th colspan='6' class='text-center'>Preview Data</th>
				</tr>
				<tr>
					<th>No Maxim</th>
					<th>Username</th>
					<th>Password</th>
					<th>Nipy</th>
					<th>Nama Depan</th>
					<th>Nama Lengkap</th>
				</tr>";

        $numrow = 1;
        $kosong = 0;
        
        foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $username = $row['A']; // Ambil data username
            $password = $row['B']; // Ambil data password
            $nipy = $row['C']; // Ambil data nipy
            $nama_depan = $row['D']; //Ambil data nama_depan
            $nama_lengkap = $row['E']; //Ambil data nama_belakang

            // Cek jika semua data tidak diisi
            if ($username == "" && $password == "" && $nipy == "" && $nama_depan == "" && $nama_lengkap == "")
                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Validasi apakah semua data telah diisi
                $username_td = (!empty($username)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                $password_td = (!empty($password)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                $nipy_td = (!empty($nipy)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                $nama_depan_td = (!empty($nama_depan)) ? "" : " style='background: #E07171;'";
                $nama_lengkap_td = (!empty($nama_lengkap)) ? "" : " style='background: #E07171;'";

                // Jika salah satu data ada yang kosong
                if ($username == "" or $password == "" or $nipy == "" or $nama_depan == "" or $nama_lengkap == "") {
                    $kosong++; // Tambah 1 variabel $kosong
                }

                echo "<tr>";
                echo "<td>" . $maxim++ . "</td>";
                echo "<td" . $username_td . ">" . $username . "</td>";
                echo "<td" . $password_td . ">" . $password . "</td>";
                echo "<td" . $nipy_td . ">" . $nipy . "</td>";
                echo "<td" . $nama_depan_td . ">" . $nama_depan . "</td>";
                echo "<td" . $nama_lengkap_td . ">" . $nama_lengkap . "</td>";
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
            echo "<button type='submit' name='import' class='btn btn-success'>Import Data Guru</button>";
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