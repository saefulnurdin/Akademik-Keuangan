<?php
include '../../config/config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nidn = $_POST['nidn'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];
$query = mysqli_query($conn, "UPDATE tb_dosen SET nama='$nama', nidn='$nidn', tanggal_masuk='$tanggal_masuk', jabatan='$jabatan', status='$status' WHERE id='$id'");
header('Location: ../index.php?page=data-dosen');
