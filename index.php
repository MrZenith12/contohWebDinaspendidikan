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
                        <?php
                                    } else {
                                        echo "Data tidak ditemukan.";
                                    }
                                } else {
                                    echo "Query gagal: " . $koneksi->error;
                                }
                            ?>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" class="navbar navbar-expand-lg" style="display: block">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">BERANDA</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="berita.php">BERITA</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="galeri.php">GALERI</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="struktur.php">TENTANG KAMI</a>
                                            </li>
                                            <?php
                                                // Query untuk mengambil data menu utama yang memiliki status "aktif" dan diurutkan berdasarkan kolom 'urutan'
                                                $sql_menuutama = "SELECT * FROM tbl_menuutama WHERE status = 'aktif' ORDER BY urutan";
                                                $result_menuutama = $koneksi->query($sql_menuutama);

                                                if ($result_menuutama->num_rows > 0) {
                                                    while ($row_menuutama = $result_menuutama->fetch_assoc()) {
                                                        echo '<li class="nav-item dropdown">';
                                                        echo '<a class="nav-link dropdown-toggle" href="#" id="' . $row_menuutama['id_menuutama'] . '" role"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $row_menuutama['nama_menuutama'] . '</a>';
                                                        echo '<div class="dropdown-menu" aria-labelledby="' . $row_menuutama['id_menuutama'] . '">';

                                                        // Query untuk mengambil submenu yang memiliki status "aktif" dan diurutkan berdasarkan kolom 'urutan'
                                                        $submenu_sql = "SELECT * FROM tbl_menu WHERE id_menuutama=" . $row_menuutama['id_menuutama'] . " AND status = 'aktif' ORDER BY urutan";
                                                        $submenu_result = $koneksi->query($submenu_sql);

                                                        if ($submenu_result->num_rows > 0) {
                                                            while ($submenu_row = $submenu_result->fetch_assoc()) {
                                                                echo '<a class="dropdown-item" href="submenu.php?id_menu=' . $submenu_row['id_menu'] . '">' . $submenu_row['nama_menu'] . '</a>';
                                                            }
                                                        }                                                        

                                                        echo '</div>';
                                                        echo '</li>';
                                                    }
                                                } else {
                                                    echo "Tidak ada data menu utama.";
                                                }
                                                ?>

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

                                            <li class="nav-item">
                                                <a class="nav-link" href="contact_us.php">KONTAK</a>
                                            </li>
                                        </ul>
                                    </div>
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
    <div class="slider-area pos-relative">
        <div class="slider-active" id="slider">

            <!-- Isi Slider dengan Data dari Database -->
            <?php
                // Query untuk mengambil data dari tabel tbl_banner
                $sql_banner = "SELECT * FROM tbl_banner WHERE status='Aktif' ORDER BY urutan ASC";
                $query_banner = mysqli_query($koneksi, $sql_banner);

                // Variabel untuk menghitung jumlah banner yang sudah ditampilkan
                $bannerCount = 0;

                // Loop untuk menampilkan data banner dalam slider dengan batasan 3 banner
                while ($data_banner = mysqli_fetch_array($query_banner)) {
                    $gambar = $data_banner['gambar'];
                    $judul_banner = $data_banner['judul_banner'];
                    $keterangan = $data_banner['keterangan'];

                    // Hentikan loop jika sudah menampilkan 3 banner
                    if ($bannerCount >= 3) {
                        break;
                    }
                    
                    // Tampilkan banner
                    ?>
                    <div class="single-slider slider-height" style="background-image: url('admin/foto/<?php echo $gambar; ?>');">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-9 col-md-12">
                                    <div class="slider-content slider-content-2 mt-4">
                                        <h1 class="white-color f-700" data-animation="fadeInUp" data-delay=".2s"><span><?php echo $judul_banner; ?></span></h1>
                                        <p data-animation="fadeInUp" data-delay=".4s"><?php echo $keterangan; ?></p>
                                        <button class="theme-btn" data-animation="fadeInUp" data-delay=".6s"><span class="btn-text">Selengkapnya</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    // Tambahkan 1 ke variabel jumlah banner yang sudah ditampilkan
                    $bannerCount++;
                }
            ?>

        </div>
    </div>
  
    <style>
    .slider-area {
        position: relative;
        overflow: hidden;
    }

    .slider-active {
        display: flex;
        align-items: center;
        /* Mengatur jarak antar slider */
        margin-right: -20px; /* Sesuaikan dengan margin kanan elemen slider */
    }

    .single-slider {
        flex: 0 0 100%;
        max-width: 100%;
        background-size: cover;
        background-position: center center;
        height: 400px; /* Sesuaikan tinggi slider sesuai kebutuhan Anda */
        padding-right: 20px; /* Menambahkan jarak antara slider */
    }
    </style>

    <!-- slider-end -->
    <!-- about start -->
    <div id="about" class="about-area pt-100 pb-70" >
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about-title-section mb-30">
                        <h1>Dinas Pendidikan Langsa</h1>
                        <p>Sorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temin cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci tation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure repreh nderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occcu idatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Horem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temin cididunt ut labore et dolore magna aliqua Ut enim ad minim veniam,quis nostrude</p>
                        <button class="theme-btn blue-bg-border mt-20"><span class="btn-text">Selengkapnya</span></button>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-right-img mb-30">
                        <img src="img/about/logolangsa.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->
    <div class="container-fluid text-center" style="background-image: url(img/slider/BG-BERITA.png);">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title mb-50 text-center" style="margin-top: 20px;"> <!-- Tambahkan margin atas di sini -->
                    <div class="section-title-heading mb-20">
                        <h1 class="white-color">BERITA TERBARU</h1>
                    </div>
                    <div class="section-title-para">
                        <p class="white-color">DINAS PENDIDIKAN KOTA LANGSA <?php echo date("Y"); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                // Query untuk mengambil 3 berita terbaru dari tabel tbl_berita
                $sql = "SELECT * FROM tbl_berita ORDER BY tanggal_dimasukkan DESC LIMIT 3";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
           ?>
        <div class="col-md-4">
            <div class="courses-wrapper course-radius-none mb-30">
                            <div class="courses-thumb">
                                <?php
                                $gambar = $row['gambar'];
                                $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

                                if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
                                    // Jika ekstensi adalah JPG, JPEG, atau PNG, tampilkan gambar
                                    echo '<a href="news_details.html"><img src="admin/foto/' . $gambar . '" alt=""></a>';
                                } elseif ($ekstensi === 'mp4') {
                                    // Jika ekstensi adalah MP4, tampilkan video
                                    echo '<video width="100%" controls>
                                            <source src="admin/foto/' . $gambar . '" type="video/mp4">
                                        </video>';
                                } else {
                                    // Jika ekstensi tidak dikenali, Anda dapat menampilkan pesan atau tindakan lain sesuai kebutuhan.
                                    echo 'File tidak dikenali';
                                }
                                ?>
                            </div>
                            <div class="course-main-content clearfix">
                                <div class="courses-content">
                                    <div class="courses-category-name">
                                        <span>
                                            <a href="#"><?php echo $row['judul_berita']; ?></a>
                                        </span>
                                    </div>
                                    <div class="courses-heading">
                                        <h1><a href="#">BERITA TERBARU <?php echo date("Y"); ?></a></h1>
                                    </div>
                                    <div class="courses-para">
                                        <p><?php echo $row['deskripsi']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-wrapper-bottom clearfix">
                                <div class="courses-icon d-flex f-left">
                                    <div class="courses-single-icon">
                                        <span class="ti-user"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                    <div class="courses-single-icon">
                                        <span class="ti-heart"></span>
                                        <span class="user-number">35</span>
                                    </div>
                                </div>
                                <div class="courses-button f-right">
                                    <a href="#">Detail</a>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir konten berita -->
                    </div>
                    <?php
                        }
                    }
                    
                    ?>
        </div>
        <div class="events-view-btn">
            <div class="row">
                <div class="col-xl-12">
                    <div class="view-all-events text-center">
                        <button class="yewello-btn" onclick="window.location.href='berita.php'">Lihat Semua Berita<span>&rarr;</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team start -->
    <div class="team-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">Layanan Online</h1>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color">Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu Nullam arcu liquam here was consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-list">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-thumb">
                                <img src="img/blog/LAYANAN KAMI.png" alt="">
                            </div>
                            <div class="team-social-info text-center">
                                <div class="team-social-para">
                                    <p>Belis nisl adipiscing sapien malesu diame lacus eget erats</p>
                                </div>
                                <div class="team-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-teacher-info text-center">
                                <button class="yewello-btn">Selengkpanya<span>&rarr;</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-thumb">
                                <img src="img/blog/LAYANAN KAMI.png" alt="">
                            </div>
                            <div class="team-social-info text-center">
                                <div class="team-social-para">
                                    <p>Belis nisl adipiscing sapien malesu diame lacus eget erats</p>
                                </div>
                                <div class="team-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-teacher-info text-center">
                                <button class="yewello-btn">Selengkpanya<span>&rarr;</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-thumb">
                                <img src="img/blog/LAYANAN KAMI.png" alt="">
                            </div>
                            <div class="team-social-info text-center">
                                <div class="team-social-para">
                                    <p>Belis nisl adipiscing sapien malesu diame lacus eget erats</p>
                                </div>
                                <div class="team-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-teacher-info text-center">
                                <button class="yewello-btn">Selengkpanya<span>&rarr;</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-thumb">
                                <img src="img/blog/LAYANAN KAMI.png" alt="">
                            </div>
                            <div class="team-social-info text-center">
                                <div class="team-social-para">
                                    <p>Belis nisl adipiscing sapien malesu diame lacus eget erats</p>
                                </div>
                                <div class="team-social-icon-list">
                                    <ul>
                                        <li><a href="#"><span class="ti-facebook"></span></a></li>
                                        <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="#"><span class="ti-google"></span></a></li>
                                        <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-teacher-info text-center">
                                <button class="yewello-btn">Selengkpanya<span>&rarr;</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team end -->
    <!-- Galeri start -->
    <div id="events" class="events-area events-bg-height pt-100 pb-95" style="background-image: url(img/slider/BG-BERITA.png)">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="white-color">Galeri Pendidikan <?php echo date("Y"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="events-list mb-30">
                <div class="row">
                    <?php
                    // Query SQL to retrieve the latest 4 items from tbl_galeri
                    $sql = "SELECT * FROM tbl_galeri ORDER BY tanggal DESC LIMIT 4";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image = $row['image'];
                            $judul_galeri = $row['judul_galeri'];
                            $deskripsi = $row['deskripsi'];
                            $tanggal = $row['tanggal'];

                            echo '<div class="col-lg-6 mb-4">
                                <div class="card">
                                    <img src="admin/foto/' . $image . '" alt="' . $judul_galeri . '" class="card-img-top" style="max-height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $judul_galeri . '</h5>
                                        <p class="card-text">' . $deskripsi . '</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button onclick="window.location.href=\'detailgaleri.php?id_galeri=' . $row['id_galeri'] . '\'" type="button" class="btn btn-sm btn-outline-secondary">Detail</button>
                                            </div>
                                            <small class="text-muted">' . date('d M, Y', strtotime($tanggal)) . '</small>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo "Tidak ada data galeri yang tersedia.";
                    }
                    ?>
                </div>
            </div>
            <div class="events-view-btn">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="view-all-events text-center">
                            <button class="yewello-btn">Lihat Semua Galeri<span>&rarr;</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Galeri end -->
    <div class="testimonilas-area pt-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h1 class="primary-color">File Dokumen</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonilas-list">
                <div class="row testimonilas-active" id="dokumen-terbaru">
                    <?php
                        // Sambungkan ke database Anda (pastikan variabel $koneksi sudah ada)

                        $sql_dokumen = "SELECT * FROM dokumen ORDER BY tanggal DESC LIMIT 5";
                        $query_dokumen = mysqli_query($koneksi, $sql_dokumen);

                        while ($data_dokumen = mysqli_fetch_assoc($query_dokumen)) {
                            $nama_dokumen = $data_dokumen['nama_dokumen'];
                            $file_pdf = $data_dokumen['file'];

                            echo '<div class="col-xl-12">
                                    <div class="testimonilas-wrapper mb-110">
                                        <div class="testimonilas-para">
                                            <p>' . $nama_dokumen . '</p>
                                        </div>
                                        <div class="testimonilas-rating">
                                            <a href="admin/foto/' . $file_pdf . '" class="btn btn-primary" download>
                                                <i class="fas fa-download"></i> UNDUH LAPORAN
                                            </a>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    function loadDokumenTerbaru() {
        // Gunakan AJAX untuk mengambil dokumen terbaru dari server
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'ambil_dokumen_terbaru.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Update konten dokumen terbaru dengan respons dari server
                document.getElementById('dokumen-terbaru').innerHTML = xhr.responseText;
            }
        };

        xhr.send();
    }

    // Memanggil fungsi loadDokumenTerbaru setiap 5 detik
    setInterval(loadDokumenTerbaru, 5000); // Ubah 5000 menjadi periode yang diinginkan (dalam milidetik)
    </script>

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
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
