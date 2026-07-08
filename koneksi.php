<?php
// Konfigurasi database
$host     = "localhost";
$user     = "root";
$password = "";
$database = "pert13";        // Ganti dengan nama database Anda di phpMyAdmin

// Membuat koneksi ke database 
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>