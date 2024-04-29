<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Bidang </h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-bidang" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Bidang</th>
						<th>Jumlah Pegawai</th>
						<th>Icon</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

				<?php
					$no = 1;
					$sql = $koneksi->query("SELECT b.*, COALESCE(a.jumlah_anggota, 0) AS jumlah_anggota
											FROM tbl_bidang b
											LEFT JOIN (
												SELECT bidang, COUNT(*) AS jumlah_anggota
												FROM tbl_anggota
												GROUP BY bidang
											) a ON b.nama_bidang = a.bidang");

					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nama_bidang']; ?>
							</td>
							<td>
								<?php echo $data['jumlah_pegawai']; ?>
							</td>
							<td align="center">
								<img src="foto/<?php echo $data['icon']; ?>" width="70px" />
							</td>

							<td>
								<a href="?page=view-pejabat&kode=<?php echo $data['id_pejabat']; ?>" title="Detail"
								class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a>
								<a href="?page=edit-pejabat&kode=<?php echo $data['id_pejabat']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pejabat&kode=<?php echo $data['id_pejabat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
								title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td>
							<td>
								Jumlah Anggota: <?php echo $data['jumlah_anggota']; ?>
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