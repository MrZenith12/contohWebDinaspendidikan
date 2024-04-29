<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Dokumen</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">File Dokumen (PDF)</label>
                <div class="col-sm-6">
                    <input type="file" id="file" name="file" accept=".pdf" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-file" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
$file_sumber = @$_FILES['file']['tmp_name'];
$target_directory = 'foto/'; // Ganti dengan direktori tempat file dokumen akan disimpan
$file_name = @$_FILES['file']['name'];

// Periksa ekstensi file (hanya menerima PDF)
$ekstensi = pathinfo($file_name, PATHINFO_EXTENSION);

if (isset($_POST['Simpan'])) {
    if (!empty($file_sumber) && strtolower($ekstensi) == 'pdf') {
        // Koneksi ke database (pastikan ini sudah ada di kode Anda)
        $koneksi = mysqli_connect("localhost", "root", "", "dinaspendidikan");

        // Pastikan koneksi berhasil
        if (!$koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        $nama_dokumen = mysqli_real_escape_string($koneksi, $_POST['nama_dokumen']);

        $sql_simpan = "INSERT INTO dokumen (nama_dokumen, file) VALUES (
            '" . $nama_dokumen . "',
            '" . $file_name . "')"; // Menggunakan $file_name

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            move_uploaded_file($file_sumber, $target_directory . $file_name); // Pindahkan file dokumen ke direktori target
            echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-file';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-file';
                }
            })</script>";
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo "<script>
        Swal.fire({title: 'Gagal, Harap Unggah File Dokumen dengan Format PDF', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add-file';
            }
        })</script>";
    }
}
// Selesai proses simpan data
?>
