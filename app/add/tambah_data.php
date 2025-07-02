<?php
include '../../config/config.php';
$nama = $_GET['nama'];
$nim = $_GET['nim'];
$angkatan = $_GET['angkatan'];
$jurusan = $_GET['jurusan'];
$semester = $_GET['semester'];
$status = $_GET['status'];
$query = mysqli_query($conn, "INSERT INTO tb_mahasiswa (id, nama, nim, angkatan, jurusan, semester, status) VALUES ('', '$nama', '$nim', '$angkatan', '$jurusan', '$semester', '$status')");
header('Location: ../index.php?page=data-mahasiswa');
?>