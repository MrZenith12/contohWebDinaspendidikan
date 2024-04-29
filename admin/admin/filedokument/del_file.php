<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM dokumen WHERE id_dokument='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

    if ($data_cek) {
        $file_pdf = $data_cek['file'];
        if (file_exists("dokumen/$file_pdf")) {
            unlink("dokumen/$file_pdf");
        }

        $sql_hapus = "DELETE FROM dokumen WHERE id_dokument='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($koneksi, $sql_hapus);

        if ($query_hapus) {
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil', text: '', icon: 'success', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-file';
                }
            })</script>";
        } else {
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal', text: '', icon: 'error', confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-file';
                }
            })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Data Tidak Ditemukan', text: '', icon: 'error', confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-file';
            }
        })</script>";
    }
}
?>
