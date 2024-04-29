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
                                <h1 class="white-color f-700">News Details</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">News Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
<!-- slider-end -->
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-wrapper blog-list blog-details blue-blog mb-50">
                    <?php
                    // Assuming $koneksi is the database connection variable
                    // Modify this to your actual database connection
                    // $koneksi = mysqli_connect('host', 'username', 'password', 'database');

                    // Mendapatkan id_galeri dari parameter URL
                    $id_galeri = $_GET['id_galeri'];

                    // Kode query untuk mengambil data berita yang dipilih
                    $query = "SELECT * FROM tbl_galeri WHERE id_galeri = '$id_galeri'";
                    $result = mysqli_query($koneksi, $query);

                    // Memeriksa apakah data berita ditemukan
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $image = $row['image'];
                        $judul_galeri = $row['judul_galeri'];
                        $tanggal_dimasukkan = $row['tanggal'];
                        $deskripsi = $row['deskripsi'];
                        ?>
                        <div class="blog-thumb mb-35">
                            <img src="admin/foto/<?php echo $image; ?>" alt="">
                            <span class="blog-text-offer">galeri</span>
                        </div>
                        <div class="blog-content news-content">
                            <div class="blog-meta news-meta">
                                <span><?php echo date('F j, Y', strtotime($tanggal_dimasukkan)); ?></span>
                            </div>
                            <h5><?php echo $judul_galeri; ?></h5>
                            <p><?php echo $deskripsi; ?></p>
                        </div>
                    <?php
                    } else {
                        echo "Berita tidak ditemukan.";
                    }
                    ?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-wrapper">
                    <div class="sidebar-widget mb-40">
                        <h3 class="sidebar-title">Galeri Lainnya</h3>
                        <ul class="post-list">
                            <?php
                            // Kode query untuk mengambil beberapa berita lainnya (misalnya 5 berita lainnya)
                            $query_lainnya = "SELECT * FROM `tbl_galeri` WHERE id_galeri != '$id_galeri' ORDER BY tanggal DESC LIMIT 5";
                            $result_lainnya = mysqli_query($koneksi, $query_lainnya);

                            // Memeriksa apakah ada berita lainnya yang ditemukan
                            if (mysqli_num_rows($result_lainnya) > 0) {
                                while ($row_lainnya = mysqli_fetch_assoc($result_lainnya)) {
                                    $id_galeri_lainnya = $row_lainnya['id_galeri'];
                                    $gambar_lainnya = $row_lainnya['image']; 
                                    $judul_galeri_lainnya = $row_lainnya['judul_galeri'];
                                    $tanggal_dimasukkan_lainnya = $row_lainnya['tanggal'];
                            ?>
                                    <li>
                                        <a href="detail_berita.php?id_galeri=<?php echo $id_galeri_lainnya; ?>">
                                        <div class="thumbnail-wrapper">
                                            <img src="admin/foto/<?php echo $gambar_lainnya; ?>" alt="" class="thumbnail" style="width: 30%;">
                                        </div>
                                            <?php echo $judul_galeri_lainnya; ?>
                                        </a>
                                        <span class="post-date"><?php echo date('F j, Y', strtotime($tanggal_dimasukkan_lainnya)); ?></span>
                                    </li>
                            <?php
                                }
                            } else {
                                echo "Tidak ada berita lainnya yang ditemukan.";
                            }

                            // Menutup koneksi ke basis data
                            mysqli_close($koneksi);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            <div class="blog-wrapper-footer">
                                <div class="news-wrapper-tags">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="new-post-tag">
                                                <span>Tags:</span>
                                                <a href="#">Business,</a>
                                                <a href="#">Finance,</a>
                                                <a href="#">Banking,</a>
                                                <a href="#">SEO</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="new-post-tag news-share-icon text-left text-md-right">
                                                <span>Share</span>
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a class="twitter" href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a class="dribble" href="#">
                                                    <i class="fab fa-dribbble"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="author-comments-box d-flex">
                                            <div class="author-comments-avatar">
                                                <img src="img/comments/author_comments_01.png" alt="">
                                            </div>
                                            <div class="author-comments-text">
                                                <div class="author-comments-title">
                                                    <h5>Michel Jhone</h5>
                                                    <span>Author</span>
                                                </div>
                                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded by desire that they canno the pain.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-comments post-comments-padding white-bg mt-70 mb-30">
                        <div class="section-title mb-20">
                            <h2>Comments (3)</h2>
                        </div>
                        <div class="latest-comments">
                            <ul>
                                <li>
                                    <div class="comments-box main-comments d-flex">
                                        <div class="comments-avatar">
                                            <img src="img/comments/comments_01.png" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>Kemerun</h5>
                                            </div>
                                            <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                    <ul class="comments-reply">
                                        <li>
                                            <div class="comments-box d-flex">
                                                <div class="comments-avatar">
                                                    <img src="img/comments/comments_02.png" alt="">
                                                </div>
                                                <div class="comments-text">
                                                    <div class="avatar-name">
                                                        <h5>Angelina</h5>
                                                    </div>
                                                    <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comments-box main-comments d-flex">
                                        <div class="comments-avatar">
                                            <img src="img/comments/comments_03.png" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>Naymer JR</h5>
                                            </div>
                                            <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                            <a href="#">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="post-comments-form">
                            <div class="section-title mb-30">
                                <h2>Leave a Reply</h2>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <input type="text" placeholder="Your Name">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                        <input type="text" placeholder="Your Email">
                                    </div>
                                    <div class="col-xl-4 col-lg-4  col-md-4">
                                        <input type="text" placeholder="Your Email">
                                    </div>
                                    <div class="col-xl-12">
                                        <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments"></textarea>
                                        <button class="btn blue-bg" type="submit">send reply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="courses-details-sidebar-area">
                        <div class="widget mb-40 white-bg">
                            <div class="sidebar-form">
                                <form action="#">
                                    <input placeholder="Search course" type="text">
                                    <button type="submit">
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Category</h4>
                            <div class="widget-link">
                                <ul class="sidebar-link">
                                    <li>
                                        <a href="#">Busines Studies</a>
                                        <span>05</span>
                                    </li>
                                    <li>
                                        <a href="#">CSE Engineering</a>
                                        <span>07</span>
                                    </li>
                                    <li>
                                        <a href="#">Lerning English</a>
                                        <span>03</span>
                                    </li>
                                    <li>
                                        <a href="#">Civil Engineering</a>
                                        <span>05</span>
                                    </li>
                                    <li>
                                        <a href="#">Islamic Studies</a>
                                        <span>02</span>
                                    </li>
                                    <li>
                                        <a href="#">Banking Management</a>
                                        <span>09</span>
                                    </li>
                                    <li>
                                        <a href="#">Social Science</a>
                                        <span>13</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget mb-40 widget-padding white-bg">
                            <h4 class="widget-title">Recent Course</h4>
                            <div class="sidebar-rc-post">
                                <ul>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="course_details.html">
                                                    <img src="img/courses/rcourses_thumb01.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="course_details.html">
                                                    <img src="img/courses/rcourses_thumb02.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex mb-20">
                                            <div class="rc-post-thumb">
                                                <a href="course_details.html">
                                                    <img src="img/courses/rcourses_thumb03.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-rc-post-main-area d-flex">
                                            <div class="rc-post-thumb">
                                                <a href="course_details.html">
                                                    <img src="img/courses/rcourses_thumb04.png" alt="">
                                                </a>
                                            </div>
                                            <div class="rc-post-content">
                                                <h4>
                                                    <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                                </h4>
                                                <div class="widget-advisors-name">
                                                    <span>Advisor : <span class="f-500">Marcelo</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
    <!-- brand start -->
    <div class="brand-area pt-80 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-list">
                        <ul>
                            <li><img src="img/brand/brand1.png" alt=""></li>
                            <li><img src="img/brand/brand2.png" alt=""></li>
                            <li><img src="img/brand/brand3.png" alt=""></li>
                            <li><img src="img/brand/brand4.png" alt=""></li>
                            <li><img src="img/brand/brand5.png" alt=""></li>
                            <li><img src="img/brand/brand6.png" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand end -->
    <!-- subscribe start -->
    <div class="subscribe-area">
        <div class="container">
            <div class="subscribe-box">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="subscribe-text">
                                    <h1>Subscribe</h1>
                                    <span>Enter your email and get latest updates and offers subscribe us</span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-4 justify-content-end">
                                <div class="email-submit-form">
                                    <div class="subscribe-form">
                                        <form action="#">
                                            <input placeholder="Enter your email" type="email">
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe end -->
    <!-- footer start -->
    <footer id="Contact">
        <div class="footer-area primary-bg pt-150">
            <div class="container">
                <div class="footer-top pb-35">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-logo">
                                    <img src="img/logo/logo_2.png" alt="">
                                </div>
                                <div class="footer-para">
                                    <p>Sorem ipsum dolor sit amet conse ctetur adipiscing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nostrud exercition ullamco laboris nisi </p>
                                </div>
                                <div class="footer-socila-icon">
                                    <span>Follow Us</span>
                                    <div class="footer-social-icon-list">
                                        <ul>
                                            <li><a href="#"><span class="ti-facebook"></span></a></li>
                                            <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
                                            <li><a href="#"><span class="ti-dribbble"></span></a></li>
                                            <li><a href="#"><span class="ti-google"></span></a></li>
                                            <li><a href="#"><span class="ti-pinterest"></span></a></li>
                                            <li><a href="#"><span class="ti-instagram"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-heading">
                                    <h1>Quick Links</h1>
                                </div>
                                <div class="footer-menu clearfix">
                                    <ul>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Condition</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Consultation</a></li>
                                        <li><a href="#">Team Member</a></li>
                                        <li><a href="#">Our Services</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Who we are</a></li>
                                        <li><a href="#">Get a Quote</a></li>
                                        <li><a href="#">Recent Post</a></li>
                                        <li><a href="#">Who we are</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 d-lg-none d-xl-block col-md-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-heading">
                                    <h1>Recent Post</h1>
                                </div>
                                <div class="recent-post d-flex mb-25">
                                    <div class="recent-post-thumb">
                                        <img src="img/post/recent_post1.jpg" alt="">
                                    </div>
                                    <div class="recent-post-text">
                                        <p>Neque porro quisquam est qui dolorem ipsum</p>
                                        <div class="footer-time">
                                            <span class="ti-time"></span>
                                            <span class="footer-published-time">05 May 2018</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-post d-flex">
                                    <div class="recent-post-thumb">
                                        <img src="img/post/recent_post1.jpg" alt="">
                                    </div>
                                    <div class="recent-post-text">
                                        <p>Neque porro quisquam est qui dolorem ipsum</p>
                                        <div class="footer-time">
                                            <span class="ti-time"></span>
                                            <span class="footer-published-time">05 May 2018</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4  col-md-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-heading">
                                    <h1>Contact Us</h1>
                                </div>
                                <div class="footer-contact-list">
                                    <div class="single-footer-contact-info">
                                        <span class="ti-headphone "></span>
                                        <span class="footer-contact-list-text">+003 (1234) 7894</span>
                                    </div>
                                    <div class="single-footer-contact-info">
                                        <span class="ti-email "></span>
                                        <span class="footer-contact-list-text">youremail@gmail.com</span>
                                    </div>
                                    <div class="single-footer-contact-info">
                                        <span class="ti-location-pin"></span>
                                        <span class="footer-contact-list-text">123 New Street, 6th Floor, New York</span>
                                    </div>
                                </div>
                                <div class="opening-time">
                                    <span>Opening Hour</span>
                                    <span class="opening-date">
                                        Sun - Sat : 10:00 am - 05:00 pm
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
                                    <span>Copyright © 2018. All rights reserved</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
