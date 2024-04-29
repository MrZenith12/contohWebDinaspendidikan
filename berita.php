<?php 
    
    include 'database/koneksi.php';

 ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Dinas Pendidikan Langsa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/about/logolangsa.jpg">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <header id="home">
        <div class="header-area">
            <!-- header-top -->
            <?php
                // Query SQL untuk mengambil data dari tabel tbl_profil
                $query = "SELECT * FROM tbl_profil";
                $result = $koneksi->query($query);

                // Periksa apakah query berhasil dijalankan
                if ($result) {
                    // Ambil data dari hasil query
                    $data_profil = $result->fetch_assoc();

                    // Pastikan data ditemukan sebelum mengaksesnya
                    if ($data_profil) {
            ?>
            <div class="header-top primary-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="header-contact-info d-flex">
                                <div class="header-contact header-contact-phone">
                                    <span class="ti-headphone"></span>
                                    <p class="phone-number"><?php echo $data_profil['no_tlpn']; ?></p>
                                </div>
                                <div class="header-contact header-contact-email">
                                    <span class="ti-email"></span>
                                    <p class="email-name"><a href="mailto:<?php echo $data_profil['email']; ?>"><?php echo $data_profil['email']; ?></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="header-social-icon-list">
                                <ul>
                                    <li><a href="<?php echo $data_profil['facebook']; ?>"><span class="ti-facebook"></span></a></li>
                                    <li><a href="<?php echo $data_profil['instagram']; ?>"><span class="ti-instagram"></span></a></li>
                                    <li><a href="<?php echo $data_profil['youtube']; ?>"><span class="ti-youtube"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /end header-top -->
            <!-- header-bottom -->
            <div class="header-bottom-area header-sticky" style="transition: .6s;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="admin/foto/<?php echo $data_profil['logo']; ?>" alt="<?php echo $data_profil['nama_profil']; ?> Logo" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
            <?php
                    } else {
                        echo "Data tidak ditemukan.";
                    }
                } else {
                    echo "Query gagal: " . $koneksi->error;
                }
            ?>
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <ul>
                                        <li>
                                            <a href="index.php">BERANDA</a>
                                        </li>
                                        <li>
                                            <a href="berita.php">BERITA</a>
                                        </li>
                                        <li>
                                            <a href="galeri.php">GALERI</a>
                                        </li>
                                        <li>
                                            <a href="struktur.php">TENTANG KAMI</a>
                                        </li>
                                        <li>
                                            <a href="#about">LAINNYA</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="organisasi.php">STRUKTUR ORGANISASI</a>
                                                </li>
                                                <li>
                                                    <a href="visimisi.php">Visi Misi</a>
                                                </li>
                                                <li>
                                                    <a href="dokumen.php">File Dokumen</a>
                                                </li>
                                            </ul>
                                        </li>
         
                                        <li>
                                            <a href="contact_us.php">KONTAK</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height d-flex align-items-center justify-content-center" style="background-image: url(img/slider/gambar5.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-md-12">
                            <div class="slider-content slider-content-2">
                                <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span>Selamat Datang</span><br>Dinas Pendidikan Langsa</h1>
                                <p data-animation="fadeInUp" data-delay=".4s">Pendidikan dan Kebudayaan: Melalui Inovasi, Kolaborasi, dan Pemeliharaan Warisan, Membangun Generasi Unggul untuk Masa Depan yang Berbudaya, Berdaya Saing, dan Berwawasan Global.</p>
                                <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text">Selengkapnya</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="blog-grid-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="blog-grid-list">
                <div class="row">
                    <?php
                    // Kode query untuk mengambil data dari tabel tbl_berita
                    $query = "SELECT * FROM tbl_berita";
                    $result = mysqli_query($koneksi, $query);

                    // Menghitung total baris data
                    $total_berita = mysqli_num_rows($result);

                    // Menentukan jumlah berita per halaman
                    $berita_per_halaman = 10;

                    // Menghitung total halaman
                    $total_halaman = ceil($total_berita / $berita_per_halaman);

                    // Mendapatkan halaman saat ini dari parameter URL
                    $halaman_saat_ini = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

                    // Menghitung indeks awal dan akhir data yang akan ditampilkan
                    $indeks_awal = ($halaman_saat_ini - 1) * $berita_per_halaman;
                    $indeks_akhir = $indeks_awal + $berita_per_halaman;

                    // Membatasi data yang ditampilkan sesuai dengan halaman saat ini
                    $query .= " LIMIT $indeks_awal, $berita_per_halaman";
                    $result = mysqli_query($koneksi, $query);

                    // Looping untuk menampilkan data dalam markup HTML
                    while ($row = mysqli_fetch_assoc($result)) {
                        $gambar = $row['gambar'];
                        $judul_berita = $row['judul_berita'];
                        $deskripsi = $row['deskripsi'];
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="blog-wrapper mb-30">
                                <div class="blog-thumb mb-25">
                                    <?php
                                    $gambar = $row['gambar'];
                                    $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

                                    if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
                                        // Jika ekstensi adalah JPG, JPEG, atau PNG, tampilkan gambar
                                        echo '<a href="news_details.html"><img src="admin/foto/' . $gambar . '" alt="" style="width: 100%; height: 200px; object-fit: cover;"></a>';
                                    } elseif ($ekstensi === 'mp4') {
                                        // Jika ekstensi adalah MP4, tampilkan video
                                        echo '<video width="100%" height="200" controls>
                                                <source src="admin/foto/' . $gambar . '" type="video/mp4">
                                            </video>';
                                    } else {
                                        // Jika ekstensi tidak dikenali, Anda dapat menampilkan pesan atau tindakan lain sesuai kebutuhan.
                                        echo 'File tidak dikenali';
                                    }
                                    ?>
                                    <span class="blog-category">berita</span>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span><?php echo date('F j, Y', strtotime($row['tanggal_dimasukkan'])); ?></span>
                                    </div>
                                    <h5><a href="news_details.html"><?php echo $judul_berita; ?></a></h5>
                                    <p><?php echo $deskripsi; ?></p>
                                    <div class="read-more-btn">
                                        <button onclick="window.location.href='detailberita.php?id_berita=<?php echo $row['id_berita']; ?>'">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <div class="single-events-btn mt-15 mb-30">
                            <nav class="course-pagination mb-30" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php
                                    // Menampilkan tombol "Previous" jika bukan halaman pertama
                                    if ($halaman_saat_ini > 1) {
                                        $halaman_sebelumnya = $halaman_saat_ini - 1;
                                        echo '<li class="page-item"><a class="page-link" href="?halaman=' . $halaman_sebelumnya . '"><span class="ti-angle-left"></span></a></li>';
                                    }

                                    // Menampilkan tombol-tombol halaman
                                    for ($i = 1; $i <= $total_halaman; $i++) {
                                        // Menampilkan tombol halaman saat ini dengan gaya aktif
                                        if ($i == $halaman_saat_ini) {
                                            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="?halaman=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }

                                    // Menampilkan tombol "Next" jika bukan halaman terakhir
                                    if ($halaman_saat_ini < $total_halaman) {
                                        $halaman_berikutnya = $halaman_saat_ini + 1;
                                        echo '<li class="page-item"><a class="page-link" href="?halaman=' . $halaman_berikutnya . '"><span class="ti-angle-right"></span></a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <!-- bagian footer -->
    <?php
    // Query SQL untuk mengambil data dari tabel tbl_profil
    $query = "SELECT * FROM tbl_profil";
    $result = $koneksi->query($query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Ambil data dari hasil query
        $data_cek = $result->fetch_assoc();

        // Pastikan data ditemukan sebelum mengaksesnya
        if ($data_cek) {
    ?>
        <footer id="Contact">
            <div class="footer-area primary-bg pt-150">
                <div class="container">
                    <div class="footer-top pb-35">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="footer-widget mb-30">
                                    <div class="footer-logo">
                                        <img src="admin/foto/<?php echo $data_cek['logo']; ?>" alt="<?php echo $data_cek['nama_profil']; ?> Logo" class="img-fluid">
                                    </div>
                                    <div class="footer-para">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere atque ducimus laborum fugit ipsum vel quibusdam molestiae dolorem quas. Eius aliquam nemo sunt. Enim hic delectus quas ipsa cum repellendus!</p>
                                    </div>
                                    <div class="footer-socila-icon">
                                        <span>Media Sosial Kami</span>
                                        <div class="footer-social-icon-list">
                                            <ul>
                                                <li><a href="<?php echo $data_cek['facebook']; ?>" target="_blank"><span class="ti-facebook"></span></a></li>
                                                <li><a href="<?php echo $data_cek['instagram']; ?>" target="_blank"><span class="ti-instagram"></span></a></li>
                                                <li><a href="<?php echo $data_cek['youtube']; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="footer-widget mb-30">
                                    <div class="footer-heading">
                                        <h1>Link Terkait</h1>
                                    </div>
                                    <div class="footer-menu clearfix">
                                        <ul>
                                            <li><a href="#">Beranda</a></li>
                                            <li><a href="#">Galeri</a></li>
                                            <li><a href="#">Support</a></li>
                                            <li><a href="#">Tentang Kami</a></li>
                                            <li><a href="#">Struktur Organisasi</a></li>
                                            <li><a href="#">Visi Misi</a></li>
                                            <li><a href="#">File Dokumen</a></li>
                                            <li><a href="#">Kontak</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4  col-md-6">
                                <div class="footer-widget mb-30">
                                    <div class="footer-heading">
                                        <h1>Kontak</h1>
                                    </div>
                                    <div class="footer-contact-list">
                                        <div class="single-footer-contact-info">
                                            <span class="ti-headphone "></span>
                                            <span class="footer-contact-list-text"><?php echo $data_cek['no_tlpn']; ?></span>
                                        </div>
                                        <div class="single-footer-contact-info">
                                            <span class="ti-email"></span>
                                            <a href="mailto:<?php echo $data_cek['email']; ?>" class="footer-contact-list-text"><?php echo $data_cek['email']; ?></a>
                                        </div>
                                        <div class="single-footer-contact-info">
                                            <span class="ti-location-pin"></span>
                                            <span class="footer-contact-list-text"><?php echo $data_cek['alamat']; ?></span>
                                        </div>
                                    </div>
                                    <div class="opening-time">
                                        <span>Jam Kerja</span>
                                        <span class="opening-date">
                                            <?php echo $data_cek['jam_kerja']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom pt-25 pb-25">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="footer-copyright text-center">
                                        <span>Dinas Pendidikan dan Kebudayaan © <?php echo date("Y"); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <?php
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "Query gagal: " . $koneksi->error;
    }

    // Tutup koneksi database
    $koneksi->close();
    ?>
    <!-- footer end -->


    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
