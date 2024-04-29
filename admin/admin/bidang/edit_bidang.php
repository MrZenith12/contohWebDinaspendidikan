<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tbl_pejabat WHERE id_pejabat='".$_GET['kode']."'";
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
					<input type="hidden" class="form-control" id="id_pejabat" name="id_pejabat" value="<?php echo $data_cek['id_pejabat']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pejabat</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" value="<?php echo $data_cek['nama_pejabat']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Posisi</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="posisi" name="posisi" value="<?php echo $data_cek['posisi']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gambar Pejabat</label>
				<div class="col-sm-6">
					<img src="foto/<?php echo $data_cek['gambar_pejabat']; ?>" width="160px" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ubah Gambar</label>
				<div class="col-sm-6">
					<input type="file" id="gambar_pejabat" name="gambar_pejabat">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pejabat" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['gambar_pejabat']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['gambar_pejabat']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $gambar_pejabat= $data_cek['gambar_pejabat'];
            if (file_exists("gambar_pejabat/$gambar_pejabat")){
            unlink("gambar_pejabat/$gambar_pejabat");}

        $sql_ubah = "UPDATE tbl_pejabat SET
			nama_pejabat='".$_POST['nama_pejabat']."',
			posisi='".$_POST['posisi']."',
			keterangan='".$_POST['keterangan']."',
			gambar_pejabat='".$nama_file."'		
            WHERE id_pejabat='".$_POST['id_pejabat']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE tbl_pejabat SET
		nama_pejabat='".$_POST['nama_pejabat']."',
		posisi='".$_POST['posisi']."',
		keterangan='".$_POST['keterangan']."'		
		WHERE id_pejabat='".$_POST['id_pejabat']."'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pejabat';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pejabat';
            }
        })</script>";
    }
}

