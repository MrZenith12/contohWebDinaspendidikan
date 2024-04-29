<?php
		// Query SQL untuk menghitung jumlah berita
		$query = "SELECT COUNT(*) as total_berita FROM tbl_berita";
		$result = mysqli_query($koneksi, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$jumlahBerita = $row['total_berita'];
		} else {
			$jumlahBerita = 0;
		}

		// Query SQL untuk menghitung jumlah galeri
		$query = "SELECT COUNT(*) as total_galeri FROM tbl_galeri";
		$result = mysqli_query($koneksi, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$jumlahgaleri = $row['total_galeri'];
		} else {
			$jumlahgaleri = 0;
		}

		// Query SQL untuk menghitung jumlah dokumen
		$query = "SELECT COUNT(*) as total_dokumen FROM dokumen";
		$result = mysqli_query($koneksi, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);
			$jumlahdokumen = $row['total_dokumen'];
		} else {
			$jumlahgaleri = 0;
		}

		// Query SQL untuk menghitung jumlah pejabat
		$queryPejabat = "SELECT COUNT(*) as total_anggota FROM tbl_anggota";
		$resultPejabat = mysqli_query($koneksi, $queryPejabat);

		if ($resultPejabat) {
			$rowPejabat = mysqli_fetch_assoc($resultPejabat);
			$jumlahanggota = $rowPejabat['total_anggota'];
		} else {
			$jumlahanggota = 0;
		}

        $sql_cek = "SELECT * FROM tbl_profil";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		{
		
		
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-flag"></i> Profil </h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Instansi</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama_profil" name="nama_profil" value="<?php echo $data_cek['nama_profil']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bidang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data_cek['bidang']; ?>"
					 readonly/>
				</div>
			</div>

		</div>
	</form>
</div>

<?php
		}
	$sql = $koneksi->query("SELECT count(id_berita) as lokal from tbl_berita");
	while ($data= $sql->fetch_assoc()) {
	
		$lokal=$data['lokal'];
	}
?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h3>
					<?php echo $jumlahanggota;  ?>
				</h3>

				<p>Jumlah Pegawai</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-santri" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $jumlahBerita; ?>
				</h3>

				<p>Status Berita</p>
			</div>
			<div class="icon">
				<i class="fas fa-newspaper"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>
					<?php echo $jumlahgaleri; ?>
				</h3>

				<p>Status Galeri</p>
			</div>
			<div class="icon">
				<i class="fas fa-images"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $jumlahdokumen;  ?>
				</h3>

				<p>Status Dokumen</p>
			</div>
			<div class="icon">
				<!-- Ganti kelas ikon di bawah ini dengan ikon FontAwesome yang sesuai -->
				<i class="far fa-file-alt"></i>
			</div>
			<a href="#" class="small-box-footer">Informasi
			</a>
		</div>
	</div>