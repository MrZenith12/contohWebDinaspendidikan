<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Berita Gambar
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add-beritaimg" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data
                </a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Gambar</th>
						<th>Judul Berita</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("SELECT * FROM tbl_berita WHERE gambar LIKE '%.jpg' OR gambar LIKE '%.jpeg' OR gambar LIKE '%.png'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td align="center">
                                <?php
                                $gambar = $data['gambar']; // Ambil nama file dari data

                                // Periksa ekstensi file
                                $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

                                if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
                                    // Tampilkan gambar jika ekstensi adalah JPG, JPEG, atau PNG
                                    echo '<img src="foto/' . $gambar . '" width="150" height="100" alt="Gambar">';
                                } else {
                                    // Tampilkan pesan alternatif jika ekstensi tidak dikenali
                                    echo 'File tidak dikenali';
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $data['judul_berita']; ?>
                            </td>
                            <td>
                                <?php echo $data['deskripsi']; ?>
                            </td>

                            <td>
                                <a href="?page=view-beritaimg&kode=<?php echo $data['id_berita']; ?>" title="Detail" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="?page=edit-beritaimg&kode=<?php echo $data['id_berita']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="?page=del-beritaimg&kode=<?php echo $data['id_berita']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>