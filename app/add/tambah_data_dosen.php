<?php
include '../../config/config.php';
$nama = $_GET['nama'];
$nidn = $_GET['nidn'];
$tanggal_masuk = $_GET['tanggal_masuk'];
$jabatan = $_GET['jabatan'];
$status = $_GET['status'];
$query = mysqli_query($conn, "INSERT INTO tb_dosen (id, nama, nidn, tanggal_masuk, jabatan, status) VALUES ('', '$nama', '$nidn', '$tanggal_masuk', '$jabatan', '$status')");
header('Location: ../index.php?page=data-dosen');
