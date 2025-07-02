<?php
include '../../config/config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$angkatan = $_POST['angkatan'];
$jurusan = $_POST['jurusan'];
$semester = $_POST['semester'];
$status = $_POST['status'];
$query = mysqli_query($conn, "UPDATE tb_mahasiswa SET nama='$nama', nim='$nim', angkatan='$angkatan', jurusan='$jurusan', semester='$semester', status='$status' WHERE id='$id'");
header('Location: ../index.php?page=data-mahasiswa');
?>