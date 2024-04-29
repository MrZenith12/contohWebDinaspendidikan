<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul Berita</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
				</div>
			</div>

			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">File Media (MP4)</label>
			    <div class="col-sm-6">
			        <input type="file" id="gambar" name="gambar" accept=".mp4">
			        <p class="help-block">
			            <font color="red">"Format file MP4"</font>
			        </p>
			    </div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-beritamp" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
$file_sumber = @$_FILES['gambar']['tmp_name'];
$target_directory = 'foto/'; // Ganti dengan direktori tempat file media akan disimpan
$file_name = @$_FILES['gambar']['name']; // Menggunakan 'gambar' bukan 'media'

// Periksa ekstensi file
$ekstensi = pathinfo($file_name, PATHINFO_EXTENSION);

if (isset($_POST['Simpan'])) {
    if ($ekstensi === 'mp4') { // Memeriksa apakah ekstensinya adalah MP4
        $upload_success = move_uploaded_file($file_sumber, $target_directory . $file_name);

        if ($upload_success) {
            // Koneksi ke database (pastikan ini sudah ada di kode Anda)
            $koneksi = mysqli_connect("localhost","root","","dinaspendidikan");

            // Pastikan koneksi berhasil
            if (!$koneksi) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            $sql_simpan = "INSERT INTO tbl_berita (judul_berita, deskripsi, gambar) VALUES (
                '" . $_POST['judul_berita'] . "',
                '" . $_POST['deskripsi'] . "',
                '" . $file_name . "')"; // Menggunakan $file_name

            $query_simpan = mysqli_query($koneksi, $sql_simpan);

            if ($query_simpan) {
                echo "<script>
                Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-beritamp';
                    }
                })</script>";
            } else {
                echo "<script>
                Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=add-beritamp';
                    }
                })</script>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
        } else {
            echo "<script>
            Swal.fire({title: 'Gagal, Foto Wajib Diisi', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-beritamp';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Gagal, File harus berformat MP4', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add-berita';
            }
        })</script>";
    }
}
// Selesai proses simpan data
?>