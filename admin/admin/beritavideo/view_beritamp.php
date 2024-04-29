<?php
if(isset($_GET['kode'])){
    $sql_cek = "SELECT * from tbl_berita WHERE id_berita='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detail berita</h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 150px"><b>Judul Berita</b></td>
                            <td>: <?php echo $data_cek['judul_berita']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 150px"><b>Deskripsi</b></td>
                            <td>: <?php echo $data_cek['deskripsi']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a href="?page=data-beritamp" class="btn btn-warning">Kembali</a>
                    <a href="./report/cetak-berita.php?id_berita=<?php echo $data_cek['id_berita']; ?>" target=" _blank"
                        title="Cetak Data berita" class="btn btn-primary">Print</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <center>
                    <h3 class="card-title">Foto Berita</h3>
                </center>
                <div class="card-tools"></div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <?php
                    if ($data_cek) {
                        $gambar = $data_cek['gambar']; // Ambil nama file dari data

                        // Periksa ekstensi file
                        $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

                        if ($ekstensi === 'mp4') {
                            // Tampilkan video jika ekstensi adalah MP4
                            echo '<video width="240" height="240" controls>
                                    <source src="foto/' . $gambar . '" type="video/mp4">
                                </video>';
                        } else {
                            // Tampilkan pesan jika ekstensi tidak dikenali atau berkas bukan MP4
                            echo 'Media bukan video MP4';
                        }
                    } else {
                        echo 'Data tidak ditemukan'; // Tampilkan pesan jika data tidak ada
                    }
                    ?>
                </div>
                <h3 class="profile-username text-center"><?php echo $data_cek['judul_berita']; ?></h3>
            </div>
        </div>
    </div>
</div>