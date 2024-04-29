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
        <div class="pages-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/others_bg.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Galeri</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <div class="course-details-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="widget mb-40 white-bg">
                <div class="sidebar-form">
                    <form action="#cari" method="GET">
                        <input name="search" placeholder="Galeri" type="text">
                        <button type="submit"><i class="ti-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-8 col-lg-8" id="cari">
                <div class="single-blog blog-wrapper blog-list blog-details blue-blog mb-40">
                    <?php
                        $per_page = 5; // Jumlah galeri per halaman
                        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, baca dari URL
                        $start = ($page - 1) * $per_page; // Hitung indeks awal galeri yang akan ditampilkan

                        // Query untuk mengambil data dari tabel tbl_galeri dengan batasan per halaman
                        if(isset($_GET['search'])){
                            $search = $_GET['search'];
                            $sql = "SELECT * FROM tbl_galeri WHERE judul_galeri LIKE '%$search%' ORDER BY tanggal DESC LIMIT $start, $per_page";
                        } else {
                            $sql = "SELECT * FROM tbl_galeri ORDER BY tanggal DESC LIMIT $start, $per_page";
                        }
                        $result = mysqli_query($koneksi, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $image = $row['image']; // Kolom yang menyimpan nama gambar
                                $judul_galeri = $row['judul_galeri']; // kolom yang menyimpan judul berita
                                $deskripsi = $row['deskripsi']; // Kolom yang menyimpan deskripsi gambar
                                $tanggal = $row['tanggal']; // Kolom yang menyimpan tanggal galeri

                                // Format tanggal sesuai dengan yang Anda inginkan (misalnya, "Auguest 25, 2018")
                                $formatted_date = date("F j, Y", strtotime($tanggal));

                                // Tampilkan data dalam format HTML yang sesuai
                                echo '<div class="single-blog-main-content mb-30">
                                    <div class="blog-thumb mb-20">
                                        <a href="news_details.html"><img src="admin/foto/' . $image . '" alt="" style="max-width: 100%; max-height: 400px;"></a>
                                        <span class="blog-text-offer">Galeri</span>
                                    </div>                        
                                    <div class="blog-content news-content">
                                        <div class="blog-meta news-meta">
                                            <span>' . $formatted_date . '</span>
                                        </div>
                                        <h5><a href="news_details.html">' . $judul_galeri . '</a></h5>
                                        <p>' . $deskripsi . '</p>
                                        <a href="detailgaleri.php?id_galeri=' . $row['id_galeri'] . '" class="blog-read-more-btn">Telusuri</a>
                                    </div>
                                </div>';
                            }

                            // Hitung total galeri dalam database (termasuk pencarian jika ada)
                            if(isset($_GET['search'])){
                                $total_galleries = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_galeri WHERE judul_galeri LIKE '%$search%'"));
                            } else {
                                $total_galleries = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_galeri"));
                            }

                            // Hitung jumlah halaman
                            $total_pages = ceil($total_galleries / $per_page);

                            // Tampilkan navigasi halaman
                            echo '<div class="row">
                            <div class="col-xl-12">
                                <nav class="course-pagination mt-10 mb-30" aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">'; // Mengganti class justify-content-start menjadi justify-content-center
                            for ($i = 1; $i <= $total_pages; $i++) {
                            echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">
                                <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                            </li>';
                            }
                            echo '</ul>
                                </nav>
                            </div>
                            </div>';
                        } else {
                            echo "Tidak ada galeri yang tersedia.";
                        }

                        ?>
                </div>
            </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="courses-details-sidebar-area">
                        <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Kategori Informasi</h4>
                            <div class="widget-link">
                                <ul class="sidebar-link">
                                    <?php
                                    // Query untuk menghitung jumlah data dalam tabel tbl_berita
                                    $queryBerita = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlahBerita FROM tbl_berita");
                                    $dataBerita = mysqli_fetch_assoc($queryBerita);
                                    $jumlahBerita = $dataBerita['jumlahBerita'];

                                    // Query untuk menghitung jumlah data dalam tabel tbl_galeri
                                    $queryGaleri = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlahGaleri FROM tbl_galeri");
                                    $dataGaleri = mysqli_fetch_assoc($queryGaleri);
                                    $jumlahGaleri = $dataGaleri['jumlahGaleri'];

                                    // Menampilkan jumlah data dalam widget
                                    echo '<li>
                                            <a href="#">Artikel</a>
                                            <span>' . $jumlahBerita . '</span>
                                        </li>';
                                    
                                    echo '<li>
                                            <a href="berita.php">Berita</a>
                                            <span>' . $jumlahBerita . '</span>
                                        </li>';
                                    
                                    echo '<li>
                                            <a href="galeri.php">Galeri</a>
                                            <span>' . $jumlahGaleri . '</span>
                                        </li>';

                                    
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Berita Terbaru</h4>
                            <div class="sidebar-rc-post">
                                <ul>
                                    <?php
                                        function limit_characters($string, $word_limit) {
                                            $words = explode(' ', $string);
                                            if (count($words) > $word_limit) {
                                                return implode(' ', array_slice($words, 0, $word_limit)) . '...';
                                            } else {
                                                return $string;
                                            }
                                        }
                                        // Query to fetch the latest news articles from the 'tbl_berita' table
                                        $sql = "SELECT * FROM tbl_berita ORDER BY tanggal_dimasukkan DESC LIMIT 5"; // Get the 5 latest news articles
                                        $result = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $gambar = $row['gambar']; // kolom memasukkan gambar
                                                $judul = $row['judul_berita']; // kolom untuk memasukkan judul
                                                $deskripsi = $row['deskripsi']; // kolom untuk memasukkan deskripsi
                                                $id_berita = $row['id_berita']; // kolom untuk memasukkan ID berita
                                                $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);

                                                echo '<li>
                                                    <div class="sidebar-rc-post-main-area d-flex mb-20">';

                                                if ($ekstensi === 'jpg' || $ekstensi === 'jpeg' || $ekstensi === 'png') {
                                                    echo '<div class="rc-post-thumb">
                                                        <a href="news_details.html">
                                                            <img src="admin/foto/' . $gambar . '" alt="" class="img-fluid" style="width: 70px; height: 60px;">
                                                        </a>
                                                    </div>';
                                                } elseif ($ekstensi === 'mp4') {
                                                    echo '<div class="rc-post-thumb" style="width: 70px; height: 60px;">
                                                        <video width="100%" height="100%">
                                                            <source src="admin/foto/' . $gambar . '">
                                                        </video>
                                                    </div>';
                                                } else {
                                                    echo 'File tidak dikenali';
                                                }

                                                echo '<div class="rc-post-content">
                                                        <h4>
                                                            <a href="blog-details.html">' . $judul . '</a>
                                                        </h4>
                                                        <div class="widget-advisors-name">
                                                            <span>' . limit_characters($deskripsi, 2) . '</span>
                                                            <a href="news_details.html?id=' . $id_berita . '">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>';
                                            }
                                        } else {
                                            echo "Tidak ada berita terbaru.";
                                        }

                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Recent Course</h4>
                            <div class="widget-tags clearfix">
                                <ul class="sidebar-tad clearfix">
                                    <li>
                                        <a href="#">CSE</a>
                                    </li>
                                    <li>
                                        <a href="#">Business</a>
                                    </li>
                                    <li>
                                        <a href="#">Study</a>
                                    </li>
                                    <li>
                                        <a href="#">English</a>
                                    </li>
                                    <li>
                                        <a href="#">Education</a>
                                    </li>
                                    <li>
                                        <a href="#">Engineering</a>
                                    </li>
                                    <li>
                                        <a href="#">Advisor</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget mb-40 widget-padding banner-padding white-bg">
                            <div class="banner-thumb pos-relative">
                                <img src="img/courses/course_banner_01.png" alt="">
                                <div class="bannger-text">
                                    <h2>New eBook are availablei our shop</h2>
                                    <div class="banner-btn">
                                        <button class="btn white-bg-btn">shop now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end news-details-->
    <!-- footer start -->
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
