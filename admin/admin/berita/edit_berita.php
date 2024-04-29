<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tbl_berita WHERE id_berita='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
					<input type="hidden" class="form-control" id="id_berita" name="id_berita" value="<?php echo $data_cek['id_berita']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul Berita</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?php echo $data_cek['judul_berita']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data_cek['deskripsi']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Media</label>
				<div class="col-sm-6">
					<?php
					$gambar = $data_cek['gambar'];
					$ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

					if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
						// Tampilkan gambar jika ekstensi adalah JPG, JPEG, atau PNG
						echo '<img src="foto/' . $gambar . '" width="160px" />';
					} elseif ($ekstensi === 'mp4') {
						// Tampilkan video jika ekstensi adalah MP4
						echo '<video width="320" height="240" controls>
								<source src="foto/' . $gambar . '" type="video/mp4">
								Your browser does not support the video tag.
							</video>';
					}
					?>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Media</label>
				<div class="col-sm-6">
					<input type="file" id="gambar" name="gambar">
					<p class="help-block">
						<font color="red">Format file Jpg/Png/Mp4</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-berita" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['gambar']['name'];
	$pindah = move_uploaded_file($sumber, $target . $nama_file);
	
	if (isset($_POST['Ubah'])) {
		if (!empty($sumber)) {
			$gambar = $data_cek['gambar'];
			if (file_exists("foto/$gambar")) {
				unlink("foto/$gambar");
			}
	
			$sql_ubah = "UPDATE tbl_berita SET
				judul_berita='" . $_POST['judul_berita'] . "',
				deskripsi='" . $_POST['deskripsi'] . "',
				gambar='" . $nama_file . "'
				WHERE id_berita='" . $_POST['id_berita'] . "'";
			$query_ubah = mysqli_query($koneksi, $sql_ubah);
		} elseif (empty($sumber)) {
			$sql_ubah = "UPDATE tbl_berita SET
				judul_berita='" . $_POST['judul_berita'] . "',
				deskripsi='" . $_POST['deskripsi'] . "'
				WHERE id_berita='" . $_POST['id_berita'] . "'";
			$query_ubah = mysqli_query($koneksi, $sql_ubah);
		}
	
		if ($query_ubah) {
			echo "<script>
			Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-berita';
				}
			})</script>";
		} else {
			echo "<script>
			Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-berita';
				}
			})</script>";
		}
	}
?>

