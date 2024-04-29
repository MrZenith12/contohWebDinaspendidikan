<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "dinaspendidikan";
    
    $koneksi = mysqli_connect($host, $user, $pass, $database);
    
    if (!$koneksi) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
?>