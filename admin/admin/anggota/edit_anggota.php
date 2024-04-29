<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tbl_anggota WHERE id_anggota='".$_GET['kode']."'";
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
                    <input type="hidden" class="form-control" id="id_anggota" name="id_anggota" value="<?php echo $data_cek['id_anggota']; ?>" readonly/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="NIP" name="NIP" value="<?php echo $data_cek['NIP']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data_cek['jabatan']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bidang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-6">
                    <?php
                    $foto = $data_cek['foto'];
                    $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);

                    if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
                        // Tampilkan foto jika ekstensi adalah JPG, JPEG, atau PNG
                        echo '<img src="foto/' . $foto . '" width="160px" />';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Ubah Foto</label>
                <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png">
                    <p class="help-block">
                        <font color="red">Format file JPG, JPEG & PNG</font>
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-anggota" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php
$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto']['name'];

if (isset($_POST['Ubah'])) {
    if (!empty($sumber)) {
        $foto = $data_cek['foto'];
        $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);

        if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
            // Hapus foto lama jika ekstensinya adalah JPG, JPEG, atau PNG
            if (file_exists("foto/$foto")) {
                unlink("foto/$foto");
            }

            $pindah = move_uploaded_file($sumber, $target . $nama_file);

            $sql_ubah = "UPDATE tbl_anggota SET
                NIP='" . $_POST['NIP'] . "',
                nama='" . $_POST['nama'] . "',
                jabatan='" . $_POST['jabatan'] . "',
                bidang='" . $_POST['bidang'] . "',
                foto='" . $nama_file . "'
                WHERE id_anggota='" . $_POST['id_anggota'] . "'";
            $query_ubah = mysqli_query($koneksi, $sql_ubah);
        } else {
            echo "<script>
            Swal.fire({title: 'Format File Tidak Dikenali', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-anggota';
                }
            })</script>";
        }
    } elseif (empty($sumber)) {
        $sql_ubah = "UPDATE tbl_anggota SET
            NIP='" . $_POST['NIP'] . "',
            nama='" . $_POST['nama'] . "',
            jabatan='" . $_POST['jabatan'] . "',
            bidang='" . $_POST['bidang'] . "'
            WHERE id_anggota='" . $_POST['id_anggota'] . "'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
    }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-anggota';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-anggota';
            }
        })</script>";
    }
}
?>