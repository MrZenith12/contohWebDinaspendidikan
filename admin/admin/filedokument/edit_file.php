<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM dokumen WHERE id_dokument='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <div class="col-sm-5">
                    <input type="hidden" class="form-control" id="id_dokument" name="id_dokument" value="<?php echo $data_cek['id_dokument']; ?>" readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Dokumen</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="<?php echo $data_cek['nama_dokumen']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">File PDF</label>
                <div class="col-sm-6">
                    <?php
                    $file_pdf = $data_cek['file'];
                    $ekstensi = pathinfo($file_pdf, PATHINFO_EXTENSION);

                    if ($ekstensi === 'pdf') {
                        // Tampilkan link ke file PDF jika ekstensi adalah PDF
                        echo '<a href="foto/' . $file_pdf . '" target="_blank">Lihat PDF</a>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah File PDF</label>
                <div class="col-sm-6">
                    <input type="file" id="file_pdf" name="file_pdf" accept=".pdf">
                    <p class="help-block">
                        <font color="red">Format file PDF</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-file" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
$file_sumber = @$_FILES['file']['tmp_name'];
$target_directory = 'foto/';
$nama_file = @$_FILES['file']['name'];

if (isset($_POST['Ubah'])) {
    if (!empty($file_sumber)) {
        $file_pdf = $data_cek['file'];
        $ekstensi = pathinfo($file_pdf, PATHINFO_EXTENSION);

        if ($ekstensi === 'pdf') {
            // Hapus file PDF lama jika ekstensinya adalah PDF
            if (file_exists("foto/$file_pdf")) {
                unlink("foto/$file_pdf");
            }

            $pindah = move_uploaded_file($file_sumber, $target_directory . $nama_file);

            $sql_ubah = "UPDATE dokumen SET
                nama_dokumen='" . $_POST['nama_dokumen'] . "',
                file='" . $nama_file . "'
                WHERE id_dokument='" . $_POST['id_dokument'] . "'";
            $query_ubah = mysqli_query($koneksi, $sql_ubah);
        } else {
            echo "<script>
            Swal.fire({title: 'Format File Tidak Dikenali', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-file';
                }
            })</script>";
        }
    } elseif (empty($file_sumber)) {
        $sql_ubah = "UPDATE dokumen SET
            nama_dokumen='" . $_POST['nama_dokumen'] . "'
            WHERE id_dokument='" . $_POST['id_dokument'] . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-file';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-file';
            }
        })</script>";
    }
}
?>
