<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="NIP" name="NIP" placeholder="NIP" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bidang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bidang" name="bidang" placeholder="Bidang" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">File Gambar (JPG/PNG/JPEG)</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" accept=".jpg, .png">
                    <p class="help-block">
                        <font color="red">Format file JPG, JPEG & PNG</font>
                    </p>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=data-anggota" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
$file_sumber = @$_FILES['foto']['tmp_name'];
$target_directory = 'foto/'; // Ganti dengan direktori tempat file foto akan disimpan
$file_name = @$_FILES['foto']['name'];

// Periksa ekstensi file
$ekstensi = pathinfo($file_name, PATHINFO_EXTENSION);

if (isset($_POST['Simpan'])) {
    if (!empty($file_sumber) && in_array($ekstensi, array('jpg', 'jpeg', 'png'))) {
        // Koneksi ke database (pastikan ini sudah ada di kode Anda)
        $koneksi = mysqli_connect("localhost","root","","dinaspendidikan");
       
        // Pastikan koneksi berhasil
        if (!$koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
        $sql_simpan = "INSERT INTO tbl_anggota (NIP, nama, jabatan, bidang, foto) VALUES (
            '" . $_POST['NIP'] . "',
            '" . $_POST['nama'] . "',
            '" . $_POST['jabatan'] . "',
            '" . $_POST['bidang'] . "',
            '" . $file_name . "')"; // Menggunakan $file_name

        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        if ($query_simpan) {
            move_uploaded_file($file_sumber, $target_directory . $file_name); // Pindahkan file gambar ke direktori target
            echo "<script>
            Swal.fire({title: 'Tambah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-anggota';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Tambah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-anggota';
                }
            })</script>";
        }

        // Tutup koneksi database
        mysqli_close($koneksi);
    } else {
        echo "<script>
        Swal.fire({title: 'Gagal, Harap Unggah File Gambar dengan Format JPG/PNG', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=add-anggota';
            }
        })</script>";
    }
}
// Selesai proses simpan data
?>